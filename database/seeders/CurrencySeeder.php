<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("currencies")->delete();

        $response = Http::get("https://openexchangerates.org/api/currencies.json");
        $currencies = $response->json();

        $created_at = Carbon::now()->format('Y-m-d H:i:s');

        $formatted_array = [];
        foreach ($currencies as $currency_code => $currency_name) {
            $înstance = [
                "code" => $currency_code, 
                "name" => $currency_name,
                "created_at" => $created_at,
                "updated_at" => $created_at
            ];
            array_push($formatted_array, $înstance);
        }

        DB::table("currencies")->insert($formatted_array);
    }
}
