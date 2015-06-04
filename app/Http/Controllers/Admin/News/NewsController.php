<?php namespace TagProNews\Http\Controllers\Admin\News;

use Illuminate\Support\Facades\Auth;
use TagProNews\Http\Requests;
use TagProNews\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TagProNews\Http\Requests\Admin\News\StoreArticleRequest;
use TagProNews\Models\Article;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin.news.index')->with('articles', Article::all()->take(10)->toArray());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreArticleRequest $request
     *
     * @return Response
     */
    public function store(StoreArticleRequest $request)
    {
        $article = new Article;
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->category_id = $request->input('category');
        $article->user_id = Auth::id();
        $article->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
