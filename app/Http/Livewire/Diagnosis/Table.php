<?php

namespace App\Http\Livewire\Diagnosis;

use App\Models\User;
use App\Models\Diagnosis;
use App\Models\Department;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\IconButtonAction;
use Filament\Tables\Concerns\InteractsWithTable;

class Table extends Component implements HasTable
{
    use InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Diagnosis::where('patient_id', auth()->user()->patient->id);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('doctor_name')
                ->getStateUsing(fn ($record) => User::where('doctor_id', $record->doctor_id)->first()->name),
            TextColumn::make('department.name'),
            TextColumn::make('diagnosis_type'),
            TextColumn::make('diagnosis_date')->date(),
            TextColumn::make('created_at')->date(),
            TextColumn::make('updated_at')->date(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            IconButtonAction::make('show')
                ->label('View diagnosis')
                ->url(fn (Diagnosis $record): string => route('diagnosis.show', $record))
                ->icon('heroicon-o-download'),
        ];
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-bookmark';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No diagnoses yet';
    }

    public function render()
    {
        return view('livewire.diagnosis.table');
    }
}
