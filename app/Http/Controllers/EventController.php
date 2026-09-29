<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tag;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('tags')->get();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('events.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:150',
            'description' => 'required',
            'event_date' => 'required|date',
            'location' => 'nullable|max:150',
            'tags' => 'array'
        ]);

        $event = Event::create($data);

        if ($request->tags) {
            $event->tags()->sync($request->tags);
        }

        return redirect()->route('events.edit', $event);
    }

    public function show(Event $event)
    {
        $event->load('tags');
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        $tags = Tag::all();
        return view('events.edit', compact('event', 'tags'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'title' => 'required|max:150',
            'description' => 'required',
            'event_date' => 'required|date',
            'location' => 'nullable|max:150',
            'tags' => 'array'
        ]);

        $event->update($data);

        if ($request->tags) {
            $event->tags()->sync($request->tags);
        }

        return redirect()->route('events.show', $event);
    }

    public function destroy(Event $event)
    {
        $event->tags()->detach();
        $event->delete();
        return redirect()->route('events.index');
    }
}
