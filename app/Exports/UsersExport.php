<?php

namespace App\Exports;

use App\User;
use App\Dutu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Dutu::with('namezone','nameyear')->get();
        return Dutu::all();
    }
    public function headings() :array {
    	return ['ID','Ảnh','Tên Thánh','Họ Tên','Ngày Sinh','Giáo Xứ','Trường','Chuyên Ngành','Nhóm','Năm SH','Trạng thái','12','Ngày Đăng kí','Ngày Sửa đổi',];
    }

    // public function map($bill): array
    // {
    //     return [
    //         $user->id,
    //         $user->name,
    //     ];
    // }
}
