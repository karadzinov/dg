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
      "city": "Skopje",
    "lat": "41.9961",
    "lng": "21.4317",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Skopje",
    "capital": "primary",
    "population": "640000",
    "population_proper": "526502"
  },
  {
      "city": "Tetovo",
    "lat": "42.0103",
    "lng": "20.9714",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Tetovo",
    "capital": "admin",
    "population": "142030",
    "population_proper": "142030"
  },
  {
      "city": "Bitola",
    "lat": "41.0319",
    "lng": "21.3347",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Bitola",
    "capital": "admin",
    "population": "74550",
    "population_proper": "74550"
  },
  {
      "city": "Kumanovo",
    "lat": "42.1322",
    "lng": "21.7144",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Kumanovo",
    "capital": "admin",
    "population": "70842",
    "population_proper": "70842"
  },
  {
      "city": "Prilep",
    "lat": "41.3464",
    "lng": "21.5542",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Prilep",
    "capital": "admin",
    "population": "66246",
    "population_proper": "66246"
  },
  {
      "city": "Ohrid",
    "lat": "41.1169",
    "lng": "20.8019",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Ohrid",
    "capital": "admin",
    "population": "55749",
    "population_proper": "55749"
  },
  {
      "city": "Veles",
    "lat": "41.7153",
    "lng": "21.7753",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Veles",
    "capital": "admin",
    "population": "43716",
    "population_proper": "43716"
  },
  {
      "city": "Štip",
    "lat": "41.7358",
    "lng": "22.1914",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Štip",
    "capital": "admin",
    "population": "43652",
    "population_proper": "43652"
  },
  {
      "city": "Gostivar",
    "lat": "41.8000",
    "lng": "20.9167",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Gostivar",
    "capital": "admin",
    "population": "35847",
    "population_proper": "35847"
  },
  {
      "city": "Kočani",
    "lat": "41.9167",
    "lng": "22.4125",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Kočani",
    "capital": "admin",
    "population": "28330",
    "population_proper": "28330"
  },
  {
      "city": "Struga",
    "lat": "41.1775",
    "lng": "20.6789",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Struga",
    "capital": "admin",
    "population": "16559",
    "population_proper": "16559"
  },
  {
      "city": "Debar",
    "lat": "41.5250",
    "lng": "20.5272",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Debar",
    "capital": "admin",
    "population": "14561",
    "population_proper": "14561"
  },
  {
      "city": "Strumica",
    "lat": "41.4375",
    "lng": "22.6431",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Strumica",
    "capital": "admin",
    "population": "10868",
    "population_proper": "10868"
  },
  {
      "city": "Vinica",
    "lat": "41.8828",
    "lng": "22.5092",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Vinica",
    "capital": "admin",
    "population": "10863",
    "population_proper": "10863"
  },
  {
      "city": "Probištip",
    "lat": "41.9936",
    "lng": "22.1767",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Probištip",
    "capital": "admin",
    "population": "10826",
    "population_proper": "10826"
  },
  {
      "city": "Kičevo",
    "lat": "41.5142",
    "lng": "20.9631",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Kičevo",
    "capital": "admin",
    "population": "7280",
    "population_proper": "7280"
  },
  {
      "city": "Kavadarci",
    "lat": "41.4328",
    "lng": "22.0117",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Kavadarci",
    "capital": "admin",
    "population": "6228",
    "population_proper": "6228"
  },
  {
      "city": "Gevgelija",
    "lat": "41.1392",
    "lng": "22.5025",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Gevgelija",
    "capital": "admin",
    "population": "4967",
    "population_proper": "4967"
  },
  {
      "city": "Radoviš",
    "lat": "41.6381",
    "lng": "22.4644",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Radoviš",
    "capital": "admin",
    "population": "4678",
    "population_proper": "4678"
  },
  {
      "city": "Berovo",
    "lat": "41.7078",
    "lng": "22.8564",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Berovo",
    "capital": "admin",
    "population": "3619",
    "population_proper": "3619"
  },
  {
      "city": "Kruševo",
    "lat": "41.3700",
    "lng": "21.2483",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Kruševo",
    "capital": "admin",
    "population": "3570",
    "population_proper": "3570"
  },
  {
      "city": "Sveti Nikole",
    "lat": "41.8650",
    "lng": "21.9425",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Sveti Nikole",
    "capital": "admin",
    "population": "3468",
    "population_proper": "3468"
  },
  {
      "city": "Demir Kapija",
    "lat": "41.4114",
    "lng": "22.2422",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Demir Kapija",
    "capital": "admin",
    "population": "3275",
    "population_proper": "3275"
  },
  {
      "city": "Delčevo",
    "lat": "41.9661",
    "lng": "22.7747",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Delčevo",
    "capital": "admin",
    "population": "3033",
    "population_proper": "3033"
  },
  {
      "city": "Bogdanci",
    "lat": "41.2031",
    "lng": "22.5728",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Bogdanci",
    "capital": "admin",
    "population": "2951",
    "population_proper": "2951"
  },
  {
      "city": "Negotino",
    "lat": "41.4839",
    "lng": "22.0892",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Negotino",
    "capital": "admin",
    "population": "2683",
    "population_proper": "2683"
  },
  {
      "city": "Vevčani",
    "lat": "41.2403",
    "lng": "20.5931",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Vevčani",
    "capital": "admin",
    "population": "2416",
    "population_proper": "2359"
  },
  {
      "city": "Gradsko",
    "lat": "41.5775",
    "lng": "21.9428",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Gradsko",
    "capital": "admin",
    "population": "2219",
    "population_proper": "2219"
  },
  {
      "city": "Valandovo",
    "lat": "41.3169",
    "lng": "22.5611",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Valandovo",
    "capital": "admin",
    "population": "1992",
    "population_proper": "1992"
  },
  {
      "city": "Kriva Palanka",
    "lat": "42.2017",
    "lng": "22.3317",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Kriva Palanka",
    "capital": "admin",
    "population": "1967",
    "population_proper": "1967"
  },
  {
      "city": "Kratovo",
    "lat": "42.0783",
    "lng": "22.1750",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Kratovo",
    "capital": "admin",
    "population": "1925",
    "population_proper": "1925"
  },
  {
      "city": "Pehčevo",
    "lat": "41.7592",
    "lng": "22.8906",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Pehčevo",
    "capital": "admin",
    "population": "1687",
    "population_proper": "1687"
  },
  {
      "city": "Makedonski Brod",
    "lat": "41.5133",
    "lng": "21.2153",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Makedonski Brod",
    "capital": "admin",
    "population": "567",
    "population_proper": "567"
  },
  {
      "city": "Demir Hisar",
    "lat": "41.2208",
    "lng": "21.2031",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Demir Hisar",
    "capital": "admin",
    "population": "543",
    "population_proper": "543"
  },
  {
      "city": "Star Dojran",
    "lat": "41.1865",
    "lng": "22.7203",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Dojran",
    "capital": "admin",
    "population": "105",
    "population_proper": "105"
  },
  {
      "city": "Makedonska Kamenica",
    "lat": "42.0208",
    "lng": "22.5876",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Makedonska Kamenica",
    "capital": "admin",
    "population": "1",
    "population_proper": "1"
  },
  {
      "city": "Resen",
    "lat": "41.0893",
    "lng": "21.0109",
    "country": "Macedonia",
    "iso2": "MK",
    "admin_name": "Resen",
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
