@extends('admin.master')

@section('admin-title')
    How To Use | WeBLI
@endsection

@section('admin-content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">How To Use</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">How To Use</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
					<div class="col-xl-9 mx-auto">
                        <h6 class="mb-0 text-uppercase">How To Use Data</h6>
                        <hr/>
                        <a href="{{ route('admin.how-to-use.create') }}" class="btn btn-primary px-4 mb-3">Add Data</a>
						<div class="card">
							<div class="card-body">
								<table class="table table-bordered mb-0">
									<thead>
										<tr>
											<th class="text-center" scope="col">No.</th>
											<th class="text-center" scope="col">Content Title</th>
											<th class="text-center" scope="col">Content Subtitle</th>
											<th class="text-center" scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($adminHowToUseDatas as $adminHowToUseData)
                                            <tr>
                                                <td class="text-center align-middle">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{ ($adminHowToUseData->content_title) }}
                                                </td>
                                                <td>
                                                    {{ ($adminHowToUseData->content_subtitle) }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    <form action="{{ route('admin.how-to-use.destroy', $adminHowToUseData->id) }}" method="POST">
                                                        <a href="{{ route('admin.how-to-use.edit', $adminHowToUseData->id) }}" class="btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" id="delete" class="btn btn-sm btn-danger"><i class="bx bx-trash"></i></button>
                                                    </form>
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
    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(function(){
            $(document).on('click','#delete',function(e){
                e.preventDefault();
                var form = $(this).closest('form');
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "Delete data?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete!',
                            cancelButtonText: 'Cancel'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            form.submit();
                            }
                        })
            });
        });
    </script>
@endpush