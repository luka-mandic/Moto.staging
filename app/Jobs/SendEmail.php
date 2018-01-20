<?php

namespace App\Jobs;

use App\Http\Requests\CheckMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send('email.send', $data, function($mail) use($data){

            $mail->from($data['mail'], $data['ime']);

            $mail->to('mastermotonautika@gmail.com')->subject($data['naslov']);
            
        });


    }
}
