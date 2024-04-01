<?php

namespace App\Console\Commands;

use App\Models\Direction;
use App\Models\Location;
use App\Models\Management;
use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Str;

class MigrateLocationsTableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrate-locations-table-command';

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
        $locationsExternal = DB::connection('mysql_external')
            ->table('Ubicacion')
            ->select('ubicacion', 'gerencia','direccion')
            ->get();

            foreach ($locationsExternal as $locationExternal) {
                // Busca la dirección local basada en el nombre de dirección externa
                $management = Management::where(DB::raw('LOWER(name)'), Str::lower($locationExternal->gerencia))->first();

                if ($management) {
                    $location = new Location();
                    $location->name = $locationExternal->ubicacion;
                    $location->management_id = $management->id; // Asigna el ID de dirección local
                    $direction = Direction::where(DB::raw('LOWER(name)'), Str::lower($locationExternal->direccion))->first();
                    $location->direction_id = $direction->id;
                    $location->save();
                    $count++;
                } else {

                }
            }

        $this->info('¡Los datos se han migrado exitosamente! '.$count);
    }
}
