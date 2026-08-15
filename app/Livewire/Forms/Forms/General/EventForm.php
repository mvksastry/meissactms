<?php

namespace App\Livewire\Forms\Forms\General;

use Livewire\Attributes\Validate;
use Livewire\Form;

class EventForm extends Form
{
    //
    #[Validate('required|regex:/^[A-Za-z0-9 ]+$/')]
    public $title = null;
    #[Validate('required|regex:/^[A-Za-z0-9., ]+$/')]
    public $description = null;
    #[Validate('required|date')]
    public $start_date = null;
    #[Validate('required|numeric')]
    public $start_hour = null;
    #[Validate('required|numeric')]
    public $start_min = null;


    #[Validate('required|date')]
    public $end_date = null;
    #[Validate('required|numeric')]
    public $end_hour = null;
    #[Validate('required|numeric')]
    public $end_min = null;

    #[Validate('nullable|numeric')]
    public $resource = 0;
    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $priority = null;
    #[Validate('nullable|regex:/^[A-Za-z ]+$/')]
    public $created_by = null;


}
