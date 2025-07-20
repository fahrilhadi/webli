<!-- template js files -->
<script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/isotope.js') }}"></script>
<script src="{{ asset('frontend/js/waypoint.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('frontend/js/fancybox.js') }}"></script>
<script src="{{ asset('frontend/js/datedropper.min.js') }}"></script>
<script src="{{ asset('frontend/js/emojionearea.min.js') }}"></script>
<script src="{{ asset('frontend/js/tooltipster.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.lazy.min.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>

{{-- iziToast --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">
<script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>

<script>
    @if(Session::has('toastr_errors'))
        $('#registerModal').modal('show');
    @endif
</script>

@if ($errors->any())
  <script>
    $(document).ready(function() {
      $('#loginModal').modal('show');
    });
  </script>
@endif

<script>
    // Saat modal register dibuka, tutup login modal
    $('#registerModal').on('show.bs.modal', function () {
        $('#loginModal').modal('hide');
    });

    // Saat modal login dibuka, tutup register modal
    $('#loginModal').on('show.bs.modal', function () {
        $('#registerModal').modal('hide');
    });

    // Saat modal recovery dibuka, tutup login modal
    $('#recoveryModal').on('show.bs.modal', function () {
        $('#loginModal').modal('hide');
    });

    // Saat modal login dibuka, tutup recovery modal
    $('#loginModal').on('show.bs.modal', function () {
        $('#recoveryModal').modal('hide');
    });

    // Saat modal register dibuka, tutup recovery modal
    $('#registerModal').on('show.bs.modal', function () {
        $('#recoveryModal').modal('hide');
    });
</script>
  