@php
    $adminFaqDatas = App\Models\Faq::all();
@endphp

<section class="faq-area section--padding" id="faqs">
    <div class="container">
        <div class="section-heading text-center">
            <h2 class="section__title theme-font-2 pb-3">FAQs</h2>
            <p class="section__desc">Get started in just a few simple steps and enjoy a seamless learning experience</p>
        </div>

        <div class="row pt-50px">
            <div class="col-lg-12">
                <div id="accordion" class="generic-accordion generic-accordion-layout-2">
                    @foreach ($adminFaqDatas as $index => $adminFaqData)
                        <div class="card">
                            <div class="card-header" id="heading{{ $index }}">
                                <button class="btn btn-link {{ $index !== 0 ? 'collapsed' : '' }}"
                                        data-toggle="collapse"
                                        data-target="#collapse{{ $index }}"
                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                        aria-controls="collapse{{ $index }}">
                                    <i class="la la-plus"></i>
                                    <i class="la la-minus"></i>
                                    {{ $adminFaqData->content_title }}
                                </button>
                            </div>
                            <div id="collapse{{ $index }}"
                                 class="collapse {{ $index === 0 ? 'show' : '' }}"
                                 aria-labelledby="heading{{ $index }}"
                                 data-parent="#accordion">
                                <div class="card-body">
                                    <p class="card-text">{!! $adminFaqData->content_description !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div><!-- end accordion -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>