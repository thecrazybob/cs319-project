<?php

namespace App\Http\Livewire\Appointment;

use App\Models\Appointment;
use Filament\Tables\Actions\ButtonAction;
use Filament\Tables\Actions\IconButtonAction;
use Filament\Tables\Columns\BooleanColumn;
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
        return Appointment::where('patient_id', auth()->user()->patient->id);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('doctor_name')
                ->getStateUsing(fn ($record) => $record->doctor->user->name),
            TextColumn::make('department.name'),
            TextColumn::make('timeslot.starting_time'),
            TextColumn::make('appointment_date')->date(),
            TextColumn::make('description')
                ->wrap()
                ->limit('50'),
            BooleanColumn::make('confirmed'),
            TextColumn::make('created_at')->date(),
            TextColumn::make('updated_at')->date(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            IconButtonAction::make('destroy')
                ->label('Delete appointment')
                ->action(fn (Appointment $record) => $record->delete())
                ->icon('heroicon-o-trash'),
        ];
    }

    protected function getTableEmptyStateActions(): array
    {
        return [
            ButtonAction::make('create')
                ->label('Upload appointment')
                ->url(route('appointment.create'))
                ->icon('heroicon-o-plus'),
        ];
    }

    public function render()
    {
        return view('livewire.appointment.table');
    }
}
