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
    $holy = ['phero','paul','fx','jos'];
    $name = ['Trần Văn Nam','Lê Văn Anh','Đinh Công Minh','Bùi Văn Cao','Trương Văn Công','Tuấn Văn Mái','Võ Thị Giáp','Màu Văn Đạt'];
    $ho = ['nguyễn','Trần','Phan','Phạm','ĐInh'];
    return [
        'name' => $faker->name,
        'holyname' => $holy[random_int(1,3)],
        'dob' => now(),
        'school' => 'Bach Khoa',
        'majors' => 'CNTT',
        'parish' => 'Trại Lê',
        'idzone' => random_int(1,4),
        'idyear' => random_int(1,4),
        'idstatus' => random_int(1,2),
        'check' => 0,
        'fullname' => $name[random_int(1,7)],
        'phonenumber' => $faker->phonenumber,
        'checklenlop' => 0,
    ];
});
