<?php

namespace App\Http\Livewire\Invoice;

use App\Models\Invoice;
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
        return Invoice::where('patient_id', auth()->user()->patient->id);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id'),
            TextColumn::make('amount')->formatStateUsing(fn ($state) => $state.' '.'TRY'),
            BadgeColumn::make('status')
                ->colors([
                    'primary',
                    'danger'  => 'unpaid',
                    'warning' => 'partial',
                    'success' => 'paid',
                ])->formatStateUsing(fn ($state) => ucfirst($state)),
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
                ->hidden(fn (Invoice $record): bool => $record->status == 'paid')
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
