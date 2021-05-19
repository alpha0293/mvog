<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NameCountMin implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $name;
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(count(explode(' ', $value)) > 2)
            return true;
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Định dạng Tên thánh - Họ và tên không hợp lệ!';
    }
}
