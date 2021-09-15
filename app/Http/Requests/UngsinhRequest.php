<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\YearAndEmailUniqueRule;
use App\Rules\NameCountMin;
class UngsinhRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required','email','max:255', new YearAndEmailUniqueRule($this->year)],
            'name' => ['required','string','max:255', new NameCountMin($this->name)],
            'dob' => ['required','date','after:01-01-1900','before:30-12-3000'],
            'parish' => ['required','string','max:255'],
            'year' => ['required','int'],
            'phonenumber' => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
            'province' => ['required','string','max:255'],
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'string' => ':attribute khỉ được nhập chữ',
            'max' => ':attribute tối đa 255 kí tự',
            'date' => ':attribute đúng định dạng ngày tháng',
            'int' => ':attribute chỉ được nhập số',
            'after' => ':attribute phải sau ngày 01/01/1900',
            'before' => ':attribute phải trước ngày 31/12/3000',
            'min' => ':attribute tối thiếu 10 kí tự',
            'regex' => ':attribute không đúng định dạng',
            'email' => ':attribute không đúng định dạng',
        ];
    }
    public function attributes()
    {
        return [
            'email' => 'Email',
            'holyname' => 'Tên thánh',
            'fullname' => 'Tên họ',
            'name' => 'Tên gọi',
            'dob' => 'Ngày sinh',
            'parish' => 'Giáo xứ',
            'year' => 'Năm dự thi',
            'phonenumber' => 'Số điện thoại',
            'province' => 'Tỉnh',
        ];
    }
}
