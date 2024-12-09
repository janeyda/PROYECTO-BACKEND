<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class perfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $estado = ['activo', 'inactivo'];
            $usuarios_id =  range(1, 10);
            $rol_id=  range(1, 10);
           
            for ($i = 0; $i < 10; $i++) {
                DB::table('perfiles')->insert([
                    'estado' => $estado[array_rand($estado)], 
                    'usuarios_id' => $usuarios_id[array_rand($usuarios_id)],
                    'rol_id' => $rol_id[array_rand($rol_id)],
                ]);
            }
















        
        }
    }
}
