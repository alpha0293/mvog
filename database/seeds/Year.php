<?php

use Illuminate\Database\Seeder;

class Year extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		
		$year=array(
		[
		'id'=>'1',
		'name'=>'Năm nhất'
		],
		[
		'id'=>'2',
		'name'=>'Năm Hai'
		],
		[
		'id'=>'3',
		'name'=>'Năm Ba'
		],
		[
		'id'=>'4',
		'name'=>'Dự tu tự do'
		]
		);
		DB::table('years')->insert($year);
    }
}
