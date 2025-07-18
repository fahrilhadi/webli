<section class="footer-area">
    <div class="container pb-12px">
        <div class="row text-center">
            <div class="col-lg-12 responsive-column-half">
                <div class="footer-item text-center">
                    <a href="">
                        <img src="{{ asset('frontend/images/logo.png') }}" alt="footer logo" class="footer__logo">
                    </a>
                    <div class="footer-menu d-flex justify-content-center pt-4">
                        <ul class="social-icons social-icons-styled social--icons-styled text-right">
                            <li class="mr-1"><a href="#"><i class="la la-facebook"></i></a></li>
                            <li class="mr-1"><a href="#"><i class="la la-twitter"></i></a></li>
                            <li class="mr-1"><a href="#"><i class="la la-instagram"></i></a></li>
                            <li class="mr-1"><a href="#"><i class="la la-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="section-block"></div>
    <div class="copyright-content py-4">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <p class="copy-desc">Copyright © 
                        2025{{ date('Y') > 2025 ? ' - ' . date('Y') : '' }}. All rights reserved.</p>
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end copyright-content -->
</section><!-- end footer-area -->