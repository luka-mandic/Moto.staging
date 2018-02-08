<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckMail;
use App\Jobs\SendEmail;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function send(CheckMail $request)
    {
    	$data = [
    		'ime' => $request->input('ime'),
    		'mail' => $request->input('mail'),
    		'naslov' => $request->input('naslov'),
    		'poruka' => $request->input('poruka'),
    	];

    	SendEmail::dispatch($data)
                ->delay(now()->addSeconds(5));
    	
    	
    	return redirect('/#kontakt')->with('status', 'Poruka je poslana!');
    }

    
}
