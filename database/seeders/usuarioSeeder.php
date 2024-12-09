<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class usuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nombres = ['Carlos', 'Ana', 'María', 'Juan', 'Lucía', 'Pedro'];
        $apellidos = ['González', 'Martínez', 'Rodríguez', 'Pérez', 'García', 'López'];
        $dominios = ['@gmail.com', '@yahoo.com', '@hotmail.com'];
    
        for ($i = 0; $i < 10; $i++) {
            DB::table('usuarios')->insert([
                'nombre' => $nombres[array_rand($nombres)],
                'apellido' => $apellidos[array_rand($apellidos)],
                'email' => Str::lower($nombres[array_rand($nombres)]) . '.' . Str::lower($apellidos[array_rand($apellidos)]) . $dominios[array_rand($dominios)],

                'contraseña' => bcrypt(Str::random(5)), 
            ]);
        }
    
    }
}
