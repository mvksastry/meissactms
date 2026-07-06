<?php

namespace App\Livewire\Forms\Ctms\Forms\Fileuploads;

use Livewire\Attributes\Validate;
use Livewire\Form;

class Urineroutine extends Form
{
    //
    #[Validate('nullable|file|mimes:pdf|max:2048')]
    public $urine_routine;
}
