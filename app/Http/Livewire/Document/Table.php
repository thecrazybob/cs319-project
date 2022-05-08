<?php

namespace App\Http\Livewire\Document;

use Livewire\Component;
use App\Models\Document;
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
        return Document::where('patient_id', auth()->user()->patient->id);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('name'),
            TextColumn::make('file.type'),
            TextColumn::make('created_at')->date(),
            TextColumn::make('updated_at')->date(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            IconButtonAction::make('edit')
                ->label('Edit document')
                ->url(fn (Document $record): string => route('document.edit', $record))
                ->icon('heroicon-o-pencil'),
            IconButtonAction::make('show')
                ->label('View document')
                ->url(fn (Document $record): string => route('document.show', $record))
                ->icon('heroicon-o-download'),
            IconButtonAction::make('destroy')
                ->label('Delete document')
                ->action(fn (Document $record) => $record->delete() && $record->file->delete())
                ->icon('heroicon-o-trash'),
        ];
    }

    protected function getTableEmptyStateActions(): array
    {
        return [
            ButtonAction::make('create')
                ->label('Upload document')
                ->url(route('document.create'))
                ->icon('heroicon-o-plus'),
        ];
    }

    public function render(): View
    {
        return view('livewire.document.table');
    }
}
