<?php

use Illuminate\Database\Seeder;
use App\Usuario;

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
            'usuario' => 'root', 
            'password' => bcrypt('123'),
            'nombre' => 'root', 
            'curp' => 'root', 
            'rfc' => 'root', 
            'direccion' => 'root',
            'correo' => 'root'
        ]);
    }
}
