<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel, WithHeadingRow, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function headingRow() : int
    {
        return 1;
    }


    public function model(array $row)
    {
        try {
            return new User([
            'email' => $row['email'],
            'name' => $row['ho_ten'],
            'password' => Hash::make('12345'),
            'roleid' => 3,
        ]);
        } catch (Exception $e) {
            return 'Lỗi'.$e->getMessage();
        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
