<?php

namespace App\Rules;

use App\Ungsinh;
use Illuminate\Contracts\Validation\Rule;

class YearAndEmailUniqueRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $year;
    public function __construct($year)
    {
        $this->year = $year;
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
        $check = Ungsinh::where('email',$value)
        ->where('year',$this->year)
        ->first();

        return is_null($check);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Email này đã tồn tại!!!';
    }
}
