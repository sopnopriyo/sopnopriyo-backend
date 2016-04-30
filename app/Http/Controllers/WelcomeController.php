<?php namespace Curso\Http\Controllers;

use Curso\Post;

class WelcomeController extends Controller {


	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		$posts = \DB::table('posts')->orderBy('id', 'desc')->paginate(4);

		return view('welcome')
		->with('posts', $posts);
	}

	public function article($slug){

		$post = Post::findBySlug($slug);

		return view('article')
		->with('post', $post);
	}

	public function tags($tag){

		$posts = Post::where('tags', 'LIKE', '%'.$tag.'%')->get();

		return view('tags')
		->with('posts', $posts)
		->with('tag', $tag);
	}

	/* Social Handlings */

	public function twitter(){
		sleep(3);
		return \Redirect::to('https://twitter.com/sopnopriyo');
	}

	public function facebook(){
		sleep(3);
		return \Redirect::to('https://facebook.com/sopnopriyoo');
	}

	public function youtube(){
		sleep(3);
		return \Redirect::to('https://www.youtube.com/channel/UCibtWZdQEgZGjh4GSSpZBPQ');
	}

	public function linkedin(){
		sleep(3);
		return \Redirect::to('https://my.linkedin.com/pub/shahin-alam/94/331/989');
	}

}
