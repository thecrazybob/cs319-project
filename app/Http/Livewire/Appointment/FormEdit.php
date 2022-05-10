<?php

namespace App\Http\Livewire\Appointment;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class FormEdit extends Component implements HasForms
{
    use InteractsWithForms;
    use WireToast;

    public function render()
    {
        return view('livewire.appointment.form-edit');
    }
}
