<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveEvent;
use Auth;
use Illuminate\Http\Request;

class eventController extends Controller
{
    /**
     * eventController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = \App\Event::paginate(10);
        return view('admin.home')->withEvents($events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(saveEvent $request)
    {
        flash(trans('contact.flash'))->success();
        \App\Event::create($request->all());
        $this->sendMails($request->all());
        return redirect()->back();
    }

    protected function sendMails($data){
        $subject = "Nová rezervace";
        $message = "<b>Máte novou rezervci. Pro výpis v admine kliknite <a href='http://www.fotozrcadlo.cz/admin'>zde</a>.</b><br>";
        $message.="Jméno : ".$data["firstname"]."<br>";
        $message.="Příjmení : ".$data["surname"]."<br>";
        $message.="Telefón : ".$data["phone"]."<br>";
        $message.="E-mail : ".$data["email"]."<br>";
        $message.="Datum : ".$data["date"]."<br>";
        $message.="Typ služby : ".$data["type"]."<br>";
        $message.="Zpráva : ".$data["message"];
        $header  = "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

        $retval = mail ("juraj.sef@gmail.com",$subject,$message,$header);
        $retval = mail ("stepankarys@gmail.com",$subject,$message,$header);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = \App\Event::findOrFail($id);
        $event->delete();
        return redirect()->route('admin.index');

    }
}
