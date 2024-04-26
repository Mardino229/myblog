@extends('blog.base')
@section('title', "$post->titre")

@section('content')


<section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="{{$post->imageUrl()}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                {{$post->titre}}
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">{{$post->user->name}}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="{{$post->created_at}}">{{$post->created_at->format('d M, Y')}}</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">{{$post->comment_count}} Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>{{$post->contenu}}</p>
                <!-- <p>
                  Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.
                </p> -->

                <blockquote>
                  <p>{{$post->titre1}}</p>
                </blockquote>

                <p>{{$post->paragraphe1}}</p>
                @if($post->image1)
                <img src="{{$post->imageUrl1()}}" class="img-fluid" alt="">
                @endif
                <blockquote>
                  <p>{{$post->titre2}}</p>
                </blockquote>
                <p>{{$post->paragraphe2}}</p>
                @if($post->image2)
                <img src="{{$post->imageUrl2()}}" class="img-fluid" alt="">
                @endif
                <blockquote>
                  <p>{{$post->titre3}}</p>
                </blockquote>
                <p>{{$post->paragraphe3}}</p>
                @if($post->image3)
                <img src="{{$post->imageUrl3()}}" class="img-fluid" alt="">
                @endif
                <br><br>
                <p>{{$post->conclusion}}</p>
                <x-shareinput/>
              </div>

              <div class="entry-footer">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                @foreach ($post->categorie as $categorie) 
                  <li><a href="#">{{$categorie->name}}</a></li>
                @endforeach
                </ul>
              </div>

            </article><!-- End blog entry -->

            <div class="blog-author d-flex align-items-center">
             @if($post->user->photo)
              <img src="{{$post->user->imageUrl()}}" style="width: 100px;
            height: 100px;
            border-radius: 50%; /* Crée un cercle */
            object-fit: cover;" class="rounded-circle float-left" alt="">
              @endif
              <div>
                <h4>{{$post->user->name}}</h4>
                <div class="social-links">
                  @if ($post->user->linkedin)
                  <a href="{{$post->user->linkedin}}"><i class="bi bi-linkedin"></i></a>
                  @endif
                  @if ($post->user->facebook)
                  <a href="{{$post->user->facebook}}"><i class="bi bi-facebook"></i></a>
                  @endif
                  @if ($post->user->twitter)
                  <a href="{{$post->user->twitter}}"><i class="bi bi-twitter"></i></a>
                  @endif
                </div>
                <p>{{$post->user->about}}</p>
              </div>
            </div><!-- End blog author bio -->

            <div class="blog-comments">

              <h4 class="comments-count">{{$post->comment_count}} Comments</h4>
              @foreach($comments as $comment)
              <div id="comment-1" class="comment">
                <div class="d-flex">
                  <div class="comment-img"><img src="{{asset('assets/img/R (1).png')}}" alt=""></div>
                  <div>
                    <h5><a href="">{{$comment->name}}</a></h5>
                    <time datetime="2020-01-01">{{$comment->created_at->format('d M, Y')}}</time>
                    <p>{{$comment->commentaire}}</p>
                  </div>
                </div>
              </div>
              @endforeach<!-- End comment #1 -->

              <div class="reply-form">
                <h4>Laissez un commentaire</h4>
                <p>Votre adresse email ne sera pas publiée. Les champs requis sont marqués*.</p>
                <form action="{{route('comment', ['slug'=>$post->slug, 'post'=>$post])}}" method = 'post'>
                  @csrf
                  @method('post')
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="name" type="text" class="form-control" placeholder="Nom et prénoms*">
                      <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="email" type="email" class="form-control" placeholder="Email*">
                      <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <input name="website" type="text" class="form-control" placeholder="Website">
                      <x-input-error class="mt-2" :messages="$errors->get('website')" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="commentaire" class="form-control" placeholder="Commentaire*"></textarea>
                      <x-input-error class="mt-2" :messages="$errors->get('commentaire')" />
                    </div>
                  </div>
                  <div class='d-flex gap-2 justify-content-end mt-4'>
                    <button type="submit" class="btn btn-primary">Commenter</button>
                  </div>

                </form>

              </div>

            </div><!-- End blog comments -->

          </div><!-- End blog entries list -->

          @include('blog.sidebar')
          <!-- End blog sidebar -->

        </div>

      </div>
    </section>


@endsection
