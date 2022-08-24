<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::factory(count:500)->create();
        //read the csv file into an array
        /*$csvFile = database_path("seeders\worldcities.csv");
        $csv = $this->csvToArray($csvFile);

        //Read Russian cities 
        foreach($csv as $row)
        {
            if($row['country'] === 'Russia')
                DB::table('cities')->insert(
                    [
                        'name'=> ucfirst($row['city'])
                        ]
                    );
        }*/
    }
    private function csvToArray($csvFile){
 
        $rows   = array_map('str_getcsv', file($csvFile));
        $header = array_shift($rows);
        $csv    = array();
        foreach($rows as $row) {
            $csv[] = array_combine($header, $row);
        }
        return $csv;
    }
}
