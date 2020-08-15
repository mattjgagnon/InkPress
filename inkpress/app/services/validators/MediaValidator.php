<?php

namespace App\Services\Validators;

class MediaValidator extends Validator
{

    public static $rules = array(
        'path'      => 'required',
        'filename'  => 'required',
    );

}
