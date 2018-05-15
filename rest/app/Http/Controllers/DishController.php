<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Main;
use App\Http\Requests\DishRequest;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::latest()->get();
        return view('dishes.dishes', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $main = Main::all();
        return view('admin.form', compact('main'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishRequest $request)
    {
        Dish::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $request->input('image'),
            'price' => $request->input('price'),
            'main_id' => $request->input('main_id')
        ]);

        return redirect()->route('admin.dishes')->with('message', 'Patiekalas sėkmingai pridėtas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {

        return view('dishes.single', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        $main = Main::all();
        return view('admin.form', compact('dish', 'main'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(DishRequest $request, Dish $dish)
    {
        $dish->update([
            'title' => $request->input('title'),
            'description' =>$request->input('description'),
            'image' => $request->input('image'),
            'price' => $request->input('price'),
            'main_id' => $request->input('main_id')
        ]);

        return redirect()->route('admin.dishes')->with('message', 'Patiekalas sėkmingai pakeistas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('admin.dishes')->with('message', 'Patiekalas sėkmingai ištrintas');
    }

    public function admin() {
        $dishes = Dish::latest()->paginate(30);
        return view('admin.dishes', compact('dishes', 'number'));
    }
}
