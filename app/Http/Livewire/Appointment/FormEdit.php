<?php

namespace App\Http\Livewire\Appointment;

use Livewire\Component;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Usernotnull\Toast\Concerns\WireToast;
use Filament\Forms\Concerns\InteractsWithForms;

class FormEdit extends Component implements HasForms
{
    use InteractsWithForms, WireToast;
    
    public function render()
    {
        return view('livewire.appointment.form-edit');
    }
}
