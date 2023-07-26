<?php

namespace App\Http\Controllers;

use App\Models\Eventname;
use App\Models\Eventschedule;
use Illuminate\Http\Request;

class EventscheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Eventschedule::with('evntname')->distinct('eventname_id')->get();
        $date = Eventschedule::groupBy('event_date')->pluck('event_date');
        $event=Eventname::all();
        $schedule= [];
        $schedule['dates']= $date;

        foreach($event as $k=>$e){
            $schedule['event'][$e->id]['name']=$e->name;
            foreach($date as $d){
                $s=Eventschedule::where(['eventname_id'=>$e->id,'event_date'=>$d])->first();
                $schedule['event'][$e->id]['time'][]=$s;
            }
        }
        // $schedule= [];
        // foreach ($date as $d) {
        //     $evnt = $data->where('event_date', $d);
        //     $schedule[$d]['date']=$d;

        //     foreach ($evnt as $e) {
        //         $schedule[$d]['event'][]=[
        //             'name'=>$e->evntname->name,
        //             'title'=>$e->title,
        //             'time'=>$e->time,
        //             'artist_name'=>$e->artist_name
        //         ];
        //     };
        // }
        // dd($schedule);

        // dd($date->toArray());
        return response()->json(['success' => true, 'data' => $schedule, 'bijoy'=>$data, 'message' => 'successfully show']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= Eventschedule::create([
            'eventname_id' => $request->input('eventname_id'),
            'event_date' => $request->input('event_date'),
            'title' => $request->input('title'),
            'time' => $request->input('time'),
            'artist_name' => $request->input('artist_name'),
        ]);

        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => 'Created Successfully!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Eventschedule $eventschedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Eventschedule $eventschedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Eventschedule $eventschedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Eventschedule::find($id)->delete();
        return response()->json(['success'=>true,'message'=>' Deleted Successfully!']);
    }
}
