<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Portfolio;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::orderBy('created_at', 'desc')->paginate(8);

        return view('portfolios.index')->with('portfolios',$portfolios);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function frontEndPortfolio()
    {
        $portfolios = Portfolio::orderBy('created_at', 'desc')->paginate(8);

        return view('portfolios.frontEndPortfolio')->with('portfolios',$portfolios);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'url' => 'required',
            'image'    =>  'required|image|mimes:png,jpg,jpeg,gif,bmp'
        ]);
        if ($validator->fails()) {
            return redirect('/new-portfolio')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        // if pass validation
        $image_name = $request->file('image')->getClientOriginalName(); 
        
        $request->file('image')
            ->move( public_path(). '/images/upload/', strtolower('portfolio-'.$image_name));
      

        $image_location = '/images/upload/' .'portfolio-'. $image_name ;

        $portfolio = new Portfolio;
        $portfolio->name = $request->input('name');
        $portfolio->url = $request->input('url');
        $portfolio->description = $request->input('description');
        $portfolio->image = $image_location;
        $portfolio->save();
        
        return redirect('/all-portfolios')->with('message', 'Successfully added portfolio!');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolio = Portfolio::where('id',$id)->first();
        
        return view('portfolios.edit')->with('portfolio',$portfolio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $id = $request->input('id');
        $portfolio = Portfolio::find($id);
        if($portfolio)
        {
            $name = $request->input('name');
            $url = $request->input('url');
            $description = $request->input('description');

            $portfolio->name = $name;
            $portfolio->url = $url;
            $portfolio->description = $description;
            
            if($request->hasFile('image'))
            {
                $filename = public_path().$portfolio->image;
                \File::delete($filename);

                $image_name = $request->file('image')->getClientOriginalName(); 
        
                $request->file('image')
                    ->move( public_path(). '/images/upload/', strtolower('portfolio-'.$image_name));
              
                $image_location = '/images/upload/' .'portfolio-'. $image_name ; 

                $portfolio->image = $image_location;  
               
            }           
            $message = 'Portfolio updated successfully';
            $portfolio->save();
            return redirect('all-portfolios')->withMessage($message);
        }
        else
        {
            return redirect('/')->withErrors('you have not sufficient permissions');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        if($portfolio)
        {
            $portfolio->delete();
            $message = 'Portfolio deleted successfully';
        }
        else 
        {
            $message = 'Portfolio delete was successful';
        }
        
        return redirect('/all-portfolios')->withMessage($message);
    }
}
