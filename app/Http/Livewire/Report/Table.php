<?php

namespace App\Http\Livewire\Report;

use App\Models\Report;
use Filament\Tables\Actions\IconButtonAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Table extends Component implements HasTable
{
    use InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Report::where('patient_id', auth()->user()->patient->id);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('doctor_name')
                ->getStateUsing(fn ($record) => $record->doctor->user->name),
            TextColumn::make('subject'),
            TextColumn::make('days'),
            TextColumn::make('report_date')->date(),
            TextColumn::make('created_at')->date(),
            TextColumn::make('updated_at')->date(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            IconButtonAction::make('show')
                ->label('View report')
                ->url(fn (Report $record): string => route('report.show', $record))
                ->icon('heroicon-o-download'),
        ];
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-bookmark';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No reports yet';
    }

    public function render(): View
    {
        return view('livewire.report.table');
    }
}
