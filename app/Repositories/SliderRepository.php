<?php namespace App\Repositories;

use App\Slider;

class SliderRepository extends BaseRepository {

	/**
	 * Create a new ContactRepository instance.
	 *
	 * @param  App\Models\Contact $contact
	 * @return void
	 */
	public function __construct(Slider $slider)
	{
		
		$this->model = $slider;
	}

	/**
	 * Get contacts collection.
	 *
	 * @return Illuminate\Support\Collection
	 */
	public function index()
	{

		 //$sliders = Slider::all();
		return $this->model
		->all();
	}

	/**
	 * Store a contact.
	 *
	 * @param  array $inputs
	 * @return void
	 */
	public function store($inputs)
	{
		 
	}

	/**
	 * Update a contact.
	 *
	 * @param  bool  $vu
	 * @param  int   $id
	 * @return void
	 */
	public function update($seen, $id)
	{
		$contact = $this->getById($id);

		$contact->seen = $seen == 'true';

		$contact->save();
	}

}