<div class="col-lg-4">
            <div class="sidebar">

              <h3 class="sidebar-title">Rechercher un auteur</h3>
              <div class="bar"></div>
              <div class="sidebar-item search-form">
                <form action=" {{route('blog.postAuth')}}">
                  <input type="text" name = 'name'>
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Articles Populaires</h3>
              <div class="bar"></div>
              <div class="sidebar-item recent-posts">
              @foreach($posts as $post)
              <div class="post-item clearfix">
                  <img src="{{$post->imageUrl()}}" alt="">
                  <h4><a href="{{route('blog.single', ['slug'=>$post->slug, 'post'=>$post])}}">{{$post->titre}}</a></h4>
                  <time datetime="{{$post->created_at}}">{{$post->created_at->format('d M, Y')}}</time>
              </div>
              @endforeach
              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="bar"></div>
              <div class="sidebar-item categories">
                <ul>
                    @foreach($categories as $category)
                        <li><a href="{{route('blog.postCat', $category)}}">{{$category->name}}</a><span>{{$category->article_count}}</span></li>
                    @endforeach
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="bar"></div>
              <div class="sidebar-item tags">
                <ul>
                    @foreach($categories as $category)
                        <li><a href="{{route('blog.postCat', $category)}}">#{{$category->name}}</a></li>
                    @endforeach
                </ul>
              </div><!-- End sidebar tags-->
              <h3 class="sidebar-title">Abonnez-vous</h3>
              <div class="bar"></div>
              <form action="">
                <div class="mt-4 form-group">
                  <input name="email" type="email" class="form-control" placeholder="example@gmail.com">
                  <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
                <input type="submit" value="S'abonner">
              </form>
            </div><!-- End sidebar -->

</div>