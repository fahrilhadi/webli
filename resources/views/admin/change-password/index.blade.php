@extends('admin.master')

@push('admin-addon-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .eye-icon-1 {
            cursor: pointer;
            position: absolute;
            right: 30px;
            top: 30px;
        }

        .eye-icon-2 {
            cursor: pointer;
            position: absolute;
            right: 30px;
            top: 83px;
        }

        .eye-icon-3 {
            cursor: pointer;
            position: absolute;
            right: 30px;
            top: 135px;
        }
    
        @media (max-width: 576px) {
            .eye-icon-1 {
                top: 47px;
            }

            .eye-icon-2 {
                top: 120px;
            }

            .eye-icon-3 {
                top: 195px;
            }
        }
    </style>
@endpush

@section('admin-title')
    Change Password | WeBLI
@endsection

@section('admin-content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Change Password</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{ !empty($adminChangePassword->photo) ? asset('/storage/public/admin/profile/' . $adminChangePassword->photo) : asset('/backend/assets/images/no_image.png') }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                    <div class="mt-3">
                                        <h4>{{ $adminChangePassword->name }}</h4>
                                        <p class="text-secondary mb-1">{{ $adminChangePassword->email }}</p>
                                        <p class="text-muted font-size-sm">{{ $adminChangePassword->occupation }}</p>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                                        <span class="text-secondary">
                                            <a href="{{ $adminChangePassword->website }}" target="_blank" rel="noopener noreferrer">
                                                {{ $adminChangePassword->website }}
                                            </a>                                            
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <form action="{{ route('admin.change-password.update', $adminChangePassword->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Old Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" id="id_oldpassword">
                                            <i class="far fa-eye password-toggle eye-icon-1" id="toggleOldPassword"></i>
                                            <!-- error message for old password -->
                                            @error('old_password')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">New Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" id="id_newpassword">
                                            <i class="far fa-eye password-toggle eye-icon-2" id="toggleNewPassword"></i>
                                            <!-- error message for new password -->
                                            @error('new_password')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Confirm New Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" class="form-control" name="new_password_confirmation" id="id_confirmpassword">
                                            <i class="far fa-eye password-toggle eye-icon-3" id="toggleConfirmPassword"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('admin-addon-script')
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