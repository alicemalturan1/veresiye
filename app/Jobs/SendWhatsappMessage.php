<?php

namespace App\Jobs;

use App\Http\Controllers\UserController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWhatsappMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        repl:
        if($resp){
            if($resp["message"]){

                if ($resp["message"]=="No agent are running,\n  please start the agent first"){


                    echo "ssssss";

                    if ($resp2 == "Connection Failure"){
                        $stop =false;
                        for($i = 0 ; $i<10;$i++){
                            $rsp3= UserController::start_agent($clientToken,'https://profilora.com/api/wa/agent-fetch');

                            echo $rsp3;
                            time.sleep(1);
                        }
                        $resp= UserController::mesaj_gonder();

                    }

                }
            }
        }else{
            goto repl;
        }
    }
}
