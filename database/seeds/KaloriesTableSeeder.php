<?php

use Illuminate\Database\Seeder;

class KaloriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('kalories')->truncate();

        DB::table('kalories')->insert([
        	[
                'date'      =>  '2017-04-17',
                'time'      =>  '22:30',
                'meal'      =>  'idly',
                'calories'  =>  50,
                'calorie_limit' => 0
            ],
            [
                'date'      =>  '2017-04-18',
                'time'      =>  '08:30',
                'meal'      =>  'dosa',
                'calories'  =>  40,
                'calorie_limit' => 0
            ],
            [
                'date'      =>  '2017-04-19',
                'time'      =>  '10:00',
                'meal'      =>  'tomato rice',
                'calories'  =>  40,
                'calorie_limit' => 0
            ],
            [
                'date'      =>  '2017-04-20',
                'time'      =>  '13:30',
                'meal'      =>  'boori',
                'calories'  =>  30,
                'calorie_limit' => 0
            ],
            [
                'date'      =>  '2017-04-21',
                'time'      =>  '15:30',
                'meal'      =>  'parota',
                'calories'  =>  30,
                'calorie_limit' => 0
            ],
            [
                'date'      =>  '2017-04-22',
                'time'      =>  '17:00',
                'meal'      =>  'naan',
                'calories'  =>  30,
                'calorie_limit' => 0
            ],
            [
                'date'      =>  '2017-04-23',
                'time'      =>  '19:30',
                'meal'      =>  'seasme chicken',
                'calories'  =>  50,
                'calorie_limit' => 0
            ],
            [
        		'date' 		=> 	'2017-04-11',
        		'time' 		=> 	'09:30',
        		'meal' 		=> 	'vadai',
        		'calories' 	=> 	50,
                'calorie_limit' => 0
        	],
        	[
        		'date' 		=> 	'2017-04-11',
        		'time' 		=> 	'13:00',
        		'meal' 		=> 	'veg rap',
        		'calories' 	=> 	150,
                'calorie_limit' => 0
        	],

        	[
        		'date' 		=> 	'2017-04-11',
        		'time' 		=> 	'15:30',
        		'meal' 		=> 	'noodles',
        		'calories' 	=> 	200,
                'calorie_limit' => 0
        	],

        	[
        		'date' 		=> 	'2017-04-11',
        		'time' 		=> 	'24:00',
        		'meal' 		=> 	'milkshake',
        		'calories' 	=> 	70,
                'calorie_limit' => 0
        	],

        	[
        		'date' 		=> 	'2017-04-11',
        		'time' 		=> 	'06:00',
        		'meal' 		=> 	'coffee',
        		'calories' 	=> 	20,
                'calorie_limit' => 0
        	],

        	[
        		'date' 		=> 	'2017-05-11',
        		'time' 		=> 	'09:30',
        		'meal' 		=> 	'sandwich',
        		'calories' 	=> 	50,
                'calorie_limit' => 0
        	],

        	[
        		'date' 		=> 	'2017-05-11',
        		'time' 		=> 	'13:00',
        		'meal' 		=> 	'veg rap',
        		'calories' 	=> 	150,
                'calorie_limit' => 0
        	],

        	[
        		'date' 		=> 	'2017-05-11',
        		'time' 		=> 	'15:30',
        		'meal' 		=> 	'noodles',
        		'calories' 	=> 	200,
                'calorie_limit' => 0
        	],

        	[
        		'date' 		=> 	'2017-05-11',
        		'time' 		=> 	'14:00',
        		'meal' 		=> 	'milkshake',
        		'calories' 	=> 	70,
                'calorie_limit' => 0
        	],

        	[
        		'date' 		=> 	'2017-05-11',
        		'time' 		=> 	'06:00',
        		'meal' 		=> 	'coffee',
        		'calories' 	=> 	20,
                'calorie_limit' => 0
        	],
        ]);
    }
}
