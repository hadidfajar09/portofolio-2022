@php
    $blog = App\Models\Blog::latest()->limit(3)->get();
    
@endphp
<section class="blog">
    <div class="container">
        <div class="row gx-0 justify-content-center">

            @foreach ($blog as $item)
                
         
            <div class="col-lg-4 col-md-6 col-sm-9">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="{{ route('blog.detail',$item->id) }}"><img src="{{ asset($item->image) }}" style="width: 430px; height: 327px;" alt=""></a>
                        <div class="blog__post__tags">
                            <a href="{{ route('show.category', Str::lower($item['category']['category_name'])  ) }}">{{ $item['category']['category_name'] }}</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                        <h3 class="title"><a href="{{ route('blog.detail',$item->id) }}">{{ $item->title }}</a></h3>
                        <a href="{{ route('blog.detail',$item->id) }}" class="read__more">Read more</a>
                    </div>
                </div>
            </div>

            @endforeach
          
        </div>
        <div class="blog__button text-center">
            <a href="{{ route('show.blog') }}" class="btn">more blog</a>
        </div>
    </div>
</section>