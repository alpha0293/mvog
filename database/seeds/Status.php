<?php

use Illuminate\Database\Seeder;

class Status extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		$status=array(
		[
		'id'=>'1',
		'name'=>'Đang Sinh Hoạt'
		],
		[
		'id'=>'2',
		'name'=>'Chờ xét duyệt'
		]
		);
		DB::table('statuses')->insert($status);
    }
}
