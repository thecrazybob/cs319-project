<?php

namespace App\Http\Livewire\Vaccine;


use App\Models\Vaccine;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Filament\Tables\Actions\LinkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Actions\ButtonAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\IconButtonAction;
use Filament\Tables\Concerns\InteractsWithTable;

class Table extends Component implements HasTable
{
    use InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Vaccine::where('patient_id', auth()->user()->patient->id);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('vaccine_type'),
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
                ->action(fn (Vaccine $record) => $record->delete() && $record->file->delete())
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
