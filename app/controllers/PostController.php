<?php

class PostController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		$posts = Entrada::All();
		return View::make('admin.post.index')->with('posts', $posts);
	}

	public function getEdit($id)
	{
		$post = Entrada::find($id);
		return View::make('admin.post.edit')->with('post', $post);
	}

	public function getData(){
		if (Request::ajax()) {
			$post = Entrada::find(Input::get('post_id'));
			return Response::json(array(
	        	"post"		=>		$post,
	        	"tags"		=>		$post->tags()->lists('name')
	    	));
		}
	}

	public function postEdit(){
		// if(Request::ajax()){
			// Esto nos devolvería una cadena de texto, que si quieres volcar a un objeto nativo de PHP usarás la función json_decode()
			$objDatos = json_decode(file_get_contents("php://input"));
			$post = Entrada::find($objDatos->id);
			$post->titulo = $objDatos->tittle_post;
			$post->body = $objDatos->content_post;
			$all_tags = array();
			$tags = array();
			foreach ($objDatos->movies as $movie) {
				array_push($all_tags, $movie->text);
				$tag = Tag::where('name', '=', $movie->text)->first();
				if($tag === null){
					$tag = new Tag;
					$tag->name = $movie->text;
					$tag->save();
				}
				// $tag = Tag::firstOrNew(array('name' => $movie->text));
				// $tag = Tag::firstOrCreate(array('name' => $movie->text));
				if(is_null($post->tags()->where('name', '=', $tag->name)->first())){
					array_push($tags, $tag);
				}
			}
			// $post->tags()->save($tag);
			$post->tags()->saveMany($tags);
			$tags_eliminar = array_diff($post->tags()->lists('name'), $all_tags);
			foreach ($tags_eliminar as $name_tag) {
				$tag = Tag::where('name','=', $name_tag)->first();
				$post->tags()->detach($tag);
			}
			$post->save();
			// return Response::json($tags_eliminar);

		// }
		// $post = Entrada::find($id);
		// $post->titulo = Input::get('tittle_post');
		// $post->body = Input::get('content_post');
		// // $post->save();

		// $list_tags = Input::get('list_tags');

		// return $list_tags;
		// // $post->tag->

		// return Redirect::To('admin/posts');
	}

	public function getCreate()
	{
		return View::make('admin.post.create');
	}

	public function postCreate(){
		$post = new Entrada;
		$post->titulo = Input::get('tittle_post');
		$post->body = Input::get('content_post');
		$post->date = date('Y-n-N H:i:s');
		$post->admin_id = Auth::id();
		$post->save();
		return Redirect::To('admin/posts');
	}

}
