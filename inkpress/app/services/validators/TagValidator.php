<?php

namespace App\Services\Validators;

class TagValidator extends Validator
{

    public static $rules = array(
        'title'     => 'required|alpha_dash',
    );

}
