<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{



    public function store(Request $request)
    {
        $new_message = new Message;
        
        $data = $request->all();
        
        
        $new_message->house_id = $request->input('house_id');
        $new_message->title = $request->input('title');
        $new_message->content = $request->input('content');
        $new_message->mail = $request->input('mail');
        
        $new_message->save();
        
        
        /* $new_message->save(); */
        return response()->json($data);
    }
}
