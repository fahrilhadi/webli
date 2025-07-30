@php
    $adminHomeDatas = App\Models\Home::latest()->get();
@endphp

<section class="hero-area bg-gray hero-area-4">
    <div class="hero-slider-item after-none">
        <div class="container">
            @foreach ($adminHomeDatas as $adminHomeData)
                <div class="hero-content text-center">
                    <div class="section-heading">
                        <h2 class="section__title fs-60 lh-80 pb-3 theme-font-2">{!! $adminHomeData->title !!}</h2>
                        <p class="section__desc pb-5">{!! $adminHomeData->subtitle !!}</p>
                    </div><!-- end section-heading -->
                    <div class="cat-btn-box mt-28px">
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn theme-btn">Get started <i class="la la-arrow-right icon ml-1"></i></a>
                            @else
                            <a href="#" class="btn theme-btn" data-toggle="modal" data-target="#registerModal">Get started <i class="la la-arrow-right icon ml-1"></i></a>
                        @endauth
                    </div>
                </div><!-- end hero-content -->
            @endforeach
        </div><!-- end container -->
    </div><!-- end hero-slider-item -->
</section><!-- end hero-area -->
    