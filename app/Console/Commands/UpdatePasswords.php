<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class UpdatePasswords extends Command
{
    protected $signature = 'users:update-passwords';
    protected $description = 'Update user passwords to use bcrypt encryption';

    public function handle()
    {
        $usuarios = Usuario::all();

        foreach ($usuarios as $usuario) {
            // Atualiza a senha criptografada com bcrypt
            $usuario->senha = Hash::make($usuario->senha);
            $usuario->save();
        }

        $this->info('Passwords updated successfully!');
    }
}
