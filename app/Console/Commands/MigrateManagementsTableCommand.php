<?php

namespace App\Console\Commands;

use App\Models\Direction;
use App\Models\Management;
use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Str;

class MigrateManagementsTableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrate-managements-table-command';

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
        $count = 0;

        $managementsExternal = DB::connection('mysql_external')
            ->table('Ubicacion')
            ->select(DB::raw('CONCAT(UCASE(LEFT(gerencia, 1)), LCASE(SUBSTRING(gerencia, 2))) as gerencia'), 'direccion')
            ->distinct('gerencia')
            ->get();

        foreach ($managementsExternal as $managementExternal) {
            // Busca la dirección local basada en el nombre de dirección externa
            $direction = Direction::where(DB::raw('LOWER(name)'), Str::lower($managementExternal->direccion))->first();

            if ($direction) {
                $management = new Management();
                $management->name = $managementExternal->gerencia;
                $management->direction_id = $direction->id; // Asigna el ID de dirección local
                $management->save();
                $count++;
            } else {
                echo $managementsExternal;
            }
        }

        $this->info('¡Los datos se han migrado exitosamente! '.$count);
    }
}
