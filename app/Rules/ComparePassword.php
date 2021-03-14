<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ComparePassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $current_password;

    public function __construct($current_password)
    {
        //
        $this->current_password = $current_password;
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
        //
        return strcmp($this->current_password, $value) == 0 ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        // dd('Mật khẩu mới giống mật khẩu cũ');
        return trans('validation.compare_password');
    }
}
