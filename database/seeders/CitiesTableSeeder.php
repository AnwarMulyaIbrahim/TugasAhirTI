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
        //Fetch Rest API
       $response = Http::withHeaders([
    'key' => config('rajaongkir.api_key'),
])->get('https://api.rajaongkir.com/api/v2/city'); // Perhatikan endpoint-nya

if ($response->successful() && isset($response['data'])) {
    foreach ($response['data'] as $city) {
        City::create([
            'id'           => $city['city_id'],
            'province_id'  => $city['province_id'],
            'name'         => $city['city_name'] . ' - (' . $city['type'] . ')',
            'postal_code'  => $city['postal_code'],
        ]);
    }
} else {
    dd($response->json()); // Lihat isi response jika gagal
}

    }
}
