<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('rajaongkir.api_key'),
        ])->get(config('rajaongkir.base_url') . '/cities');
        dd($response);
        $cities = $response->json()['data'];

        //loop data from Rest API
        foreach($response['rajaongkir']['results'] as $city) {

            //insert ke table "cities"
            City::create([
                'id'          => $city['city_id'],
                'province_id' => $city['province_id'],
                'name'        => $city['city_name'] . ' - ' . '('. $city['type'] .')',
            ]);

        }
    }
}
