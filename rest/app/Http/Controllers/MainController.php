<?php

namespace App\Http\Controllers;

use App\Main;
use App\Http\Requests\MainRequest;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mains = Main::latest()->paginate(30);
        return view('admin.mains', compact('mains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mains.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MainRequest $request)
    {
        Main::create([
            'title' => $request->input('title')
        ]);

        return redirect()->route('main.index')->with('message', 'Kategorija sėkmingai pridėta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function show(Main $main)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function edit(Main $main)
    {
        return view('mains.form', compact('main'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function update(MainRequest $request, Main $main)
    {
        $main->update([
            'title' => $request->input('title')
        ]);

        return redirect()->route('main.index')->with('message', 'Kategorija sėkmingai pakeista');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function destroy(Main $main)
    {
        if($main->dishes->count()>0){
            foreach ($main->dishes as $dish) {
                $dish->delete();
            }
        }
        $main->delete();

        return redirect()->route('main.index')->with('message', 'Kategorija sėkmingai ištrinta');
    }
}
