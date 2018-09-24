<?php

use Illuminate\Database\Seeder;
use App\Text;

class TextsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Creazione di note fake nel database
        factory(App\Text::class, 10)->create();
    }
}
