<?php

namespace App\Http\Livewire\Invoice;

use App\Models\User;
use App\Models\Invoice;
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
        return Invoice::where('patient_id', auth()->user()->patient->id);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('amount')->formatStateUsing(fn ($state) => $state . ' ' . 'TRY'),
            TextColumn::make('status')->formatStateUsing(fn ($state) => ucfirst($state)),
            TextColumn::make('description'),
            TextColumn::make('created_at')->date(),
            TextColumn::make('updated_at')->date(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            IconButtonAction::make('pay')
                ->icon('heroicon-o-credit-card')
                ->label('Pay Invoice')
                ->url(fn (Invoice $record): string => route('invoice.edit', $record)),
        ];
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-bookmark';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No invoices yet';
    }

    public function render(): View
    {
        return view('livewire.invoice.table');
    }
}
