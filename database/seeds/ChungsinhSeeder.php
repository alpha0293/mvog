<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Dutu;
class ChungsinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(User::class, 1000)->create();
        factory(Dutu::class, 1000)->create();
    }
}
