<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class runAllCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:run-all-commands';

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
        $this->call('app:migrar-tabla-usuarios-command');
        $this->call('app:migrate-hauliers-table-command');
        $this->call('app:migrate-managements-table-command');
        $this->call('app:migrate-managements-table-command');
        $this->call('app:migrate-locations-table-command');

        $this->info('¡Todos los comandos han sido ejecutados!');
    }
}
