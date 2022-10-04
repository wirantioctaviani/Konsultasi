<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Console\Command;

class CloseKonsultasi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:CloseKonsultasi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Close tiket yang sudah lewat dari 24 jam';

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
        $now = Carbon::now();
        $now24 = Carbon::now()->subDay();
        $now1 = Carbon::now()->subHour(1);

        //Close Konsultasi dengan status User's Review (Maks 1 jam dari update date)
        $status3 = DB::table('tb_konsul_online')
            ->selectraw('id_konsul, no_tiket, status_id, updated_at')
            ->where("updated_at","<=",Carbon::now()->subHour(1))
            ->where('status_id', '=','3')
            ->get();

                if($status3->isEmpty())
                {
                    // $this->info('status 3 tidak ada yang di close');
                    Log::info("Tidak ada Konsultasi Status = 3 yang di close ".$now);
                }
                else
                {
                    foreach($status3 as $status3)
                     {
                     $konsul_online3 = DB::table('tb_konsul_online')
                                      ->where('id_konsul', $status3->id_konsul)
                                      ->update(['status_id' => '4', 'updated_at' => \Carbon\Carbon::now()]);    
                     }
                     Log::info("Proses Close Konsultasi Status = 3 Berhasil ".$now);
                     // $this->info('status 3 berhasil di close');
                }


        //Close Konsultasi dengan status Waiting User's Confirmation
        $status0 = DB::table('tb_konsul_online')
            ->selectraw('id_konsul, no_tiket, status_id, updated_at')
            ->where("updated_at","<=",Carbon::now()->subDay())
            ->where('status_id', '=','0')
            ->get();

                if($status0->isEmpty())
                {
                    // $this->info('status 0 tidak ada yang di close');
                    Log::info("Tidak ada Konsultasi Status = 0 yang di close ".$now);
                }
                else
                {
                    foreach($status0 as $status0)
                     {
                     $konsul_online0 = DB::table('tb_konsul_online')
                                      ->where('id_konsul', $status0->id_konsul)
                                      ->update(['status_id' => '4', 'updated_at' => \Carbon\Carbon::now()]);    
                     }
                     // $this->info('status 0 berhasil di close');
                     Log::info("Proses Close Konsultasi Status = 0 Berhasil ".$now);
                }
        // $this->info($now);
        // $this->info($now1);
        // $this->info($now24);
        // $this->info($status0);
        // $this->info($status3);
    }
}
