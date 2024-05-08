@include('layout_frontend.header')
@include('layout_frontend.sidebar_page')



<div role="main" class="main">

    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
        <div class="container">
            <div class="row">

                <div class="col-md-12 align-self-center p-static order-2 text-center">

                    <h1 class="text-dark font-weight-bold text-8">News</h1>
<span class="sub-title text-dark">Check out our Latest News!</span>
                </div>

                <div class="col-md-12 align-self-center order-1">

                    <ul class="breadcrumb d-block text-center">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Post</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">

        <div class="row">
            <div class="col-lg-3 order-lg-2">
                <aside class="sidebar">
                    <form action="page-search-results.html" method="get">
                        <div class="input-group mb-3 pb-1">
                            <input class="form-control text-1" placeholder="Search..." name="s" id="s" type="text">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
                            </span>
                        </div>
                    </form>
                    <h5 class="font-weight-bold pt-4">Categories</h5>
                    <ul class="nav nav-list flex-column mb-5">
                        <li class="nav-item"><a class="nav-link" href="#">Design (2)</a></li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Photos (4)</a>
                            <ul>
                                <li class="nav-item"><a class="nav-link" href="#">Animals</a></li>
                                <li class="nav-item"><a class="nav-link active" href="#">Business</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Sports</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">People</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Videos (3)</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Lifestyle (2)</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Technology (1)</a></li>
                    </ul>
                    <div class="tabs tabs-dark mb-4 pb-2">
                        <ul class="nav nav-tabs">
                            <li class="nav-item active"><a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#popularPosts" data-toggle="tab">Popular</a></li>
                            <li class="nav-item"><a class="nav-link text-1 font-weight-bold text-uppercase" href="#recentPosts" data-toggle="tab">Recent</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="popularPosts">
                                <ul class="simple-post-list">
                                    <li>
                                        <div class="post-image">
                                            <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                                <a href="blog-post.html">
                                                    <img src="img/blog/square/blog-11.jpg" width="50" height="50" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="post-info">
                                            <a href="blog-post.html">Nullam Vitae Nibh Un Odiosters</a>
                                            <div class="post-meta">
                                                 Nov 10, 2020
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="post-image">
                                            <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                                <a href="blog-post.html">
                                                    <img src="img/blog/square/blog-24.jpg" width="50" height="50" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="post-info">
                                            <a href="blog-post.html">Vitae Nibh Un Odiosters</a>
                                            <div class="post-meta">
                                                 Nov 10, 2020
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="post-image">
                                            <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                                <a href="blog-post.html">
                                                    <img src="img/blog/square/blog-42.jpg" width="50" height="50" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="post-info">
                                            <a href="blog-post.html">Odiosters Nullam Vitae</a>
                                            <div class="post-meta">
                                                 Nov 10, 2020
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane" id="recentPosts">
                                <ul class="simple-post-list">
                                    <li>
                                        <div class="post-image">
                                            <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                                <a href="blog-post.html">
                                                    <img src="img/blog/square/blog-24.jpg" width="50" height="50" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="post-info">
                                            <a href="blog-post.html">Vitae Nibh Un Odiosters</a>
                                            <div class="post-meta">
                                                 Nov 10, 2020
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="post-image">
                                            <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                                <a href="blog-post.html">
                                                    <img src="img/blog/square/blog-42.jpg" width="50" height="50" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="post-info">
                                            <a href="blog-post.html">Odiosters Nullam Vitae</a>
                                            <div class="post-meta">
                                                 Nov 10, 2020
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="post-image">
                                            <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                                <a href="blog-post.html">
                                                    <img src="img/blog/square/blog-11.jpg" width="50" height="50" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="post-info">
                                            <a href="blog-post.html">Nullam Vitae Nibh Un Odiosters</a>
                                            <div class="post-meta">
                                                 Nov 10, 2020
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <h5 class="font-weight-bold pt-4">About Us</h5>
                    <p>Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Nulla nunc dui, tristique in semper vel. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. </p>
                </aside>
            </div>
            <div class="col-lg-9 order-lg-1">
                <div class="blog-posts">

                    <div class="row px-3">



                        @foreach ($berita as $item)
                        <div class="col-sm-6">
                            <article class="post post-medium border-0 pb-0 mb-5">
                                <div class="post-image">
                                    <a href="blog-post.html">
                                        <img src="{{ ('/images/post/'. $item->avatar) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                    </a>
                                </div>

                                <div class="post-content">

                                    <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="{{ url('post/detail_post/'.$item->title_slug) }}">{{ $item->post_title}}</a></h2>
                                    <p>{!! Str::limit($item->content, 300, '...') !!}</p>

                                    <div class="post-meta">
                                        <span><i class="far fa-calendar-alt"></i> {{ date('d F Y', strtotime($item->post_date)) }} </span>
                                        <span><i class="far fa-user"></i> By <a href="#">{{ $item->author}}</a> </span>
                                        <span><i class="far fa-folder"></i> <a href="#">{{ $item->kategori_post->nama_kategori}} </span>
                                        <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span>
                                        <span class="d-block mt-2"><a href="{{ url('post/detail_post/'.$item->title_slug) }}" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                                    </div>

                                </div>
                            </article>
                        </div>
                        @endforeach

                    </div>

                    <div class="row">
                        <div class="col">
                            <ul class="pagination float-right">
                                {!! $berita->links() !!}
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

  {{-- <section class="ftco-intro ftco-section ftco-no-pt">
   <div class="container">
    <div class="row justify-content-center">
     <div class="col-md-12 text-center">
      <div class="img"  style="background-image: url(images/bg_2.jpg);">
       <div class="overlay"></div>
       <h2>We Are Pacific A Travel Agency</h2>
       <p>We can manage your dream building A small river named Duden flows by their place</p>
       <p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Ask For A Quote</a></p>
     </div>
   </div>
  </div>
  </div>
  </section> --}}
  @include('layout_frontend.footer')
