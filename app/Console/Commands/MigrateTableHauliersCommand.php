<?php

namespace App\Console\Commands;

use App\Models\Haulier;
use Illuminate\Console\Command;
use DB;

class MigrateTableHauliersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrate-table-hauliers-command';

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
    {   $count=0;
        $hauliersExternal = DB::connection('mysql_external')
            ->table('transportista')
            ->select('ID_transportista', 'nombre', 'idsap', 'rfc','telefono', 'correo','cp')
            ->get();

        foreach ($hauliersExternal as $haulierExternal) {
            $haulier = new Haulier();
            $haulier->id = $haulierExternal->ID_transportista;
            $haulier->name = $haulierExternal->nombre;
            $haulier->idsap = $haulierExternal->idsap;
            $haulier->rfc = $haulierExternal->rfc;
            $phoneFullData = $haulierExternal->telefono; // Suponiendo que $haulierExternal->telefono contiene el número de teléfono completo
            if ($phoneFullData !== null && $phoneFullData !== '') {
                $phoneOnlyDigits = preg_replace('/\D/', '', $phoneFullData); // Eliminar todo lo que no sea dígito
                $phoneSubstr = substr($phoneOnlyDigits, 0, 10);
                $haulier->phone = $phoneSubstr;
            } else {
                $haulier->phone = NULL;
            }
            $haulier->email = $haulierExternal->correo;
            $haulier->cp = $haulierExternal->cp;
            $haulier->save();
            $count++;

        }

        $this->info('¡Los datos se han migrado exitosamente! '.$count);
    }
}
