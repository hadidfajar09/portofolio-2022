@php
    $blog = DB::table('blogs')->latest()->limit(3)->get();
    
@endphp
<section class="blog">
    <div class="container">
        <div class="row gx-0 justify-content-center">

            @foreach ($blog as $item)
                
         
            <div class="col-lg-4 col-md-6 col-sm-9">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="blog-details.html"><img src="{{ asset($item->image) }}" alt=""></a>
                        <div class="blog__post__tags">
                            <a href="blog.html">Story</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">{{ $item->created_at }}</span>
                        <h3 class="title"><a href="blog-details.html">{{ $item->title }}</a></h3>
                        <a href="blog-details.html" class="read__more">Read more</a>
                    </div>
                </div>
            </div>

            @endforeach
          
        </div>
        <div class="blog__button text-center">
            <a href="blog.html" class="btn">more blog</a>
        </div>
    </div>
</section>