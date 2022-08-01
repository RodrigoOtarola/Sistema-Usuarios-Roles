<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::truncate();

        for ($i = 1; $i<10; $i++) {

            Message::create([
                'nombre' => "Usuario {$i}",
                'email' => "usuario{$i}@email.com",
                'comentario' => "Este es el mensaje del usuario nro. {$i}"
            ]);
        }
    }
}
