@php
    $adminHowToUseDatas = App\Models\HowToUse::all();
@endphp

<section class="benefit-area section--padding" id="how-to-use">
    <div class="course-wrapper">
        <div class="container">
            <div class="section-heading text-center">
                <h2 class="section__title theme-font-2 pb-3">How to Use WeBLI</h2>
                <p class="section__desc">Get started in just a few simple steps and enjoy a seamless learning experience</p>
            </div><!-- end section-heading -->
            <div class="row pt-50px">
                @foreach ($adminHowToUseDatas as $index => $adminHowToUseData)
                    <div class="col-lg-3 responsive-column-half">
                        <div class="info-box info--box info--box-2 hover-s border-{{ ['red','purple','yellow','blue'][$index] ?? 'gray' }}">
                            <div class="icon-element icon-element-md bg-{{ $index + 1 }}">
                                @if ($index === 0)
                                    <i class="fa-regular fa-user"></i>
                                @elseif ($index === 1)
                                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                                @elseif ($index === 2)
                                    <i class="fa-regular fa-folder-open"></i>
                                @elseif ($index === 3)
                                    <i class="fa-solid fa-location-dot"></i>
                                @endif
                            </div>
                            <h3 class="info__title theme-font-2 font-weight-bold fs-20 lh-28">{{ $adminHowToUseData->content_title }}</h3>
                            <p class="info__text">{{ $adminHowToUseData->content_subtitle }}</p>
                        </div><!-- end info-box -->
                    </div><!-- end col-lg-3 -->
                @endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end course-wrapper -->
</section><!-- end benefit-area -->