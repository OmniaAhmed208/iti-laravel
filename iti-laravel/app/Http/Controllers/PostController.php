<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Carbon;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Str; // slug

class PostController extends Controller
{
    public function index()
    {
        // $allPosts = Post::all(); //return object // all()=>show all records
        $allPosts = Post::paginate(3);

        // dd($allPosts); // dd => die dump ==> print and exit

        $current = new Carbon(); //time format Carbon
        $date = $current->toDateString();


        return view('posts.index',[ // index => show tables
            'posts' => $allPosts,
            'date' => $date
        ]);

    }


    public function create(){

        $user = User::get();
        return view('posts.create',[
            'Users'=> $user,
        ]);
    }


    public function store(StorePostRequest $request){
        // Validation before save data in (StorePostRequest) File
        // $request->validate([
        //     'title' => ['required', 'min:3'],
        //     'description' => ['required', 'min:10']
        // ],[
        //     'title.required' => "the title shouldn't be empty", // for change default error msg
        //     'title.min' => "minimum length of the title is 3"
        // ]);

        // return 'store in database';
        // dd($_POST);
        $data = request()->all();
        // or $data = $request->all();
        // dd($data);

        $title = $data['title']; //==> $data['name on input in html']
        $description = $data['description'];
        $userId = $data['select_post'];
        // OR
        // $title = request()->title;
        // $description = request()->description;

        // dd($title);

        Post::create([ // to insert in database
            // 'column-name-in-db'=>'value',
            'title' => $title,
            'description' => $description,
            'user_id' => $userId,
            'slug' => Str::slug($title),
        ]);

        // return "inserted";
        return to_route(route:'posts.index');
    }


    public function show($postId){
        // @dd($postId);
        // $post = Post::find($postId);
        $post = Post::where('slug', $postId)->first();
        // @dd($post->title);

        // for date of show page
        $current = new Carbon();
        $date = $current->isoFormat('LLLL');

        $comments = Comment::get();
        // dd($comments);

        return view('posts.show',[
            'post'=>$post,
            'date'=>$date,
            'comments'=> $comments
        ]);
    }


    public function edit($postId){

        $users = User::get();
        // // dd($users);
        // $post = Post::find($postId);
        $post = Post::where('slug', $postId)->first();
        // dd($post->title);

        return view('posts.edit',[
            'post' => $post,
            'users' => $users
        ]);
    }

    public function update(StorePostRequest $request,$postId){

        // $posts = POST::find($postId);
        $post = Post::where('slug', $postId)->first();

        // POST::where('id',$postId)->update([
        POST::where('slug',$postId)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => $request->input('select_post'),
            'slug' => Str::slug($request->input('title')),
        ]);

        // OR

        //     $posts = POST::find($postId);
        //     $posts->title = $request->input('title');
        //     $posts->description = $request->input('description');
        //     $posts->user_id = $request->input('select_post');
        //     $posts->update();

        return redirect('/posts');
    }


    public function delete($postId){

        $posts = POST::find($postId);
        // POST::where('id',$postId)->delete();
        // OR
        $posts->delete();

        return redirect('/posts');
    }

}

