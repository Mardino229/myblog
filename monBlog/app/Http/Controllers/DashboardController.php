<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function dashboard(){
        $user = auth()->user();
        //$posts = Post::all(); //select
        $posts = $user->posts();
        return view('dashboard');
    }

    public function gestion(){
        $user = auth()->user();
        $posts = $user->posts; 
        return view('management', [
            'posts'=> $posts,
        ]);
    }

    public function store(CreatePostRequest $request){
        // $post = Post::create($this->extractData(new Post,$request));
        $post = new Post();
        if (auth()->check()) {
            // L'utilisateur est connecté
            $user = auth()->user();
        } else {
            return redirect('/login');
        }
        $post->user_id = $user->id;
        $post->titre = $request->input('titre');
        $post->slug = $request->input('slug');
        $post->contenu = $request->input('contenu');

        $post->titre1 = $request->input('titre1');
        $post->titre2 = $request->input('titre2');
        $post->titre3 = $request->input('titre3');

        $post->paragraphe1 = $request->input('paragraphe1');
        $post->paragraphe2 = $request->input('paragraphe2');
        $post->paragraphe3 = $request->input('paragraphe3');

        $image = $request->validated('image');
        $image1 = $request->validated('image1');
        $image2 = $request->validated('image2');
        $image3 = $request->validated('image3');
        if ($image) {
            $post->image = $image->store('blog', 'public');
        }
        if ($image1) {
            $post->image1 = $image1->store('blog', 'public');
        }
        if ($image2) {
            $post->image2 = $image2->store('blog', 'public');
        }
        if ($image3) {
            $post->image3 = $image3->store('blog', 'public');
        }

        $post->conclusion = $request->input('conclusion');

        $post->save();
        $post->categorie()->sync($request->validated('categories'));
        return to_route('management')->with('success', 'Le bien a bien été créé');
    }

    private function imagevalid($image, $post){
        if ($image) {
            $post->image = $image->store('blog', 'public');
        }
    }

    public function create(){
        $post = new Post();
        $categories = Categorie::all();
        return view('create', [
            'post' => $post,
            'categories'  => Categorie::pluck('name', 'id'),
        ]);
    }

    private function extractData(Post  $post,CreatePostRequest $request):array {       
        $data = $request->validated();
        if (auth()->check()) {
            // L'utilisateur est connecté
            $user = auth()->user(); // Récupérez l'utilisateur courant
            $data['user_id']= $user->id; // Affectez l'ID de l'utilisateur courant
        } else {
            // L'utilisateur n'est pas connecté
            // Redirigez-le vers la page de connexion ou affichez un message d'erreur
            return redirect('/login');
        }
        $image = $request->validated('image');
        if (!($image===null||$image->getError())) {
            if ($post->image){
                Storage::disk('public')->delete($post->image);
            } 
            $data['image'] = $image->store('blog', 'public');
        }

        $image1 = $request->validated('image1');
        if (!($image1===null||$image1->getError())) {
            if ($post->image1){
                Storage::disk('public')->delete($post->image1);
            } 
            $data['image1'] = $image1->store('blog', 'public');
        }

        $image2 = $request->validated('image2');
        if (!($image2===null||$image2->getError())) {
            if ($post->image2){
                Storage::disk('public')->delete($post->image2);
            } 
            $data['image2'] = $image2->store('blog', 'public');
        }

        $image3 = $request->validated('image3');
        if (!($image3===null||$image3->getError())) {
            if ($post->image3){
                Storage::disk('public')->delete($post->image3);
            } 
            $data['image3'] = $image3->store('blog', 'public');
        }
        
        return $data;
    }

    public function edit(Post $post){
        return  view('create', [
            'post' => $post,
            'categories'  => Categorie::pluck('name', 'id'),
        ]);
    }

    public function update(CreatePostRequest $request , Post $post){
        $post->update($this->extractData($post,$request));
        $post->categorie()->sync($request->validated('categories'));
        return  redirect('management');
    }

    public function delete(Post $post)
    {
        if ($post->image){
            Storage::disk('public')->delete($post->image);
        }
        if ($post->image1){
            Storage::disk('public')->delete($post->image1);
        }
        if ($post->image2){
            Storage::disk('public')->delete($post->image2);
        }
        if ($post->image3){
            Storage::disk('public')->delete($post->image3);
        }
        $post->delete();
        return to_route('management')->with('success', 'Le bien a bien  été supprimé');
    }

}
