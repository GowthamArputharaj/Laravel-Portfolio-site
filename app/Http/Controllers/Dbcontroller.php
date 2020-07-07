<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Study;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Mail\MailMessage;
use Illuminate\Support\Facades\Mail;

class Dbcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $msg = new Study;
        $msg->sender_name = $request->input('sender_name');
        $msg->msg = $request->input('msg');
        $msg->user_id = auth()->user()->id;
        $msg->save();

        $messageDetails = [
            '_auth_id' => auth()->user()->id,
            '_auth_name' => auth()->user()->name,
            '_auth_email' => auth()->user()->email,
            'name' => $request->input('sender_name'),
            'message' => $request->input('msg'),
        ];

        $gowtham = 'gowtham.work.id@gmail.com';
        
        Mail::to($gowtham)->send(new MailMessage($messageDetails));

        return view('pages.contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Study::all();
        $posts = Study::where('user_id', auth()->user()->id)->get();
        return view('pages.show')->with('posts', $posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usr = User::find($id);
        $usr->id = auth()->user()->id;
        $usr->name = auth()->user()->name;
        $usr->email = auth()->user()->email;
        $usr->res_dwnld = true;
        $usr->email_verified_at = auth()->user()->email_verified_at;
        $usr->password = auth()->user()->password;
        $usr->timestamps = auth()->user()->timestamps;
        $usr->save();

        $pa = storage_path('app');  

        /* return response()->download($pa.'\fileFolder\sample.pdf', 'sample'.time().'.pdf', ['header' => 'Gowtham Resume pdf file']);  */
        
        return Storage::download('\fileFolder\Gowtham_Web_Developer.pdf', 'Gowtham_Web_Developer.pdf', ['header' => 'This is Gowtham']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
