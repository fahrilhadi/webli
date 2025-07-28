@extends('admin.master')

@section('admin-title')
    Create FAQ | WeBLI
@endsection

@section('admin-content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Create FAQ</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create FAQ</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{ route('admin.faq.index') }}" class="btn btn-primary px-4 mb-3">Back</a>
                        <div class="card">
                            <form action="{{ route('admin.faq.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <h6 class="mb-0">Content Title</h6>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col text-secondary">
                                            <input type="text" class="form-control @error('content_title') is-invalid @enderror" name="content_title" value="{{ old('content_title') }}"></input>
                                            <!-- error message for content title -->
                                            @error('content_title')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <h6 class="mb-0">Content Description</h6>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col text-secondary">
                                            <textarea id="summernote4"class="form-control @error('content_description') is-invalid @enderror" name="content_description">{{ old('content_description') }}</textarea>
                                            <!-- error message for content description -->
                                            @error('content_description')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-secondary">
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
        $(document).ready(function() {
            $('#summernote4').summernote({
                height: 100
            });
        });
    </script>
@endpush