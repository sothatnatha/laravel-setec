<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Rules\AgeCheckerRule;
use App\Rules\WebsiteChecker;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return Article::all();
        // $articles = Article::orderBy('id', 'DESC')->get();
        // ->where('published');

        $articles = Article::where('trash', '=', 0)->orderByDesc('id')->get();

        // dd($articles);
        return view('admin.articles.index', compact('articles', 'articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:2000',
            'description' => 'required|min:5|max:5000',
            'email' => 'required|email|regex:/.+@.+\..+/iu',
            'url' => ['required', 'url', new WebsiteChecker],
            'newsId' => 'numeric',
            'age' => ['required', 'numeric', new AgeCheckerRule]
        ], [
            'title.required' => 'You must provide a unique title',
            'title.min' => 'អ្នកត្រូវផ្ដល់នូវចំណងជើងយ៉ាងតិច៥តួអក្សរ!',
            'email.regex' => 'អ៊ីមែលរបស់អ្នកមិនត្រូវតាមលក្ខណ្ឌ e.g sothatna@gmail.com',
        ]);

        Article::create($request->all());
        return redirect()
            ->back()
            ->with(
                'message',
                'Created successfully!'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $article = Article::find($id);
        return view('admin.articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $articles = Article::find($id);
        return view('admin.articles.edit', compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->input('published') == null) {
            $public = 0;
        } else {
            $public = $request->input('published');
        }

        // 1
        Article::find($id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'published' => $public
        ]);

        // 2
        // $article = Article::find($id);
        // $article->title = $request->input('title');
        // $article->description = $request->input('description');
        // $article->published = $public;
        // $article -> save();


        // 3
        // dd($request->all());
        // $data = $request->all();
        // $data['published'] = $public;
        // Article::find($id)->update($request->all());


        return redirect('/admin/articles')
            ->with(
                'message',
                'Updated successfully!'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Article::find($id)->update(['trash' => 1]);

        return redirect('/admin/articles')
            ->with('move-trash-success-message', 'Article move to trash successfully');
    }


    public function moveAllToTrash(Request $request)
    {

        // dd($request->all());

        // // get list of articles as arrays of id
        $ids = $request->input('chk_ids');

        if ($ids == null) {
            return redirect('/admin/articles')
                ->with('not-check-message', 'Please check before move to trash.');
        } else {
            //update the trash from 0 to 1
            foreach ($ids as $id) {
                Article::find($id)->update(['trash' => 1]);
            }
            return redirect('/admin/articles')
                ->with('move-to-trash-success-message', 'Articles move to trash successfully');
        }
    }


    // Get  articles trashed
    public function getArticleTrashed()
    {
        $articles = Article::where('trash', '=', 1)->orderByDesc('id')->get();
        return view('admin.articles.trash', compact('articles', 'articles'));
    }

    // put back the article by id
    public function putbackAll(Request $request)
    {
        // dd($request -> all());

        // get array id
        $ids = $request->input('chk_ids');

        if ($ids == null) {
            return redirect('/admin/article/trash')
                ->with('not-check-message', 'Please check before put back.');
        } else {
            foreach ($ids as $id) {
                Article::find($id)->update(['trash' => 0]);
            }
            return redirect('/admin/articles')
                ->with('put-back-success-message', 'Articles has been put back');
        }
    }

    // Delete purges articles
    public function deleteForever($id)
    {
        Article::find($id)->delete();
        return redirect('/admin/article/trash')
            ->with('del-forever-success-message', 'Article deleted successfully!');
    }
}
