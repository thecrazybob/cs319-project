<?php

namespace App\Http\Livewire\Invoice;

use App\Models\Invoice;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class FormPay extends Component implements HasForms
{
    use InteractsWithForms;
    use WireToast;
    public $invoice_id;

    public function mount(int $id): void
    {
        $this->invoice_id = $id;

        if (Invoice::find($this->invoice_id)->status == 'paid') {
            toast()->danger('This invoice has already been paid.')->pushOnNextPage();
            redirect(route('invoice.index'));
        }

        $this->form->fill([
            'amount'      => Invoice::find($this->invoice_id)->amount,
            'description' => Invoice::find($this->invoice_id)->description,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('amount')
                ->label('Payment Amount:')
                ->disabled(),
            TextInput::make('description')
                ->label('Service Received:')
                ->disabled(),
        ];
    }

    public function submit(): void
    {
        DB::select('update invoices set status = \'paid\' where id = ?', [$this->invoice_id]);

        toast()->success('Payment completed successfully.')->pushOnNextPage();

        redirect(route('invoice.index'));
    }

    public function render()
    {
        return view('livewire.invoice.form-pay');
    }
}
