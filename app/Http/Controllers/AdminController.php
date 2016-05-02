<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;


class AdminController extends Controller
{
	
    
    public function __construct(){
		$this->middleware('auth');
	}

	public function index(){
		$posts = \DB::table('posts')->orderBy('id', 'desc')->paginate(10);
		return view('admin.blog')
		->with('posts', $posts);
	}

	

	public function edit($id){
		$post = Post::find($id);

		return view('admin.edit')
		->with ('post', $post);
	}

	public function refresh(Request $request,$id){
		
		

		$p = Post::find($id);

		$p->title = $request->input('title');
		$p->content = $request->input('content');
		$p->tags = $request->input('tags');
		$p->photo = $request->input('photo');
		$p->resluggify();
		$p->save();

		return redirect('admin/blog')
		->with('alert', 'Post has been edited successfully!');
	}

	public function create(){

		return view('admin.new');	

	}

	public function store(Request $request){

		

		$p = new Post;

		$p->title = $request->input('title');
		$p->content = $request->input('content');
		$p->tags = $request->input('tags');
		$p->photo = $request->input('photo');
		$p->slug = createSlug($request->input('title'));
		$p->save();

		return redirect('/admin/blog')
		->with('alert', 'Post has been created successfully!');

	}

	public function delete($id){

		$post = Post::find($id)->delete();

		return redirect('/admin/blog')
		->with('alert', 'Post has been deleted successfully!');
	}
}
