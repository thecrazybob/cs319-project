<?php

namespace App\Http\Livewire\Support;

use App\Models\Support;
use Filament\Tables\Actions\ButtonAction;
use Filament\Tables\Actions\IconButtonAction;
use Filament\Tables\Columns\BadgeColumn;
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
        return Support::where('patient_id', auth()->user()->patient->id);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('department.name'),
            TextColumn::make('subject'),
            BadgeColumn::make('status')
                ->colors([
                    'primary',
                    'danger'  => 'hold',
                    'warning' => 'awaiting',
                    'success' => 'answered',
                ])->formatStateUsing(fn ($state) => ucfirst($state)),
            BadgeColumn::make('priority')
                ->colors([
                    'primary',
                    'danger'  => 'critical',
                    'warning' => 'high',
                    'success' => 'low',
                ])->formatStateUsing(fn ($state) => ucfirst($state)),
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
