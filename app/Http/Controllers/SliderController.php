<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Slider;
use Input;
use Validator;
use App\Repositories\SliderRepository;

class SliderController extends Controller
{
    
    public function __construct()
    {
       $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(SliderRepository $slider_gestion)
    {

        // get all the sliders
        $sliders = $slider_gestion->index();

        // load the view and pass the sliders
        return view('slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new slider.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function store(SliderRepository $slider_gestion, Request $request)
    {
        $slider_gestion->store($request);
        
        return redirect('slider');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // get the nerd
        $slide = Slider::find($id);

        // show the view and pass the nerd to it
        return view('slider.show',compact('slide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        // get the nerd
        $slider = Slider::find($id);

        // show the edit form and pass the nerd
        return view('slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRepository $slider_gestion, Request $request, $id)
    {
        $slider_gestion->update($request,$id);
        
        return redirect('slider');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SliderRepository $slider_gestion,$id)
    {
        
        $slider_gestion->destroy($id);

        return redirect('slider');
    }

}
