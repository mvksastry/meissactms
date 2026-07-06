<?php

namespace App\Livewire\Forms\Ctms\Forms\Fileuploads;

use Livewire\Attributes\Validate;
use Livewire\Form;

class Electrolytes extends Form
{
    //
    #[Validate('nullable|file|mimes:pdf|max:2048')]
    public $electrolytes;
}
