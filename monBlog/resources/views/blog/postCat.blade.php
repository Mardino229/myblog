@extends('blog.base')
@section('title', 'Accueil')


@section('content')
<?php
$a = true ;
?>
<section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-8 entries">
            <h2>Categorie: {{$categorie->name}}</h2>
            <div class="bar"></div>
            @foreach($posts as $post)
            @foreach ($post->categorie as $category)
            @if ($category->name === $categorie->name)
            <article class="entry">
                <div class="entry-img">
                <img src="{{$post->imageUrl()}}" alt="" class="img-fluid">
                </div>

                <h2 class="entry-title">
                <a href="{{route('blog.single', ['slug'=>$post->slug, 'post'=>$post])}}">{{$post->titre}}</a>
                </h2>

                <div class="entry-meta">
                <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="{{route('blog.single', ['slug'=>$post->slug, 'post'=>$post])}}">{{$post->user->name}}</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="{{route('blog.single', ['slug'=>$post->slug, 'post'=>$post])}}"><time datetime="2020-01-01">{{$post->created_at->format('d M, Y')}}</time></a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="{{route('blog.single', ['slug'=>$post->slug, 'post'=>$post])}}">{{$post->comment_count}} Comments</a></li>
                </ul>
                </div>

                <div class="entry-content">
                <p>{{$post->contenu}}</p>
                <div class="read-more">
                    <a href="{{route('blog.single', ['slug'=>$post->slug, 'post'=>$post])}}">Lire</a>
                </div>
                </div>
            </article>
            <?php
            $a = false ;
            ?>
            @endif
            @endforeach
            @endforeach
            @if($a)
            <p class= 'mb-4'>Aucun article trouvé</p>
            @endif

          </div><!-- End blog entries list -->
          @include('blog.sidebar')
          <!-- End blog sidebar -->

        </div>

      </div>
    </section>

@endsection