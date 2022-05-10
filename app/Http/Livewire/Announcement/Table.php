<?php

namespace App\Http\Livewire\Announcement;

use App\Models\Announcement;
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
        return Announcement::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('title'),
            TextColumn::make('description')
                ->wrap()
                ->limit('50'),
            TextColumn::make('announcement_date')->date(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            IconButtonAction::make('show')
                ->label('View Announcement')
                ->url(fn (Announcement $record): string => route('announcement.show', $record))
                ->icon('heroicon-o-eye'),
        ];
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-bookmark';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No announcements yet';
    }

    public function render()
    {
        return view('livewire.announcement.table');
    }
}
