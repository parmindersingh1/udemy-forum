<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Discussion;

use Illuminate\Http\Request;

class DiscussionsController extends Controller
{
    public function create()

    {

        return view('discussions.create');

    }

    public function store()

    {
        $r = request();

        $this->validate($r, [

        'channel_id' => 'required',
        'title' => 'required',
        'content' => 'required'

        ]);
    
        $discussion = Discussion::create([

        'channel_id' => $r->channel_id,
        'title' => $r->title,
        'slug' => str_slug($r->title),
        'content' => $r->content,
        'user_id' => Auth::id()
        

            ]);
        Session::flash('success', 'Discussion successfully created.');

        return redirect()->route('discussion', ['slug' => $discussion->slug]);

    }


    public function show($slug)

    {

       return view('discussions.show')->with('discussion', Discussion::where('slug', $slug)->first());
        
    }
}