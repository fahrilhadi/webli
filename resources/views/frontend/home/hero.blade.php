<section class="hero-area bg-gray hero-area-4" id="home">
    <div class="hero-slider-item after-none">
        <div class="container">
            <div class="hero-content text-center">
                <div class="section-heading">
                    <h2 class="section__title fs-60 lh-80 pb-3 theme-font-2">Improve Your Listening Skill<br> with Us</h2>
                    <p class="section__desc pb-5">Discover your passion with WeBLI <br> Learns anytime, anywhere!</p>
                </div><!-- end section-heading -->
                <div class="cat-btn-box mt-28px">
                    <a href="#" class="btn theme-btn">Get started <i class="la la-arrow-right icon ml-1"></i></a>
                </div>
            </div><!-- end hero-content -->
        </div><!-- end container -->
    </div><!-- end hero-slider-item -->
</section><!-- end hero-area -->

<script>
    function scrollToSection(e, id) {
        e.preventDefault();

        // Menentukan offset berdasarkan ukuran layar
        let yOffset = 0;
        
        // Cek jika layar kecil (mobile)
        if (window.innerWidth <= 768) {
        yOffset = -50; // lebih besar agar tidak bentrok dengan navbar mobile
        } else {
        yOffset = -80; // offset standar desktop
        }

        const element = document.getElementById(id);
        const y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;

        window.scrollTo({ top: y, behavior: 'smooth' });
    }
</script>
    