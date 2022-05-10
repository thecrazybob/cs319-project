<?php

namespace App\Http\Livewire\Vaccine;

use App\Models\Vaccine;
use Filament\Tables\Actions\ButtonAction;
use Filament\Tables\Actions\IconButtonAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Table extends Component implements HasTable
{
    use InteractsWithTable;
    use WireToast;

    protected function getTableQuery(): Builder
    {
        return Vaccine::where('patient_id', auth()->user()->patient->id);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('vaccine_type')->enum([
                'covid' => 'Covid',
                'other' => 'Other',
            ]),
            TextColumn::make('vaccine_date')->date(),
            TextColumn::make('dose_no'),
            TextColumn::make('created_at')->date(),
            TextColumn::make('updated_at')->date(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            IconButtonAction::make('edit')
                ->label('Edit vaccine')
                ->url(fn (Vaccine $record): string => route('vaccine.edit', $record))
                ->icon('heroicon-o-pencil'),
            IconButtonAction::make('show')
                ->label('View vaccine')
                ->url(fn (Vaccine $record): string => route('vaccine.show', $record))
                ->icon('heroicon-o-download'),
            IconButtonAction::make('destroy')
                ->label('Delete vaccine')
                ->action(fn (Vaccine $record) => $record->delete() && $record->file->delete() && toast()->success('Vaccine deleted')->push())
                ->icon('heroicon-o-trash'),
        ];
    }

    protected function getTableEmptyStateActions(): array
    {
        return [
            ButtonAction::make('create')
                ->label('Upload vaccine')
                ->url(route('vaccine.create'))
                ->icon('heroicon-o-plus'),
        ];
    }

    public function render()
    {
        return view('livewire.vaccine.table');
    }
}
