<div id="topbar" class="fixed-top d-flex align-items-center topbar-inner-pages">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:maxdassi01@gmail.com">maxdassi01@gmail.com</a>
        <i class="bi bi-phone-fill phone-icon"></i> +229 98169295
      </div>
      <div class="cta d-none d-md-block">
        <a href="{{route('register')}}" class="scrollto">Devenir un auteur</a>
      </div>
    </div>
  </div>
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="/">
                    <x-application-logo class="w-40 h-20 fill-current text-gray-500" />
                </a><a href="#">Presento<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="{{route('blog.post')}}">Acceuil</a></li>
          <li class="dropdown"><a href="#"><span>Catégorie</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            @foreach($categories as $category)
                <li><a href="{{route('blog.postCat', $category)}}">{{$category->name}} <span>({{$category->article_count}})</span></a></li>
            @endforeach
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="mailto:maxdassi01@gmail.com">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header>