<?php

namespace App\Console;

use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function(){
            $data = Carbon::now('America/Sao_Paulo')->subDay(2);
            $alugueis = DB::table('alugars')->get();
            foreach ($alugueis as $aluguel){
                $dia = Carbon::parse($aluguel->data)->format('d');
            
                if($dia == $data->day){
                    DB::table('alugars')->where('id', $aluguel->id)->delete();
                }
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
