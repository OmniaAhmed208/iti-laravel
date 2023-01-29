<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::all(); //return object

        // dd($allPosts); // dd => die dump ==> print and exit

        return view('posts.index',[ // index => show tables
            'posts' => $allPosts,
        ]);

    }


    public function create(){

        $user = User::get();
        return view('posts.create',[
            'Users'=> $user,
        ]);
    }


    public function store(){
        // return 'store in database';
        // dd($_POST);
        $data = request()->all();
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
        ]);

        // return "inserted";
        return to_route(route:'posts.index');
    }


    public function show($postId){
        // @dd($postId);
        $post = Post::find($postId) ;

        return view('posts.show',['post'=>$post]);
    }


    public function edit($postId){

        $users = User::get();
        // // dd($users);
        $post = Post::find($postId);
        // dd($post->title);

        return view('posts.edit',[
            'post' => $post,
            'users' => $users
        ]);
    }

    public function update(Request $request,$postId){

        $posts = POST::find($postId);

        POST::where('id',$postId)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => $request->input('select_post')
        ]);

        // OR

        //     $posts = POST::find($postId);
        //     $posts->title = $request->input('title');
        //     $posts->description = $request->input('description');
        //     $posts->user_id = $request->input('select_post');
        //     $posts->update();

        return redirect('/posts');
    }
}
