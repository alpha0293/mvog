<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dutu;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Dutu::class, function (Faker $faker) {
    $holy = ['Peter','Paul','Phanxico','Jos','GB','Gioan','Luis','Marta','Maria'];
    $name = ['Nam','Anh','Minh','Thông','Công','Mái','Giáp','Đạt','Cường','Quân','Quý','Nam','Giang'];
    $ho = ['Trần Văn','Lê Văn','Đinh Công','Trương Văn','Tuấn Văn','Võ Thị','Màu Văn'];
    $province = ['Hà Tĩnh','Quảng Bình','Khác'];
    return [
        'name' => $name[random_int(0,12)],
        'holyname' => $holy[random_int(0,8)],
        'dob' => now(),
        'school' => 'Bach Khoa',
        'majors' => 'CNTT',
        'parish' => 'Trại Lê',
        'idzone' => random_int(1,4),
        'idyear' => random_int(1,4),
        'idstatus' => random_int(1,2),
        'check' => 0,
        'fullname' => $ho[random_int(0,6)],
        'phonenumber' => $faker->phonenumber,
        'checklenlop' => 1,
        'province' => $province[random_int(0,2)],
    ];
});
