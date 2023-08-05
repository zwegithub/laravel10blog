<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;


use Illuminate\Pagination\Paginator;
use DB;



class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'detail']);
    }

    public function index()
    {
        // DB::enableQueryLog();

        // $articles = Article::all();

        // dd(DB::getQueryLog());
        $articles = Article::latest()->paginate(5);
        // $articles = [
        //     [
        //         'id' => 1,
        //         'title' => 'First Article'
        //     ],
        //     [
        //         'id' => 2,
        //         'title' => 'Second Article'
        //     ]
        // ];
        // foreach($articles as $article) {
        //     echo $article['id'];
        //     echo ' - ';
        //     echo $article['title'];
        //     echo "<br/>";
        // }
        return view('articles.index', ['articles' => $articles]);

    }

    public function detail($id)
    {

        $article = Article::find($id);
        
        return view('articles.detail', ['article' => $article]);

    }

    public function add()
    {
        // Create an array of category objects
        $categories = array();
       
        $category1 = new \stdClass();
        $category1->id = 1;
        $category1->name = "Books";
        $categories[] = $category1;
       
        $category2 = new \stdClass();
        $category2->id = 2;
        $category2->name = "Electronics";
        $categories[] = $category2;

        return view('articles.add', ['categories' => $categories]);
    }
   
    public function create()
    {
        $validator = validator(request()->all(), [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);


        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        $article = new Article;
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();


        return redirect('/articles');
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();


        return redirect('/articles')->with('info', 'An article has been deleted!');


    }








}
