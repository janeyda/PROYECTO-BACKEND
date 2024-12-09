<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class rolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
            $nombres = ['estudiante', 'Docente', 'encuestador'];
          
            for ($i = 0; $i < 10; $i++) {
                DB::table('roles')->insert([
                    'nombre_rol' => $nombres[array_rand($nombres)],
                    
                ]);
            }
        
        
    }
}
