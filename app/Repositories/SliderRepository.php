<?php namespace App\Repositories;

use App\Slider;
use Validator;

class SliderRepository extends BaseRepository {

	/**
	 * Create a new SliderRepository instance.
	 *
	 * @param  App\Slider $slider
	 * @return void
	 */
	public function __construct(Slider $slider)
	{
		
		$this->model = $slider;
	}

	/**
	 * Get sliders collection.
	 *
	 * @return Illuminate\Support\Collection
	 */
	public function index()
	{

		//return all the sliders
		
		return $this->model->all();
	}

	/**
	 * Store a slider.
	 *
	 * @param  array $request
	 * @return void
	 */
	public function store($request)
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

        $image = new $this->model;

        $file = $request->file('file_name');
        $destination_path = 'uploads/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $file->move($destination_path, $filename);
        
        $image->file_name = $destination_path . $filename;
        $image->title = $request->input('title');
        $image->description = $request->input('description');
        $image->save();    
         
	}

	/**
	 * Update a slider.
	 *
	 * @param  bool  $vu
	 * @param  int   $id
	 * @return void
	 */
	public function update($request, $id)
	{
		// Validation //
        $validation = \Validator::make($request->all(), [
            'title'     => 'required',
            'description' => 'required',
            'file_name'    => 'image|mimes:jpeg,png|min:1|max:250'
        ]);

        // Check if it fails //
        if( $validation->fails() ){
            return redirect()->back()->withInput()
                             ->with('errors', $validation->errors() );
        }

        // Process valid data & go to success page //
        $image = $this->getById($id);

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
        
	}

	

}