<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
           $this->call('UsersSeeder');
    }
}
class testDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           DB::table('bang1')->insert([
array('ten'=>'nhut','tuoi'=>'20'),
array('ten'=>'tuan','tuoi'=>'21')
]
        );
          
    }
}
