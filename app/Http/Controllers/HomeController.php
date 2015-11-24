<?php

namespace App\Http\Controllers;

use App\Jobs\ChangeLocale;
use App\Slider;
class HomeController extends Controller
{

	/**
	 * Display the home page.
	 *
	 * @return Response
	 */
	public function index()
	{

		$sliders = Slider::all();
		return view('front.index',compact('sliders'));
	}

	/**
	 * Change language.
	 *
	 * @param  App\Jobs\ChangeLocaleCommand $changeLocaleCommand
	 * @return Response
	 */
	public function language(
		ChangeLocale $changeLocale)
	{
		$this->dispatch($changeLocale);

		return redirect()->back();
	}

}
