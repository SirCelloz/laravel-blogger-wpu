<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use PharIo\Manifest\Author;

class PostController extends Controller{

    public function posts(){

        $title = 'posts';

        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = $category->name;
        }
        
        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = $author->name;
        }

        return view('post.posts', [
            'title' => $title,
            'posts'=> Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
            /* Post::with(['author','category'])->latest()->get() */
        ]);
        
    }


    public function show(Post $post){
        return view('post.post', [
            'title' => 'single post',
            'post' => $post     // Post::find($slug)
        ]);
    }


}
