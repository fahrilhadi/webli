<!-- FORGOT PASSWORD MODAL -->
<div class="modal fade" id="recoveryModal" tabindex="-1" role="dialog" aria-labelledby="recoveryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content pt-4 pr-4 pl-4 rounded-custom">
        <button type="button" class="close position-absolute" style="right: 1rem; top: 1rem;" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
  
        <section class="contact-area position-relative">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 mx-auto">
                  <div class="card card-item shadow-none border-0">
                    <div class="card-body">
                      <h3 class="card-title text-center fs-24 lh-35 pb-4">Forgot Your Password?</h3>
                      <div class="section-block"></div>

                      <form method="POST" action="{{ route('password.email') }}" class="pt-4">
                        @csrf

                        <div class="input-box">
                            <label class="label-text">Email</label>
                            <div class="form-group">
                                <input class="form-control form--control" type="email" name="email" placeholder="Email">
                                <span class="la la-envelope input-icon"></span>
                            </div>
                        </div><!-- end input-box -->
                        <div class="btn-box">
                            <div class="text-center">
                                <button class="btn theme-btn" type="submit">Send <i class="la la-arrow-right icon ml-1"></i></button>
                                <p class="fs-14 pt-2">Already have an account? <a href="#" class="text-color hover-underline" data-toggle="modal" data-target="#loginModal">Login</a></p>
                                <p class="fs-14 pt-2">Not a member? <a href="#" class="text-color hover-underline" data-toggle="modal" data-target="#registerModal">Register</a></p>
                            </div>
                        </div><!-- end btn-box -->
                      </form>
    
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
  
      </div>
    </div>
</div>

@push('frontend-addon-script')
    @if(Session::has('message_recovery'))
        <script>
            iziToast.success({
                message: "{{ Session::get('message_recovery') }}",
                position: 'topCenter',
                timeout: 5000,
                close: true,
                displayMode: 1,
                transitionIn: 'fadeInDown',
                transitionOut: 'fadeOutUp',
            });

            // Jika kamu pakai modal forgot password, tampilkan modalnya lagi (opsional)
            // $('#forgotPasswordModal').modal('show');
        </script>
    @endif

    @if(Session::has('toastr_errors_recovery'))
        <script>
            const errors = {!! json_encode(Session::get('toastr_errors_recovery')) !!};

            // Ambil semua field yang error karena 'is required'
            const requiredFields = errors
                .filter(msg => msg.toLowerCase().includes('is required'))
                .map(msg => msg.split(' ')[0]); // Ambil nama fieldnya (Email)

            let message = '';

            if (requiredFields.length > 0) {
                // Cek apakah 1 atau lebih dari 1
                const fieldList = requiredFields.join(', ');
                const verb = requiredFields.length === 1 ? 'is' : 'are';
                message = `${fieldList} ${verb} required.`;
            } else {
                // Untuk error non-required (misal: email tidak ditemukan)
                message = errors.join(', ');
            }

            iziToast.error({
                message: message,
                position: 'topCenter',
                timeout: 5000,
                close: true,
                displayMode: 1,
                transitionIn: 'fadeInDown',
                transitionOut: 'fadeOutUp',
            });

            // Tampilkan kembali modal forgot password
            $('#recoveryModal').modal('show');
        </script>
    @endif
@endpush