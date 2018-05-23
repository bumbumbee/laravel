<?php
namespace App\Http\Controllers;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cat_id = null)
    {



        if(is_null($cat_id))
            $posts = Post::orderBy('created_at', 'DESC')->paginate(3);
        else
        {
            $posts = Post::where('category', $cat_id)
                ->orderBy('created_at', 'DESC')->paginate(3);
        }

        // $posts = Post::all();
        //Session::put('raktas','reiksme');

        // $titles = $posts->pluck('title', 'category');
        // var_dump($titles);
        // exit;
        return view('posts.index', ['posts' => $posts]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        return view('posts.create', compact('cats'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:250|min:3',
            'content' => 'required|min:5',
        ]);

        $data = $request->all();
        $post = new Post();
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->category = $data['cat'];

        foreach ($data['cat'] as $cat){
            $post->cat->attach($cat);
        }


        $post->user = Auth::user()->id;
        $post->save();

        $request->session()->flash('status', 'Good job!');
        return redirect(route('home'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $user = Auth::user();

        $cats = Category::all();
        if ($user->can('edit', $post))
            return view('posts.edit', [
                'post' => $post,
                'cats' => $cats
            ]);
        else
            return redirect(route('home'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:250|min:3',
            'content' => 'required|min:5',
        ]);

        $data = $request->all();
        $post = Post::find($id);
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->category = $data['cat'];
        $post->user = Auth::user()->id;
        $post->save();
        $request->session()->flash('status', 'Good job! Post updated!');
        return redirect(route('posts.show', ['id' => $post->id]));

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $user = Auth::user();
        if($user->cant('edit', $post))
            return redirect(route('home'));

        $post->delete();
        Session::flash('status', 'Post has been destroyed haha!');
        return redirect(route('home'));
    }
}