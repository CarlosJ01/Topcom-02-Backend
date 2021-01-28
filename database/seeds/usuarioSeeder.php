<?php

use App\Usuario;

use Illuminate\Database\Seeder;

class usuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'usuario' => 'topcom', 
            'password' => bcrypt('tsw.2021'),
            'nombre' => 'root', 
            'curp' => 'root', 
            'rfc' => 'root', 
            'direccion' => 'root',
            'correo' => 'root'
        ]);
    }
}
