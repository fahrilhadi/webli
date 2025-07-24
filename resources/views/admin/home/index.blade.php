@extends('admin.master')

@section('admin-title')
    Home | WeBLI
@endsection

@section('admin-content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Home</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">Home Data</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<table class="table table-bordered mb-0">
									<thead>
										<tr>
											<th class="text-center" scope="col">No.</th>
											<th class="text-center" scope="col">Title</th>
											<th class="text-center" scope="col">Subtitle</th>
											<th class="text-center" scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($adminHomeDatas as $adminHomeData)
                                            <tr>
                                                <td class="text-center align-middle">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{ $adminHomeData->title }}
                                                </td>
                                                <td>
                                                    {{ $adminHomeData->subtitle }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a href="{{ route('admin.home.edit', $adminHomeData->id) }}" class="btn btn-sm btn-warning"><i class="bx bx-edit"></i></a>
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