<?php

namespace App\Http\Livewire\Invoice;

use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Usernotnull\Toast\Concerns\WireToast;
use Filament\Forms\Concerns\InteractsWithForms;

class FormPay extends Component implements HasForms
{
    use InteractsWithForms;
    use WireToast;
    public $invoice_id;

    public function mount(int $id): void
    {
        $this->invoice_id = $id;

        $this->form->fill([
            'id' => $this->invoice_id,
            'amount' => Invoice::find($this->invoice_id)->amount,
            'description' => Invoice::find($this->invoice_id)->description,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('id')
                ->label('Invoice id:')
                ->disabled(),
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

        toast()->success('Payment completed successfully.')->push();

        redirect(route('invoice.index'));
    }

    public function render()
    {
        return view('livewire.invoice.form-pay');
    }
}
