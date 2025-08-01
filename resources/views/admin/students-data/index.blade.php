@extends('admin.master')

@section('admin-title')
    Students | WeBLI
@endsection

@section('admin-content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Students</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Students</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
					<div class="col-xl-9 mx-auto">
                        <h6 class="mb-0 text-uppercase">Students Data</h6>
                        <hr/>
						<div class="card">
							<div class="card-body">
								<table class="table table-bordered mb-0">
									<thead>
										<tr>
											<th class="text-center" scope="col">No.</th>
											<th class="text-center" scope="col">Name</th>
											<th class="text-center" scope="col">Email</th>
											<th class="text-center" scope="col">Phone</th>
											<th class="text-center" scope="col">Status</th>
											<th class="text-center" scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($adminStudentDatas as $adminStudentData)
                                            <tr>
                                                <td class="text-center align-middle">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{ ($adminStudentData->name) }}
                                                </td>
                                                <td>
                                                    {{ ($adminStudentData->email) }}
                                                </td>
                                                <td>
                                                    {{ ($adminStudentData->phone) }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    <span 
                                                        id="status-badge-{{ $adminStudentData->id }}"
                                                        class="badge btn-sm {{ $adminStudentData->status == 1 ? 'btn-success' : 'btn-danger' }}">
                                                        {{ $adminStudentData->status == 1 ? 'Active' : 'InActive' }}
                                                    </span>
                                                </td>                                                
                                                <td class="text-center align-middle">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input status-toggle" type="checkbox" id="flexSwitchCheckChecked" data-user-id="{{ $adminStudentData->id }}" {{ $adminStudentData->status ? 'checked' : '' }}>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
                    </div>
				</div>
				<!--end row-->
            </div>
        </div>
    </div>
@endsection

@push('admin-addon-script')
    <!-- jQuery (sudah ada) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.status-toggle').on('change', function(){
                var userId = $(this).data('user-id');
                var isChecked = $(this).is(':checked');

                $.ajax({
                    url: "/admin/students-data/" + userId,
                    method: "POST",
                    data: {
                        _method: 'PUT',
                        is_checked: isChecked ? 1 : 0,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response){
                        // iziToast success
                        iziToast.success({
                            message: response.message,
                            position: 'topCenter'
                        });

                        // Ubah badge
                        var badge = $('#status-badge-' + userId);
                        if (isChecked) {
                            badge.text('Active');
                            badge.removeClass('btn-danger').addClass('btn-success');
                        } else {
                            badge.text('InActive');
                            badge.removeClass('btn-success').addClass('btn-danger');
                        }
                    },
                    error: function(){
                        iziToast.error({
                            message: 'Failed to update the status',
                            position: 'topCenter'
                        });
                    }
                });
            });
        });
    </script>
@endpush