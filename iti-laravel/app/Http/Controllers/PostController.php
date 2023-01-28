<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function test()
    {
        $name = "ahmed";
        $booksArray = ['book 1','book 2'];

        return view('test',[
            'name' => $name,
            // or 'name' => 'Ahmed',
            'books' => $booksArray,
        ]);
        // return view('test', compact(var_name: 'name')); // <?php echo $name;
        // or return view(view:'test', data: compact(var_name: 'name'));
        // or return view('test', compact('name'));
    }

    public function index()
    {
        $allPosts = [
            [
                'id' => 1,
                'title' => 'laravel',
                'description' => 'hello laravel post',
                'posted_by' => 'Ali',
                'created_at' => '2022-01-28 10:05:00',
            ],
            [
                'id' => 2,
                'title' => 'php',
                'description' => 'hello php post',
                'posted_by' => 'Ahmed',
                'created_at' => '2022-01-30 10:05:00',
            ],
        ];

        // echo "<pre>";
        // print_r($allPosts);
        // echo "</pre>";
        // exit; // to stop complete execution of the code

        // dd($allPosts); // dd => die dump ==> print and exit

        return view('posts.index',[ // index => show tables
            'posts' => $allPosts,
        ]);

    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
        // return 'store in database';
        $allPosts = [
            [
                'id' => 1,
                'title' => 'laravel',
                'description' => 'hello laravel post',
                'posted_by' => 'Ali',
                'created_at' => '2022-01-28 10:05:00',
            ],
            [
                'id' => 2,
                'title' => 'php',
                'description' => 'hello php post',
                'posted_by' => 'Ahmed',
                'created_at' => '2022-01-30 10:05:00',
            ],
        ];
        return view('posts.index',[
            'posts' => $allPosts,
        ]);
    }

    public function show($postId){
        // @dd($postId);
        $allPosts = [
            [
                'id' => 1,
                'title' => 'laravel',
                'description' => 'hello laravel post',
                'posted_by' => 'Ali',
                'created_at' => '2022-01-28 10:05:00',
            ],
            [
                'id' => 2,
                'title' => 'php',
                'description' => 'hello php post',
                'posted_by' => 'Ahmed',
                'created_at' => '2022-01-30 10:05:00',
            ],
        ];

        for($i=0 ; $i<count($allPosts);$i++){
            if($allPosts[$i]['id'] == $postId){
                return view('posts.show',[
                    'title'=> $allPosts[$i]['title'],
                    'description'=> $allPosts[$i]['description'],
                    'posted_by'=> $allPosts[$i]['posted_by'],
                    'created_at'=> $allPosts[$i]['created_at']
                ]);
            }
        }
    }

    public function edit($postId){
        $allPosts = [
            [
                'id' => 1,
                'title' => 'laravel',
                'description' => 'hello laravel post',
                'posted_by' => 'Ali',
                'created_at' => '2022-01-28 10:05:00',
            ],
            [
                'id' => 2,
                'title' => 'php',
                'description' => 'hello php post',
                'posted_by' => 'Ahmed',
                'created_at' => '2022-01-30 10:05:00',
            ],
        ];

        for($i=0 ; $i<count($allPosts);$i++){
            if($allPosts[$i]['id'] == $postId){
                return view('posts.edit',[
                    'title'=> $allPosts[$i]['title'],
                    'description'=> $allPosts[$i]['description'],
                    'posted_by'=> $allPosts[$i]['posted_by'],
                    'created_at'=> $allPosts[$i]['created_at']
                ]);
            }
        }
        // return view('update');
    }

    public function update($postId){
        return 'updated';
    }
}
