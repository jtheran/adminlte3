<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index()
    {
        $all_events = Event::all();
        $events = [];

        foreach($all_events as $event){
            $events[] = [
                'id'=> $event->id,
                'title'=> $event->event,
                'start'=> $event->start_date,
                'end'=> $event->end_date,
                'description'=> $event->description,
            ];
        }
        return view('calendar', compact('events'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'start' => 'required|string|max:255',
                // Puedes agregar más reglas de validación según tus necesidades
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }

            Event::create([
                'event' => $request->event,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'description' => $request->description,

            ])->save();

            DB::commit();

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }

        return redirect()->route('admin.event.index');
    }
    public function show($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('admin.event.index');
    }
    public function create()
    {
        return view("create-event");
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view("event-update", compact("event"));
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->fill($request->all())->save();
        return redirect()->route('admin.event.index');
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('admin.event.index');

    }
}
