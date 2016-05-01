<?php namespace Curso\Http\Controllers;

use Curso\Http\Requests;
use Curso\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Curso\Post;

class AdminController extends Controller {

	public function __construct(){
		$this->middleware('auth');
	}

	public function index(){
		$posts = \DB::table('posts')->orderBy('id', 'desc')->paginate(10);
		return view('blog')
		->with('posts', $posts);
	}

	public function logout(){
		
		\Auth::logout();

		return \Redirect::route('home');
	}

	public function edit($id){
		$post = Post::find($id);

		return view('edit')
		->with ('post', $post);
	}

	public function refresh($id){
		
		$p = Post::find($id);

		$p->title = \Input::get('title');
		$p->content = \Input::get('content');
		$p->tags = \Input::get('tags');
		$p->photo = \Input::get('photo');
		$p->resluggify();
		$p->save();

		return \Redirect::route('adminsite')
		->with('alert', 'Post has been edited successfully!');
	}

	public function create(){

		return view('nuevo');	

	}

	public function store(){

		$p = new Post;

		$p->title = \Input::get('title');
		$p->content = \Input::get('content');
		$p->tags = \Input::get('tags');
		$p->photo = \Input::get('photo');
		$p->save();

		return \Redirect::route('adminsite')
		->with('alert', 'Post has been created successfully!');

	}

	public function delete($id){

		$post = Post::find($id)->delete();

		return \Redirect::route('adminsite')
		->with('alert', 'Post has been deleted successfully!');
	}

}
