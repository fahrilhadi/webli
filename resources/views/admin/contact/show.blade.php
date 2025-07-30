@extends('admin.master')

@section('admin-title')
    Detail Message | WeBLI
@endsection

@section('admin-content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Detail Message</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Message</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{ route('admin.contact.index') }}" class="btn btn-primary px-4 mb-3">Back</a>
                        <div class="card">
                            <form>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <h6 class="mb-0">Name</h6>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col text-secondary">
                                            <input type="text" class="form-control" name="name" value="{{ $adminContactData->name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col text-secondary">
                                            <input type="email" class="form-control" name="email" value="{{ $adminContactData->email }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <h6 class="mb-0">Message</h6>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col text-secondary">
                                            <textarea class="form-control" name="message" id="auto-message" readonly>{{ $adminContactData->message }}</textarea>
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
        // Auto resize textarea
        document.addEventListener('DOMContentLoaded', function() {
            const autoMessage = document.getElementById('auto-message');
            autoMessage.style.height = 'auto';
            autoMessage.style.height = (autoMessage.scrollHeight) + 'px';
        });
    </script>
@endpush