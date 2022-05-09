<?php

namespace App\Http\Livewire\Appointment;

use App\Models\User;
use Livewire\Component;
use App\Models\Department;
use App\Models\Appointment;
use Illuminate\Contracts\View\View;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Actions\ButtonAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Actions\IconButtonAction;
use Filament\Tables\Concerns\InteractsWithTable;

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
                ->getStateUsing(fn ($record) => User::where('doctor_id', $record->doctor_id)->first()->name),
            TextColumn::make('department.name'),
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
            IconButtonAction::make('edit')
                ->label('Edit appointment')
                ->url(fn (Appointment $record): string => route('appointment.edit', $record))
                ->icon('heroicon-o-pencil'),
            IconButtonAction::make('show')
                ->label('View appointment')
                ->url(fn (Appointment $record): string => route('appointment.show', $record))
                ->icon('heroicon-o-eye'),
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
