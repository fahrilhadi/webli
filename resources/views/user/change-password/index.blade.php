@extends('user.master')

@push('user-addon-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .eye-icon-1 {
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 17px;
        }

        .eye-icon-2 {
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 17px;
        }

        .eye-icon-3 {
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 17px;
        }
    
        @media (max-width: 576px) {
            .eye-icon-1 {
                top: 18px;
            }

            .eye-icon-2 {
                top: 18px;
            }

            .eye-icon-3 {
                top: 15px;
            }
        }
    </style>
@endpush

@section('user-title')
    Change Password | WeBLI
@endsection

@section('user-content')
    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold">Change Password</h3>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="password" role="tabpanel" aria-labelledby="password-tab">
            <div class="setting-body">
                <form class="row" action="{{ route('user.change-password.update', $userChangePassword->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="input-box col-lg-4">
                        <label class="label-text">Old Password</label>
                        <div class="form-group">
                            <input class="form-control form--control @error('old_password') is-invalid @enderror" type="password" name="old_password" id="id_oldpassword" placeholder="Old Password">
                            <span class="la la-lock input-icon"></span>
                            <i class="far fa-eye password-toggle eye-icon-1" id="toggleOldPassword"></i>
                            <!-- error message for old password -->
                            @error('old_password')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-4">
                        <label class="label-text">New Password</label>
                        <div class="form-group">
                            <input class="form-control form--control @error('new_password') is-invalid @enderror" type="password" name="new_password" id="id_newpassword" placeholder="New Password">
                            <span class="la la-lock input-icon"></span>
                            <i class="far fa-eye password-toggle eye-icon-2" id="toggleNewPassword"></i>
                            <!-- error message for new password -->
                            @error('new_password')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-4">
                        <label class="label-text">Confirm New Password</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="password" name="new_password_confirmation" id="id_confirmpassword" placeholder="Confirm New Password">
                            <span class="la la-lock input-icon"></span>
                            <i class="far fa-eye password-toggle eye-icon-3" id="toggleConfirmPassword"></i>
                        </div>
                    </div><!-- end input-box -->
                    <div class="input-box col-lg-12 py-2">
                        <button type="submit" class="btn theme-btn">Change Password</button>
                    </div><!-- end input-box -->
                </form>
            </div><!-- end setting-body -->
        </div><!-- end tab-pane -->
    </div><!-- end tab-content -->
@endsection

@push('user-addon-script')
    <script>
        const toggleOldPassword =
              document.querySelector('#toggleOldPassword');
 
        const oldpassword = 
              document.querySelector('#id_oldpassword');
 
        toggleOldPassword.
        addEventListener('click', function (e) {
 
            // Toggle the type attribute 
            const type = oldpassword.getAttribute(
                'type') === 'password' ? 'text' : 'password';
            oldpassword.setAttribute('type', type);
 
            // Toggle the eye slash icon 
            if (toggleOldPassword.src.match(
                "https://media.geeksforgeeks.org/wp-content/uploads/20210917150049/eyeslash.png")) {
                                toggleOldPassword.src =
                "https://media.geeksforgeeks.org/wp-content/uploads/20210917145551/eye.png";
                } else {
                    toggleOldPassword.src =
                "https://media.geeksforgeeks.org/wp-content/uploads/20210917150049/eyeslash.png";
            }
        }); 
    </script>

    <script>
        const toggleNewPassword =
              document.querySelector('#toggleNewPassword');
 
        const newpassword = 
              document.querySelector('#id_newpassword');
 
        toggleNewPassword.
        addEventListener('click', function (e) {
 
            // Toggle the type attribute 
            const type = newpassword.getAttribute(
                'type') === 'password' ? 'text' : 'password';
            newpassword.setAttribute('type', type);
 
            // Toggle the eye slash icon 
            if (toggleNewPassword.src.match(
                "https://media.geeksforgeeks.org/wp-content/uploads/20210917150049/eyeslash.png")) {
                                toggleNewPassword.src =
                "https://media.geeksforgeeks.org/wp-content/uploads/20210917145551/eye.png";
                } else {
                    toggleNewPassword.src =
                "https://media.geeksforgeeks.org/wp-content/uploads/20210917150049/eyeslash.png";
            }
        }); 
    </script>

    <script>
        const toggleConfirmPassword =
              document.querySelector('#toggleConfirmPassword');
 
        const confirmpassword = 
              document.querySelector('#id_confirmpassword');
 
        toggleConfirmPassword.
        addEventListener('click', function (e) {
 
            // Toggle the type attribute 
            const type = confirmpassword.getAttribute(
                'type') === 'password' ? 'text' : 'password';
            confirmpassword.setAttribute('type', type);
 
            // Toggle the eye slash icon 
            if (toggleConfirmPassword.src.match(
                "https://media.geeksforgeeks.org/wp-content/uploads/20210917150049/eyeslash.png")) {
                                toggleConfirmPassword.src =
                "https://media.geeksforgeeks.org/wp-content/uploads/20210917145551/eye.png";
                } else {
                    toggleConfirmPassword.src =
                "https://media.geeksforgeeks.org/wp-content/uploads/20210917150049/eyeslash.png";
            }
        }); 
    </script>
@endpush