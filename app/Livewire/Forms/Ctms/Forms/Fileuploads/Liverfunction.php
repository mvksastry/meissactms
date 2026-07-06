<?php

namespace App\Livewire\Forms\Ctms\Forms\Fileuploads;

use Livewire\Attributes\Validate;
use Livewire\Form;

class Liverfunction extends Form
{
    //
    #[Validate('nullable|file|mimes:pdf|max:2048')]
    public $liver_function;
}
