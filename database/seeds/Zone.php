<?php

use Illuminate\Database\Seeder;

class Zone extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		
		$zone=array(
		[
		'id'=>'1',
		'name'=>'Hà Nội'
		],
		[
		'id'=>'2',
		'name'=>'Huế'
		],
		[
		'id'=>'3',
		'name'=>'Đà Nẵng'
		],
		[
		'id'=>'4',
		'name'=>'Vinh'
		]
		);
		DB::table('zones')->insert($zone);
    }
}
