<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all(); 
	    return view('event.index', [
            'events' => $events,
        ]);
    }

    public function organiserEvents(){
        
        if(!Auth::check()) 
        {
            return redirect('/');
        }

        $id = Auth::id();

        return view('event.index', array('events'=>Event::where('organiser_id', $id)->get()));
    }


    public function show(Event $event)
    {
        $eventId = $event->id;
        $categoryId = $event->category_id;

        $eventDetail = Event::where('events.id', $eventId)

        ->join('users', 'users.id', '=', 'events.organiser_id')
        ->select('events.*','users.email','users.name AS organiser_name', 'users.phone_number')->first();

        $similarEvents = Event::where('category_id', $categoryId)->get();

        $file = Storage::disk('s3')->response('images/'.$name);

        return view('event.show', [
            'event' => $eventDetail,
            'similarEvents' => $similarEvents,
            'file' => $file,
        ]);      
    }

    public function create()
    {
        if(!Auth::check()) 
        {
            return redirect('/');
        }

        return view('event.create');       
    }

    public function store(Request $request)
    {
        $id = Auth::id();
        $interestRanking = 0;

        $file = $request->file('picture');
        $fileName = $file->getClientOriginalName();
        $filePath = 'images/'.$fileName;
        Storage::disk('s3')->put($filePath, file_get_contents($file));

        $event = Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'date' => $request->date,
            'category_id' => $request->category_id,
            'picture' => $fileName,
            'organiser_id' => $id,
            'interest_ranking' => $interestRanking,
        ]);

        return redirect('events/' . $event->id);
    }


    public function edit(Event $event)
    {
            return view('event.edit', [
                'event' => $event,
            ]);            
    }

    public function update(Request $request, Event $event)
    {
        $event->update([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'date' => $request->date,
            'category' => $request->category,
            'picture' => $request->picture,
        ]);

        return redirect('events/' . $event->id);
    }


    public function updateInterest(Event $event){

        $event = Event::find($event->id);
        $event->increment('interest_ranking');

        return redirect('/');

    }  

}
