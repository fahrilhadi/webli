@php
    $adminFeatureDatas = App\Models\Feature::all();
@endphp

<section class="feature-area section--padding" id="features">
    <div class="container">
        <div class="row text-center pb-5">
            <div class="col">
                <h2 class="section__title theme-font-2 pb-3">Features</h2>
                <p class="section__desc">Personalized learnings for you</p>
            </div>
        </div>
        <div class="row">
            @foreach ($adminFeatureDatas as $index => $adminFeatureData)
                <div class="col-lg-4 responsive-column-half">
                    <div class="info-box info--box hover-y">
                        <div class="icon-element bg-{{ $index + 1 }}">
                            @if ($index === 0)
                                <i class="fa-regular fa-circle-play"></i>
                            @elseif ($index === 1)
                                <i class="fa-solid fa-headphones"></i>
                            @elseif ($index === 2)
                                <i class="fa-solid fa-download"></i>
                            @endif
                        </div>
                        <h3 class="info__title theme-font-2 font-weight-bold">{{ $adminFeatureData->content_title }}</h3>
                        <p class="info__text">{{ $adminFeatureData->content_subtitle }}</p>
                    </div><!-- end info-box -->
                </div><!-- end col-lg-4 -->
            @endforeach
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end feature-area -->