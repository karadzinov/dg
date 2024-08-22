<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $all_cities = '[
  {
      "city": "Скопје",
    "lat": "41.9961",
    "lng": "21.4317",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Скопје",
    "capital": "primary",
    "population": "640000",
    "population_proper": "526502"
  },
  {
      "city": "Тетово",
    "lat": "42.0103",
    "lng": "20.9714",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Тетово",
    "capital": "admin",
    "population": "142030",
    "population_proper": "142030"
  },
  {
      "city": "Битола",
    "lat": "41.0319",
    "lng": "21.3347",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Битола",
    "capital": "admin",
    "population": "74550",
    "population_proper": "74550"
  },
  {
      "city": "Куманово",
    "lat": "42.1322",
    "lng": "21.7144",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Куманово",
    "capital": "admin",
    "population": "70842",
    "population_proper": "70842"
  },
  {
      "city": "Прилеп",
    "lat": "41.3464",
    "lng": "21.5542",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Прилеп",
    "capital": "admin",
    "population": "66246",
    "population_proper": "66246"
  },
  {
      "city": "Охрид",
    "lat": "41.1169",
    "lng": "20.8019",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Охрид",
    "capital": "admin",
    "population": "55749",
    "population_proper": "55749"
  },
  {
      "city": "Велес",
    "lat": "41.7153",
    "lng": "21.7753",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Велес",
    "capital": "admin",
    "population": "43716",
    "population_proper": "43716"
  },
  {
      "city": "Штип",
    "lat": "41.7358",
    "lng": "22.1914",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Штип",
    "capital": "admin",
    "population": "43652",
    "population_proper": "43652"
  },
  {
      "city": "Гостивар",
    "lat": "41.8000",
    "lng": "20.9167",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Гостивар",
    "capital": "admin",
    "population": "35847",
    "population_proper": "35847"
  },
  {
      "city": "Кочани",
    "lat": "41.9167",
    "lng": "22.4125",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Кочани",
    "capital": "admin",
    "population": "28330",
    "population_proper": "28330"
  },
  {
      "city": "Струга",
    "lat": "41.1775",
    "lng": "20.6789",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Струга",
    "capital": "admin",
    "population": "16559",
    "population_proper": "16559"
  },
  {
      "city": "Дебар",
    "lat": "41.5250",
    "lng": "20.5272",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Дебар",
    "capital": "admin",
    "population": "14561",
    "population_proper": "14561"
  },
  {
      "city": "Струмица",
    "lat": "41.4375",
    "lng": "22.6431",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Струмица",
    "capital": "admin",
    "population": "10868",
    "population_proper": "10868"
  },
  {
      "city": "Виница",
    "lat": "41.8828",
    "lng": "22.5092",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Виница",
    "capital": "admin",
    "population": "10863",
    "population_proper": "10863"
  },
  {
      "city": "Пробиштип",
    "lat": "41.9936",
    "lng": "22.1767",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Пробиштип",
    "capital": "admin",
    "population": "10826",
    "population_proper": "10826"
  },
  {
      "city": "Кичево",
    "lat": "41.5142",
    "lng": "20.9631",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Кичево",
    "capital": "admin",
    "population": "7280",
    "population_proper": "7280"
  },
  {
      "city": "Кавадарци",
    "lat": "41.4328",
    "lng": "22.0117",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Кавадарци",
    "capital": "admin",
    "population": "6228",
    "population_proper": "6228"
  },
  {
      "city": "Гевгелија",
    "lat": "41.1392",
    "lng": "22.5025",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Гевгелија",
    "capital": "admin",
    "population": "4967",
    "population_proper": "4967"
  },
  {
      "city": "Радовиш",
    "lat": "41.6381",
    "lng": "22.4644",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Радовиш",
    "capital": "admin",
    "population": "4678",
    "population_proper": "4678"
  },
  {
      "city": "Берово",
    "lat": "41.7078",
    "lng": "22.8564",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Берово",
    "capital": "admin",
    "population": "3619",
    "population_proper": "3619"
  },
  {
      "city": "Крушево",
    "lat": "41.3700",
    "lng": "21.2483",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Крушево",
    "capital": "admin",
    "population": "3570",
    "population_proper": "3570"
  },
  {
      "city": "Свети Николе",
    "lat": "41.8650",
    "lng": "21.9425",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Свети Николе",
    "capital": "admin",
    "population": "3468",
    "population_proper": "3468"
  },
  {
      "city": "Демир Капија",
    "lat": "41.4114",
    "lng": "22.2422",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Демир Капија",
    "capital": "admin",
    "population": "3275",
    "population_proper": "3275"
  },
  {
      "city": "Делчево",
    "lat": "41.9661",
    "lng": "22.7747",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Делчево",
    "capital": "admin",
    "population": "3033",
    "population_proper": "3033"
  },
  {
      "city": "Богданци",
    "lat": "41.2031",
    "lng": "22.5728",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Богданци",
    "capital": "admin",
    "population": "2951",
    "population_proper": "2951"
  },
  {
      "city": "Неготино",
    "lat": "41.4839",
    "lng": "22.0892",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Неготино",
    "capital": "admin",
    "population": "2683",
    "population_proper": "2683"
  },
  {
      "city": "Вевчани",
    "lat": "41.2403",
    "lng": "20.5931",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Вевчани",
    "capital": "admin",
    "population": "2416",
    "population_proper": "2359"
  },
  {
      "city": "Градско",
    "lat": "41.5775",
    "lng": "21.9428",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Градско",
    "capital": "admin",
    "population": "2219",
    "population_proper": "2219"
  },
  {
      "city": "Валандово",
    "lat": "41.3169",
    "lng": "22.5611",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Валандово",
    "capital": "admin",
    "population": "1992",
    "population_proper": "1992"
  },
  {
      "city": "Крива Паланка",
    "lat": "42.2017",
    "lng": "22.3317",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Крива Паланка",
    "capital": "admin",
    "population": "1967",
    "population_proper": "1967"
  },
  {
      "city": "Кратово",
    "lat": "42.0783",
    "lng": "22.1750",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Кратово",
    "capital": "admin",
    "population": "1925",
    "population_proper": "1925"
  },
  {
      "city": "Пехчево",
    "lat": "41.7592",
    "lng": "22.8906",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Пехчево",
    "capital": "admin",
    "population": "1687",
    "population_proper": "1687"
  },
  {
      "city": "Македонски Брод",
    "lat": "41.5133",
    "lng": "21.2153",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Македонски Брод",
    "capital": "admin",
    "population": "567",
    "population_proper": "567"
  },
  {
      "city": "Демир Хисар",
    "lat": "41.2208",
    "lng": "21.2031",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Демир Хисар",
    "capital": "admin",
    "population": "543",
    "population_proper": "543"
  },
  {
      "city": "Стар Дојран",
    "lat": "41.1865",
    "lng": "22.7203",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Стар Дојран",
    "capital": "admin",
    "population": "105",
    "population_proper": "105"
  },
  {
      "city": "Македонска Каменица",
    "lat": "42.0208",
    "lng": "22.5876",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Македонска Каменица",
    "capital": "admin",
    "population": "1",
    "population_proper": "1"
  },
  {
      "city": "Ресен",
    "lat": "41.0893",
    "lng": "21.0109",
    "country": "Македонија",
    "iso2": "MK",
    "admin_name": "Ресен",
    "capital": "admin",
    "population": "1",
    "population_proper": "1"
  }
  ]';
        //Empty the cities table
        DB::table("cities")->delete();
        DB::statement("ALTER TABLE cities AUTO_INCREMENT = 1;");


        //Get all of the cities
        $cities = json_decode($all_cities, true);

        foreach ($cities as $c) {
            $city = new City();
            $city->city = $c["city"];
            $city->lat = $c["lat"];
            $city->lng = $c["lng"];
            $city->country = $c["country"];
            $city->iso2 = $c["iso2"];
            $city->admin_name = $c["admin_name"];
            $city->capital = $c["capital"];
            $city->population = $c["population"];
            $city->population_proper = $c["population_proper"];
            $city->save();
        }

    }

}
