<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests\CheckMail;

class MailController extends Controller
{
    public function send(CheckMail $request)
    {
    	//dd($request);
    	Mail::raw($request->input('poruka'), function($message) use($request){
    		$message->from('luka.mandic.ri@gmail.com', $request->input('ime'));
    		$message->to('mastermotonautika@gmail.com', 'to '.$request->input('ime'))->subject($request->input('naslov'));
    		
    	});

    	return redirect('/#kontakt');
    }

    
}
