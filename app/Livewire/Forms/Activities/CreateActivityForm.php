<?php

namespace App\Livewire\Forms\Activities;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateActivityForm extends Form
{
    //
    #[Validate('required|numeric')]
    public $incharge_id;

    #[Validate('required|numeric')]
    public $leader_id;

    #[Validate('sometimes|nullable|numeric')]
    public $patient_id;

    #[Validate('required|alpha')]
    public $code;

    #[Validate('required|regex:/^[A-Za-z0-9-,_.: \/ ]+$/')]
    public $description;

    #[Validate('nullable|date')]
    public $start_date;

    #[Validate('nullable|date')]
    public $end_date;

    #[Validate('nullable|date')]
    public $date_approved;

    #[Validate('nullable|string|regex:/^[A-Za-z0-9-,_. \/ ]+$/')]
    public $approval_ref;

    #[Validate('nullable|numeric')]
    public $budget_total;

    #[Validate('nullable|numeric')]
    public $budget_equipment;

    #[Validate('nullable|numeric')]
    public $budget_consumable;

    #[Validate('nullable|numeric')]
    public $budget_contigency;

    #[Validate('nullable|string|regex:/^[A-Za-z0-9-,_.\/ ]+$/')]
    public $notes;

}
