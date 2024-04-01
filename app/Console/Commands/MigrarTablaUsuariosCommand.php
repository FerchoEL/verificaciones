<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Models\User;

class MigrarTablaUsuariosCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrar-tabla-usuarios-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $usuariosExternos = DB::connection('mysql_external')
            ->table('Usuario')
            ->select('id_Usuario', 'usuario', 'password', 'nombre', 'activo')
            ->get();

        foreach ($usuariosExternos as $usuarioExterno) {
            $usuario = new User();
            $usuario->id = $usuarioExterno->id_Usuario;
            $usuario->name = $usuarioExterno->nombre;
            $usuario->user = explode('@', $usuarioExterno->usuario)[0]; // Extraer correo sin dominio
            $usuario->email = $usuarioExterno->usuario; // Extraer correo sin dominio

            $usuario->password = bcrypt($usuarioExterno->password);
            $usuario->active = $usuarioExterno->activo == '1' ? 1 : 0; // Convertir 'S' a 1, 'N' a 0
            $usuario->save();
        }

        $this->info('¡Los datos se han migrado exitosamente!');
    }
}
