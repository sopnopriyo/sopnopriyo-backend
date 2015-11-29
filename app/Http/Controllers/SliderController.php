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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
       $this->middleware('admin');
    }
    public function index(SliderRepository $slider_gestion)
    {

        // get all the nerds
        $sliders = $slider_gestion->index();

        // load the view and pass the nerds
        return view('slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $validation = Validator::make($request->all(), [
            'title'     => 'required|regex:/^[A-Za-z ]+$/',
            'description' => 'required',
            'file_name'     => 'required|image|mimes:jpeg,png|min:1'
        ]);

        // Check if it fails //
        if( $validation->fails() ){
            return redirect()->back()->withInput()
                             ->with('errors', $validation->errors() );
        }

        $image = new Slider;

        $file = $request->file('file_name');
        $destination_path = 'uploads/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $file->move($destination_path, $filename);
        
        $image->file_name = $destination_path . $filename;
        $image->title = $request->input('title');
        $image->description = $request->input('description');
        $image->save();    
        
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
    public function update(Request $request, $id)
    {
        // Validation //
        $validation = \Validator::make($request->all(), [
            'title'     => 'required|regex:/^[A-Za-z ]+$/',
            'description' => 'required',
            'file_name'    => 'required|image|mimes:jpeg,png|min:1|max:250'
        ]);

        // Check if it fails //
        if( $validation->fails() ){
            return redirect()->back()->withInput()
                             ->with('errors', $validation->errors() );
        }

        // Process valid data & go to success page //
        $image = Slider::find($id);

        if( $request->hasFile('file_name') ){
           $file = $request->file('file_name');
           $destination_path = 'uploads/';
           $filename = str_random(6).'_'.$file->getClientOriginalName();
           $file->move($destination_path, $filename);
           $image->file_name = $destination_path . $filename;
        }
        
        $image->title = $request->input('title');
        $image->description = $request->input('description');
        $image->save();
        return redirect('slider');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $slider = Slider::find($id);
        $slider->delete();
        return redirect('slider');
    }
}
