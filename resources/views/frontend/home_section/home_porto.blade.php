@php
    $porto = DB::table('portfolios')->orderBy('id','desc')->get();
@endphp

<section class="portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">04 - Portfolio</span>
                    <h2 class="title">All creative work</h2>
                </div>
            </div>
        </div>
     
    </div>
    <div class="tab-content" id="portfolioTabContent">
        <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">
                            @foreach ($porto as $row)
                                
                            
                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="{{ asset($row->image) }}" alt="">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>{{ $row->name }}</span>
                                    <h4 class="title"><a href="portfolio-details.html">{{ $row->title }}</a></h4>
                                    <a href="portfolio-details.html" class="link">More Detail</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>