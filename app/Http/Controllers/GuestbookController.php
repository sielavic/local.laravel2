<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Message;

class GuestbookController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->paginate(10);
        return view('guestbook.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        $secretKey = '6LcBgsclAAAAAI3C5rfLMQSNcfjdKfPDs5vIvXEO';
        $reCaptcha = new \ReCaptcha\ReCaptcha($secretKey);
        $response = $reCaptcha->verify($request->recaptcha, $request->ip());
        if (!$response->isSuccess()) {
            return back()->withErrors(['captcha', 'The captcha is not valid.']);
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $message = new Message;
        $message->name = $request->input('name');
        $message->message = $request->input('message');
        $message->save();

        return redirect()->route('guestbook.index')->with('success', 'Message added successfully!');
    }
}
