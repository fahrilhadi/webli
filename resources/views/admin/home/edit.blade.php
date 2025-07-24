@extends('admin.master')

@section('admin-title')
    Edit Home | WeBLI
@endsection

@section('admin-content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Home</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Home</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form action="{{ route('admin.home.update', $adminHomeData->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <h6 class="mb-0">Title</h6>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col text-secondary">
                                            <textarea id="summernote1"class="form-control @error('title') is-invalid @enderror" name="title">{{ old('title', $adminHomeData->title) }}</textarea>
                                            <!-- error message for title -->
                                            @error('title')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <h6 class="mb-0">Subtitle</h6>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col text-secondary">
                                            <textarea id="summernote2"class="form-control @error('subtitle') is-invalid @enderror" name="subtitle">{{ old('subtitle', $adminHomeData->subtitle) }}</textarea>
                                            <!-- error message for subtitle -->
                                            @error('subtitle')
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
            $('#summernote1, #summernote2').summernote({
                height: 100
            });
        });
    </script>
@endpush