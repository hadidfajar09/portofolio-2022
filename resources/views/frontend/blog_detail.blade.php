@extends('frontend.master')

@section('title')
    Blog | {{ $blog->title }}
@endsection

@section('content')
<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">{{ $blog->title }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
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


    <!-- blog-details-area -->
    <section class="standard__blog blog__details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="standard__blog__post">
                        <div class="standard__blog__thumb">
                            <img src="{{ asset($blog->image) }}" style="width: 850px; height: 430px;" alt="">
                        </div>
                        <div class="blog__details__content services__details__content">
                            <ul class="blog__post__meta">
                                <li><i class="fal fa-calendar-alt"></i> {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</li>
                            </ul>
                            <h2 class="title">{{ $blog->title }}</h2>
                            <p>{!! $blog->description !!}</p>
                          
                           
                            <div class="services__details__img">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <img src="assets/img/blog/blog_details_img01.jpg" alt="">
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="assets/img/blog/blog_details_img02.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <div class="blog__details__bottom">
                            <ul class="blog__details__tag">
                                <li class="title">Tag:</li>
                                <li class="tags-list">
                                    @foreach ($mytag as $item)
                                        
                                    <a href="#">{{ $item }}</a>
                                    @endforeach
                                   
                                </li>
                            </ul>
                            <ul class="blog__details__social">
                                <li class="title">Share :</li>
                                <li class="social-icons">
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-twitter-square"></i></a>
                                    <a href="#"><i class="fab fa-linkedin"></i></a>
                                    <a href="#"><i class="fab fa-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="blog__next__prev">
                            <div class="row justify-content-between">
                                <div class="col-xl-5 col-md-6">
                                    <div class="blog__next__prev__item">
                                        <h4 class="title">Previous Post</h4>
                                        <div class="blog__next__prev__post">
                                            <div class="blog__next__prev__thumb">
                                                <a href="blog-details.html"><img src="assets/img/blog/blog_prev.jpg" alt=""></a>
                                            </div>
                                            <div class="blog__next__prev__content">
                                                <h5 class="title"><a href="blog-details.html">Digital Marketing Agency Pricing Guide.</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-6">
                                    <div class="blog__next__prev__item next_post text-end">
                                        <h4 class="title">Next Post</h4>
                                        <div class="blog__next__prev__post">
                                            <div class="blog__next__prev__thumb">
                                                <a href="blog-details.html"><img src="assets/img/blog/blog_next.jpg" alt=""></a>
                                            </div>
                                            <div class="blog__next__prev__content">
                                                <h5 class="title"><a href="blog-details.html">App Prototyping
                                                Types, Example & Usages.</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
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
                      
                        <div class="widget">
                            <h4 class="widget-title">Popular Tags</h4>
                            <ul class="sidebar__tags">
                                <li><a href="blog.html">Business</a></li>
                                <li><a href="blog.html">Design</a></li>
                                <li><a href="blog.html">apps</a></li>
                                <li><a href="blog.html">landing page</a></li>
                                <li><a href="blog.html">data</a></li>
                                <li><a href="blog.html">website</a></li>
                                <li><a href="blog.html">book</a></li>
                                <li><a href="blog.html">Design</a></li>
                                <li><a href="blog.html">product design</a></li>
                                <li><a href="blog.html">landing page</a></li>
                                <li><a href="blog.html">data</a></li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-details-area-end -->


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