@extends('user.master')

@push('user-addon-style')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endpush

@section('user-title')
    Profile | WeBLI
@endsection

@section('user-content')
    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold">Edit Profile</h3>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
            <div class="setting-body">
                <form class="row" action="{{ route('user.profile.update', $userProfile->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="media media-card align-items-center pb-5">
                        <div class="media-img media-img-lg mr-4 bg-gray">
                            <img class="mr-3" id="showImage" src="{{ !empty($userProfile->photo) ? asset('/storage/public/user/profile/' . $userProfile->photo) : asset('/frontend/images/no_image.png') }}" alt="avatar image">
                        </div>
                        <div class="media-body">
                            <div class="file-upload-wrap file-upload-wrap-2">
                                <input type="file" name="photo" id="image" class="file-upload-input">
                                <span class="file-upload-text"><i class="la la-photo mr-2"></i>Upload a Photo</span>
                            </div><!-- file-upload-wrap -->
                            <p class="fs-14">Max file size is 2MB, Minimum dimension: 200x200 And Suitable files are .jpg & .png</p>
                        </div>
                    </div><!-- end media -->
                        <div class="input-box col-lg-6">
                            <label class="label-text">Full Name</label>
                            <div class="form-group">
                                <input class="form-control form--control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $userProfile->name) }}">
                                <span class="la la-user input-icon"></span>
                                <!-- error message for name -->
                                @error('name')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div><!-- end input-box -->
                        <div class="input-box col-lg-6">
                            <label class="label-text">Username</label>
                            <div class="form-group">
                                <input class="form-control form--control" type="text" name="username" value="{{ old('username', $userProfile->username) }}">
                                <span class="la la-user input-icon"></span>
                            </div>
                        </div><!-- end input-box -->
                        <div class="input-box col-lg-6">
                            <label class="label-text">Email Address</label>
                            <div class="form-group">
                                <input class="form-control form--control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email', $userProfile->email) }}">
                                <span class="la la-envelope input-icon"></span>
                                <!-- error message for email -->
                                @error('email')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div><!-- end input-box -->
                        <div class="input-box col-lg-6">
                            <label class="label-text">Phone Number</label>
                            <div class="form-group">
                                <input class="form-control form--control" type="tel" name="phone" value="{{ old('phone', $userProfile->phone) }}">
                                <span class="la la-phone input-icon"></span>
                            </div>
                        </div><!-- end input-box -->
                        <div class="input-box col-lg-6">
                            <label class="label-text">Occupation</label>
                            <div class="form-group">
                                <input class="form-control form--control" type="text" name="occupation" value="{{ old('occupation', $userProfile->occupation) }}">
                                <span class="la la-briefcase input-icon"></span>
                            </div>
                        </div><!-- end input-box -->
                        <div class="input-box col-lg-6">
                            <label class="label-text">Website</label>
                            <div class="form-group">
                                <input class="form-control form--control" type="text" name="website" value="{{ old('website', $userProfile->website) }}">
                                <span class="la la-globe input-icon"></span>
                            </div>
                        </div><!-- end input-box -->
                        <div class="input-box col-lg-12 py-2">
                            <button type="submit" class="btn theme-btn">Save Changes</button>
                        </div><!-- end input-box -->
                </form>
            </div><!-- end setting-body -->
        </div><!-- end tab-pane -->
    </div><!-- end tab-content -->
@endsection

@push('user-addon-script')
    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endpush