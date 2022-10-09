@extends('frontend.master')

@section('title')
    All Blog
@endsection

@section('content')

<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">All BLOGS</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="gbreadcrumb-item active"><a href="index.html">Blog</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__wrap__icon">
            <ul>
                @foreach ($multi as $item)
                    
                <li><img src="{{ asset($item->image) }}" alt=""></li>
                @endforeach
            </ul>
        </div>
    </section>
    <!-- breadcrumb-area-end -->


    <!-- blog-area -->
    <section class="standard__blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    @foreach ($blog as $item)
                        
                    
                    <div class="standard__blog__post">
                        <div class="standard__blog__thumb">
                            <a href="{{ route('blog.detail',$item->id) }}"><img src="{{ asset($item->image) }}" style="width: 850px; height: 430px;" alt=""></a>
                            <a href="{{ route('blog.detail',$item->id) }}" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                        </div>
                        <div class="standard__blog__content">
                          
                            <h2 class="title"><a href="{{ route('blog.detail',$item->id) }}">{{ $item->title }}</a></h2>
                            <p>{!! Str::limit($item->description, 200) !!}</p>
                            <ul class="blog__post__meta">
                                <li><i class="fal fa-calendar-alt"></i> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</li>
                            </ul>
                        </div>
                    </div>

                    @endforeach
                    
                  <div style="float: right;">

                      {{ $blog->links('pagination::bootstrap-4') }}
                  </div>
                </div>
                <div class="col-lg-4">
                    <aside class="blog__sidebar">
                        <div class="widget">
                            <form action="#" class="search-form">
                                <input type="text" placeholder="Search">
                                <button type="submit"><i class="fal fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Recent Blog</h4>


                           <ul class="rc__post">
                                @foreach ($all_blog as $item)
                                <li class="rc__post__item">
                                    <div class="rc__post__thumb">
                                        <a href="{{ route('blog.detail',$item->id) }}"><img src="{{ asset($item->image) }}" style="width: 90px; height: 90px;" alt=""></a>
                                    </div>
                                    <div class="rc__post__content">
                                        <h5 class="title"><a href="{{ route('blog.detail',$item->id) }}">{{ $item->title }}</a></h5>
                                        <span class="post-date"><i class="fal fa-calendar-alt"></i> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                    </div>
                                </li>
                                @endforeach
                               
                            </ul>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Categories</h4>
                            <ul class="sidebar__cat">
                                @foreach ($category as $item)
                                    
                                <li class="sidebar__cat__item"><a href="{{ route('show.category', $item->id) }}">{{ $item->category_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                     
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->


    <!-- contact-area -->
    <section class="homeContact homeContact__style__two">
        <div class="container">
            <div class="homeContact__wrap">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section__title">
                            <span class="sub-title">07 - Say hello</span>
                            <h2 class="title">Any questions? Feel free <br> to contact</h2>
                        </div>
                        <div class="homeContact__content">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                            <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="homeContact__form">
                            <form action="#">
                                <input type="text" placeholder="Enter name*">
                                <input type="email" placeholder="Enter mail*">
                                <input type="number" placeholder="Enter number*">
                                <textarea name="message" placeholder="Enter Massage*"></textarea>
                                <button type="submit">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->

</main>

@endsection