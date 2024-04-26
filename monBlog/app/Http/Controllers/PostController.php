<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\CommentsRequest;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        $categories = Categorie::all();
        return view('blog.post', [
            'posts'=> $posts,
            'categories'=> $categories,
        ]);
    }

    public function indexCat(Categorie $categorie){                 
        $posts = Post::all();
        $categories = Categorie::all();
        return view('blog.postCat', [
            'posts'=> $posts,
            'categories'=> $categories,
            'categorie' => $categorie,
        ]);
    }

    public function indexAuth(Request $request){                 
        $posts = Post::all();
        $categories = Categorie::all();
        $auth = $request->name;
        return view('blog.postAuth', [
            'posts'=> $posts,
            'categories'=> $categories,
            'auth' => $auth,
        ]);
    }

    

    public function show(string $slug, Post $post)
    {
        if ($slug !== $post->slug){
            return to_route('blog.single', ['slug'=>$post->slug, 'post'=>$post]);
        }
        $posts = Post::all();
        $categories = Categorie::all();
        $comments = $post->comments;
        
        return view('blog.single', [
            'post'=>$post,
            'posts'=> $posts,
            'categories'=> $categories,
            'comments' => $comments,
        ]);
    }

    public function commenter(string $slug, Post $post, CommentsRequest $request){
        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->name = $request->input('name');
        $comment->email = $request->input('email');
        $comment->website = $request->input('webite');
        $comment->commentaire = $request->input('commentaire');
        $comment->save();

        return redirect()->back();
    }
}
