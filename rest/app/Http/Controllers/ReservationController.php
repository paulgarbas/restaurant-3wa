<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Http\Requests\ReservationRequest;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reservations.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationRequest $request)
    {
        Reservation::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'numberOfPeople' => $request->input('numberOfPeople'),
            'phone' => $request->input('phone'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'message' => $request->input('message')
        ]);

        // if (Auth::user()->role == 'admin') {
        //     return redirect()->route('admin.reservations')->with('message', 'Rezervacija sėkmingai priimta');
        // } else {
            return redirect()->route('main.page')->with('message', 'Rezervacija sėkmingai priimta');
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        return view('admin.reservations.form', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'numberOfPeople' => $request->input('numberOfPeople'),
            'phone' => $request->input('phone'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'message' => $request->input('message')
        ]);

        return redirect()->route('admin.reservations')->with('message', 'Rezervacija sėkmingai pakeista');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('admin.reservations')->with('message', 'Rezervacija sėkmingai ištrinta');
    }
}
