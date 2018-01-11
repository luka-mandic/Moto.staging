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
    		$message->to('mastermotonautika@gmail.com', 'to luka')->subject($request->input('naslov'));
    		$message->from($request->input('mail'), $request->input('ime'));
    	});

    	return redirect('/#kontakt');
    }

    
}
