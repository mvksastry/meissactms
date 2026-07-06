<?php

namespace App\Livewire\Forms\Ctms\Forms\Fileuploads;

use Livewire\Attributes\Validate;
use Livewire\Form;

class Bloodsugar extends Form
{
    //
    #[Validate('nullable|file|mimes:pdf|max:2048')]
    public $blood_sugar;
}
