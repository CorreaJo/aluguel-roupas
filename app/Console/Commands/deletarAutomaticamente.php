<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class deletarAutomaticamente extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deletarAutomaticamente';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deleta automaticamente o aluguel quando passa da data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = Carbon::now('America/Sao_Paulo')->subDay(2);
        $alugueis = DB::table('alugars')->get();
        foreach ($alugueis as $aluguel){
           $dia = Carbon::parse($aluguel->data)->format('d');
           if($dia === $data){
                $aluguel->delete($aluguel->id);
           }
        }
        
        return 0;
    }
}
