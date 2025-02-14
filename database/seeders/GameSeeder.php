<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Redis;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $STEAM_IDS = [1174180, 2246340];
        
        // Laravel solicita datos a Python
        $i = 1;
        
        Redis::set('request', json_encode(["data" => ["id" => $i, "steam_id" => $STEAM_IDS[$i]]]));

        $maxWaitTime = 10;
        $startTime = time();
        
        while (!Redis::exists('response')) {
            if ((time() - $startTime) > $maxWaitTime) {
                throw new \Exception('Tiempo de espera excedido esperando la respuesta en Redis');
            }
            sleep(1);
        }

        // Recibe los datos desde Python
        $response = Redis::get('response');
        
        Redis::del('response'); // Elimina la clave después de usarla
        dd($response);

    }
}
