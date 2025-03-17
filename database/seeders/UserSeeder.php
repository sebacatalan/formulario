<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuario administrador
        User::create([
            'nombre' => 'OIT PANGUIPULLI',
            'identificador' => 'oitpanguipulli',
            'password' => Hash::make('password'),
            'rol' => 'admin',
        ]);

        // Crear usuarios regulares
        $usuarios = [
            [
                'nombre' => 'OIT NELTUME',
                'identificador' => 'oitneltume',
            ],
            [
                'nombre' => 'OIT CHOSHUENCO',
                'identificador' => 'oitchoshuenco',
            ],
            [
                'nombre' => 'OIT PUERTO FUY',
                'identificador' => 'oitpuertofuy',
            ],
            [
                'nombre' => 'OIT COÑARIPE',
                'identificador' => 'oitconaripe',
            ],
            [
                'nombre' => 'OIT LIQUIÑE',
                'identificador' => 'oitliquine',
            ],
            [
                'nombre' => 'CIT PANGUIPULLI',
                'identificador' => 'citpanguipulli',
            ],
        ];

        foreach ($usuarios as $usuario) {
            User::create([
                'nombre' => $usuario['nombre'],
                'identificador' => $usuario['identificador'],
                'password' => Hash::make('password'),
                'rol' => 'usuario',
            ]);
        }
    }
}