<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restdata;

class RestdataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $param = [
        'message' => 'google japan',
    	'url' => 'https:www.google.co.jp',
    	];

    	$restdata = new Restdata;
    	$restdata->fill($param)->save();
    	
    	 $param = [
        'message' => 'yahoo japan',
    	'url' => 'https:www.yahoo.co.jp',
    	];

    	$restdata = new Restdata;
    	$restdata->fill($param)->save();

    	 $param = [
        'message' => 'MSN japan',
    	'url' => 'https:www.msn.com/ja-jp',
    	];

    	$restdata = new Restdata;
    	$restdata->fill($param)->save();
    }
}
