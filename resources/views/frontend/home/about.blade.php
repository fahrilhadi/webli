@php
    $adminAboutDatas = App\Models\About::latest()->get();
@endphp

<section class="about-area section--padding overflow-hidden" id="about">
    @foreach ($adminAboutDatas as $adminAboutData)
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h2 class="section__title theme-font-2 pb-3">{{ $adminAboutData->title }}</h2>
                    <p class="section__desc">{{ $adminAboutData->subtitle }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content pb-3 pt-5">
                        <div class="section-heading">
                            <p class="section__desc text-justify">{!! $adminAboutData->description !!}</p>
                        </div><!-- end section-heading -->
                    </div><!-- end about-content -->
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div>
                        <img src="{{ asset('/storage/public/admin/about/' . $adminAboutData->image) }}" class="img-about" alt="about">
                    </div><!-- end generic-img-box -->
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container -->
    @endforeach
</section><!-- end about-area -->