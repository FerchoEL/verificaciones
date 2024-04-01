<?php

namespace App\Console\Commands;

use App\Models\Haulier;
use Illuminate\Console\Command;
use DB;

class MigrateHauliersTableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrate-hauliers-table-command';

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
        $count=0;
        $hauliersExternal = DB::connection('mysql_external')
            ->table('Transportista')
            ->select('ID_transportista', 'nombre', 'idsap', 'rfc','telefono', 'correo','cp')
            ->get();

        foreach ($hauliersExternal as $haulierExternal) {
            $haulier = new Haulier();
            $haulier->id = $haulierExternal->ID_transportista;
            $haulier->name = $haulierExternal->nombre;
            $haulier->idsap = $haulierExternal->idsap;

            $rfcFullData=$haulierExternal->rfc;
            if($rfcFullData !== null && $rfcFullData !== ''){
                $rfcSubstr = substr($rfcFullData, 0, 13);
                $haulier->rfc = $rfcSubstr;
            }

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
