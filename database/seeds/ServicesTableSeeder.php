<?php


use App\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_services = [
            'WiFi',
            'Posto macchina',
            'Piscina',
            'Idromassaggio',
            'Portineria',
            'Sauna',
            'Vista mare',
            'Aria condizionata',
            'Animali ammessi',
            'Cucina',
            'Bagno Privato'
        ];

        foreach ($array_services as $service){
            $new_service = new Service();
            $new_service->name = $service;
            $new_service->save();
        }
    }
}
