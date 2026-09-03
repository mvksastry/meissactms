<?php

use Illuminate\Validation\ValidationException;

if (! function_exists('validate_form')) {

    function handleValidation($form): ?array
    {
        try {
            $form->validate();
            return null;
        } catch (ValidationException $e) {
            return $e->validator->errors()->all();
        }
    }

}