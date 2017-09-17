<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Meeting;
use App\Dates;
use Auth;
use Form;
use App\User;
use Request;
use Mail;


class MeetingController extends Controller
{

    public function homepage()
    {
        return view('homepage');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_meeting');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Request::all();
        // dd($input);

        $urlId = strtr(base64_encode(openssl_random_pseudo_bytes(5)), "+/=", "XXX");
        $meeting = new Meeting;
        $meeting->url_id = $urlId;
        $meeting->user_name = $input['name'];
        $meeting->user_email = $input['email'];
        $meeting->title = $input['title'];
        $meeting->description = $input['description'];
        $meeting->status = 'yellow';
        $meeting->save();

        foreach($input['dates'] as $date) {
            $dates = new Dates;
            $dates->url_id = $urlId;
            $dates->date = $date;
            $dates->save();
        }

        $emailTo = $input['emailinvite'];
        $meetingTitle = '"' . $input['title'] . '"';
        $meetingLink = 'http://localhost:8000/' . $urlId;
        $meetingOwner = $input['name'];

        $mailContent = 'You have been invited to a meeting with' . ' ' . $meetingOwner . '.' . 'To schedule this meeting visit this link:' . $meetingLink;

        Mail::raw($mailContent, function ($message) use($emailTo, $meetingLink, $meetingTitle) {
            $message->from('miit.io.email@gmail.com', 'Miit.io');
            $message->to($emailTo, ' ');
            $message->subject('You have been invited to a meeting on Miit.io');
        });

        return redirect('createdmeetingsuccess');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //hämtar ett specifikt möte
    public function show($id)
    {
        $meeting = Meeting::where('url_id', '=', $id)->get();
        $dates = array();
        array_push($dates, $meeting[0]->dates);
        // return $meeting;
        // return $dates;
        return view('meeting', compact('meeting', 'dates'));
    }


    // lägg tillbaka $id när det är dags för databaskoppling
    public function dashboard()
    {

    $user = Auth::user();

    $meeting = Meeting::where('user_email', '=', $user->email)->get();

    return view('dashboard', compact('meeting', 'user'));

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
        $user = User::findOrFail($id);

        $user->name = Request::get('name');
        $user->email = Request::get('email');
        $user->password = Request::get('password');

        $user->save();

        return redirect('dashboard')->withMessage('User information was updated');

        //return Request::all();
        
       // return $user;

        //return Request::get('name');


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


    //retunerar successpage när ett möte har skapats
    public function createdMeetingSuccess()
    {
        return view('createdsuccess');
    }

    //hämtar ett specifikt möte i json-format
    public function showjson($id)
    {
        $meeting = Meeting::where('url_id', '=', $id)->get();

        $dates = array();
        array_push($dates, $meeting[0]->dates);

        return $meeting;
    }

    //Hämtar rätt möte och datum som ska bokas. Skickar sedan ett mail till ägaren av mötet som informerar
    //om att mötet är bokat och vilken tid.
    public function sendMail($urlId, $bookedDate) 
    {
        $meeting = Meeting::where('url_id', '=', $urlId)->get();
        $emailTo = $meeting[0]['user_email'];
        $emailName = $meeting[0]['user_name'];
        $meetingTitle = '"' . $meeting[0]['title'] . '"';

        $mailContent = 'Your meeting' . ' ' . $meetingTitle . ' ' . 'is scheduled at' . ' ' . $bookedDate;

        Mail::raw($mailContent, function ($message) use($emailTo, $emailName, $meetingTitle) {
            $message->from('miit.io.email@gmail.com', 'Miit.io');
            $message->to($emailTo, $emailName);
            $message->subject('Your meeting' . ' ' . $meetingTitle . ' ' . 'is scheduled!');
        });

        $meeting[0]->status = 'green';
        $meeting[0]->save();

        return redirect('meetingsuccess');
    }

    //retunerar successpage när ett möte har bokats
    public function meetingSuccess() 
    {
        return view('success');
    }

}
