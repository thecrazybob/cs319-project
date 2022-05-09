<?php

namespace App\Http\Livewire\Support;

use App\Models\User;
use App\Models\Support;
use Livewire\Component;
use Illuminate\Contracts\View\View;
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
        return Support::where('patient_id', auth()->user()->patient->id);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('department.name'),
            TextColumn::make('subject'),
            TextColumn::make('status'),
            TextColumn::make('priority'),
            TextColumn::make('created_at')->date(),
            TextColumn::make('updated_at')->date(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            IconButtonAction::make('show')
                ->label('View ticket')
                ->url(fn (Support $record): string => route('support.show', $record))
                ->icon('heroicon-o-eye'),
        ];
    }

    protected function getTableEmptyStateActions(): array
    {
        return [
            ButtonAction::make('create')
                ->label('Create a support ticket')
                ->url(route('support.create'))
                ->icon('heroicon-o-plus'),
        ];
    }

    public function render(): View
    {
        return view('livewire.report.table');
    }
}
