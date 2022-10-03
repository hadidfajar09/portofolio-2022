@php
    $about = DB::table('abouts')->first();
    $multi = DB::table('multi_images')->limit(7)->orderBy('id','desc')->get()
@endphp

<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <ul class="about__icons__wrap">
                    

                    @foreach ($multi as $row)
                    <li><img style="width: 220px;" class="light" src="{{ asset($row->image) }}" alt=""></li>
                        
                    @endforeach
                    
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <span class="sub-title">01 - About me</span>
                        <h2 class="title">{{ $about->title }}</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="{{ asset('frontend/assets/img/icons/about_icon.png') }}" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p>{{ $about->short_title }}</p>
                        </div>
                    </div>
                    <p class="desc">{{ $about->short_deskripsi }}</p>
                    <a href="about.html" class="btn">Download my resume</a>
                </div>
            </div>
        </div>
    </div>
</section>
