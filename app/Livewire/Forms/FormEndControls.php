<?php
 
namespace App\Livewire\Forms;
 
use Livewire\Attributes\Validate;
use Livewire\Form;
 
class FormEndControls extends Form
{   
    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $comment_entered_by = '';

    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $entered_by = null;

    #[Validate('nullable|date')]
    public $entry_date = null;
}