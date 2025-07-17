<section class="feature-area section--padding" id="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 responsive-column-half">
                <div class="info-box info--box hover-y">
                    <div class="icon-element bg-1">
                        <i class="fa-regular fa-circle-play"></i>
                    </div>
                    <h3 class="info__title theme-font-2 font-weight-bold">Video Lessons</h3>
                    <p class="info__text">Learn various topics through engaging educational videos</p>
                </div><!-- end info-box -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-4 responsive-column-half">
                <div class="info-box info--box hover-y">
                    <div class="icon-element bg-2">
                        <i class="fa-solid fa-headphones"></i>
                    </div>
                    <h3 class="info__title theme-font-2 font-weight-bold">Audio Lessons</h3>
                    <p class="info__text">Listen to lessons on the go with flexible MP3 audio formats</p>
                </div><!-- end info-box -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-4 responsive-column-half">
                <div class="info-box info--box hover-y">
                    <div class="icon-element bg-3">
                        <i class="fa-solid fa-download"></i>
                    </div>
                    <h3 class="info__title theme-font-2 font-weight-bold">Downloadable Materials</h3>
                    <p class="info__text">Download videos and audios to study offline anytime, anywhere</p>
                </div><!-- end info-box -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end feature-area -->

@push('frontend-addon-script')
<script>
    function scrollToSection(e, id) {
        e.preventDefault();

        const yOffset = -80; // offset scroll
        const element = document.getElementById(id);
        if (!element) return;

        const y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;

        // Scroll dengan animasi
        window.scrollTo({ top: y, behavior: 'smooth' });

        // Ganti hash di address bar
        history.pushState(null, null, `#${id}`);
    }
</script>
@endpush