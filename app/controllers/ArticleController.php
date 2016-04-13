<?php

class ArticleController extends \BaseController {



	public function __construct(){

		$this->beforeFilter('auth', array('only' => array('create', 'store', 'edit', 'update', 'destroy')));

	}


	/**
	 * Display a listing of the resource.
	 * GET /article
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$user_id = Auth::id();
	//	echo $user_id;
		$articles = Article::where('user_id', '=', $user_id)->with('user')->orderBy('created_at', 'desc')->paginate(10);

		return View::make('articles.list')->with('articles', $articles);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /article/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('articles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /article
	 *
	 * @return Response
	 */
	public function store(){

		$rules = [

		'title'   => 'required|max:100',

		'content' => 'required',

		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()) {

			$article = Article::create(Input::only('title', 'content'));

			$article->user_id = Auth::id();

			$resolved_content = Markdown::parse(Input::get('content'));

			$article->resolved_content = $resolved_content;


			if (str_contains($resolved_content, '<p>')) {

				$start = strpos($resolved_content, '<p>');

				$length = strpos($resolved_content, '</p>') - $start - 3;

				$article->summary = substr($resolved_content, $start + 3, $length);

			} else if (str_contains($resolved_content, '</h')) {

				$start = strpos($resolved_content, '<h');

				$length = strpos($resolved_content, '</h') - $start - 4;

				$article->summary = substr($resolved_content, $start + 4, $length);

			}

			$article->save();


			return Redirect::route('article.show', $article->id);

		} else {

			return Redirect::route('article.create')->withInput()->withErrors($validator);

		}
	}

	/**
	 * Display the specified resource.
	 * GET /article/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id){
		return View::make('articles.show')->with('article',Article::find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /article/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user_id = Auth::id();
		$article = Article::find($id);
		if($user_id == $article->user_id){
		// echo $id;
			return View::make('articles.edit')->with('article',$article );
		}else{
			return View::make('articles.show')->with('article',$article );;
		}

	}

	/**
	 * Update the specified resource in storage.
	 * PUT /article/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$rules = [

		'title'   => 'required|max:100',

		'content' => 'required',

		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()){

			$user_id = Auth::id();

			$article=Article::find($id);
			if($user_id == $article->user_id){
				$article->title = Input::get('title');
				$article->content=Input::get('content');
				$article->save();
			//$this->show($id);

			}

			return View::make('articles.show')->with('article',Article::find($id));;
		}else{
			return Redirect::route('article.edit')->with('article',$article )->withErrors($validator);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /article/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy_get($id)
	{
		//
		$article = Article::find($id);
		$user_id = Auth::id();
		if($article->user_id == $user_id){
			$article->delete();
		}
		return Redirect::to('article');;;
		
	}

}