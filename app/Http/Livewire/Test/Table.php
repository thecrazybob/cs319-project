<?php

namespace App\Http\Livewire\Test;

use App\Models\Test;
use Filament\Tables\Actions\IconButtonAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Table extends Component implements HasTable
{
    use InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Test::where('patient_id', auth()->user()->patient->id);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('doctor_name')
                ->getStateUsing(fn ($record) => $record->doctor->user->name),
            TextColumn::make('department.name'),
            TextColumn::make('test_type'),
            TextColumn::make('test_date')->date(),
            TextColumn::make('created_at')->date(),
            TextColumn::make('updated_at')->date(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            IconButtonAction::make('show')
                ->label('View test')
                ->url(fn (Test $record): string => route('test.show', $record))
                ->icon('heroicon-o-download'),
        ];
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-bookmark';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No tests yet';
    }

    public function render()
    {
        return view('livewire.test.table');
    }
}
