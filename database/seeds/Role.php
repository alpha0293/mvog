<?php

use Illuminate\Database\Seeder;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$role=array(
		[
		'id'=>'1',
		'name'=>'Admin'
		],
		[
		'id'=>'2',
		'name'=>'Trưởng Nhóm'
		],
		[
		'id'=>'3',
		'name'=>'Dự Tu'
		]
		);
		DB::table('roles')->insert($role);
        //
    }
}
