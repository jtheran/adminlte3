<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function calendar()
    {
        $all_events = Event::all();
        $events = [];

        foreach($all_events as $event){
            $events[] = [
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

            $user = Event::create([
                'title' => $request->event,
                'start' => $request->start,
                'end' => $request->end,
                'description' => $request->description,

            ])->save();

            DB::commit();

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }

        return redirect()->route('admin.user.index');
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
        return redirect()->route('admin.event.calendar');
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('admin.event.calendar');

    }
}
