<!-- REGISTER MODAL -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
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
                      <h3 class="card-title text-center fs-24 lh-35 pb-4">Create an Account!</h3>
                      <div class="section-block"></div>

                     <form method="POST" action="{{ route('register') }}" class="pt-4">
                        @csrf

                        <div class="input-box">
                            <label class="label-text">Name</label>
                            <div class="form-group">
                                <input class="form-control form--control" type="text" name="name" placeholder="Name" value="{{ old('name') }}">
                                <span class="la la-user input-icon"></span>
                            </div>
                        </div><!-- end input-box -->
                        <div class="input-box">
                            <label class="label-text">Email</label>
                            <div class="form-group">
                                <input class="form-control form--control" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                <span class="la la-envelope input-icon"></span>
                            </div>
                        </div><!-- end input-box -->
                        <div class="input-box mb-3">
                            <label class="label-text">Password</label>
                            <div class="input-group">
                                <span class="la la-lock input-icon"></span>
                                <input id="password" class="form-control form--control password-field" type="password" name="password" placeholder="Password">
                                <div class="input-group-append">
                                    <button class="btn theme-btn theme-btn-transparent toggle-password-1" type="button" data-target="#password">
                                        <svg class="eye-on" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z"/></svg>
                                        <svg class="eye-off" style="display: none;" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div><!-- end input-box -->
                        <div class="input-box">
                            <label class="label-text">Confirm Password</label>
                            <div class="input-group mb-3">
                                <span class="la la-lock input-icon"></span>
                                <input id="password_confirmation" class="form-control form--control password-field" type="password" name="password_confirmation" placeholder="Confirm Password">
                                <div class="input-group-append">
                                    <button class="btn theme-btn theme-btn-transparent toggle-password-2" type="button" data-target="#password_confirmation">
                                        <svg class="eye-on" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z"/></svg>
                                        <svg class="eye-off" style="display: none;" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div><!-- end input-box -->
                        <div class="btn-box">
                            <div class="text-center">
                                <button class="btn theme-btn" type="submit">Register <i class="la la-arrow-right icon ml-1"></i></button>
                                <p class="fs-14 pt-2">Already have an account? <a href="#" class="text-color hover-underline" data-toggle="modal" data-target="#loginModal">Login</a></p>
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const toggles = document.querySelectorAll('.toggle-password-1');
    
        toggles.forEach(function (button) {
            button.addEventListener('click', function () {
            const inputSelector = this.getAttribute('data-target');
            const input = document.querySelector(inputSelector);
            const eyeOn = this.querySelector('.eye-on');
            const eyeOff = this.querySelector('.eye-off');
    
            if (input.type === 'password') {
                input.type = 'text';
                eyeOn.style.display = 'none';
                eyeOff.style.display = 'inline';
            } else {
                input.type = 'password';
                eyeOn.style.display = 'inline';
                eyeOff.style.display = 'none';
            }
            });
        });
        });
    </script>  

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const toggles = document.querySelectorAll('.toggle-password-2');
    
        toggles.forEach(function (button) {
            button.addEventListener('click', function () {
            const inputSelector = this.getAttribute('data-target');
            const input = document.querySelector(inputSelector);
            const eyeOn = this.querySelector('.eye-on');
            const eyeOff = this.querySelector('.eye-off');
    
            if (input.type === 'password') {
                input.type = 'text';
                eyeOn.style.display = 'none';
                eyeOff.style.display = 'inline';
            } else {
                input.type = 'password';
                eyeOn.style.display = 'inline';
                eyeOff.style.display = 'none';
            }
            });
        });
        });
    </script>

    @if(Session::has('toastr_errors_register'))
        <script>
            const errors = {!! json_encode(Session::get('toastr_errors_register')) !!};

            // Ambil semua field yg error karena 'is required'
            const requiredFields = errors
                .filter(msg => msg.toLowerCase().includes('is required'))
                .map(msg => msg.split(' ')[0]); // Ambil nama fieldnya (Name, Email, dst)

            let message = '';

            if (requiredFields.length > 0) {
                // Cek apakah 1 atau lebih dari 1
                const fieldList = requiredFields.join(', ');
                const verb = requiredFields.length === 1 ? 'is' : 'are';
                message = `${fieldList} ${verb} required.`;
            } else {
                // Untuk error non-required (misal: password confirmation)
                message = errors.join(', ');
            }

            iziToast.error({
                message: message,
                position: 'topCenter',
                timeout: 5000,
                close: true,
                displayMode: 1,
                // no shadow
                transitionIn: 'fadeInDown',
                transitionOut: 'fadeOutUp',
            });

            // Tampilkan kembali modal register
            $('#registerModal').modal('show');
        </script>
    @endif
@endpush
  