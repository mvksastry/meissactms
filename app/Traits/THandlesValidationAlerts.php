<?php

namespace App\Traits;

use Illuminate\Validation\ValidationException;

trait THandlesValidationAlerts
{
    protected function handleValidation($form)
    {
        try {
          $form->validate();
          return null; // no errors
        } catch (ValidationException $e) {
          return $e->validator->errors()->all(); // return array of error strings
        }

    }
}
