@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
		<div class="my-auto">
			<div class="d-flex">
				<span class="text-muted mt-1 tx-13 mr-2 mb-0">{{ __('messages.home-page') }} / </span>
				<h4 class="content-title mb-0 my-auto">{{ __('messages.users') }}</h4>
			</div>
		</div>
		<div class="d-flex my-xl-auto right-content">
			<div class="pr-1 mb-3 mb-xl-0">
				<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
			</div>
			<div class="pr-1 mb-3 mb-xl-0">
				<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
			</div>
			<div class="pr-1 mb-3 mb-xl-0">
				<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
			</div>
			<div class="mb-3 mb-xl-0">
				<div class="btn-group dropdown">
					<button type="button" class="btn btn-primary">14 Aug 2019</button>
					<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="sr-only">Toggle Dropdown</span>
					</button>
					<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
						<a class="dropdown-item" href="#">2015</a>
						<a class="dropdown-item" href="#">2016</a>
						<a class="dropdown-item" href="#">2017</a>
						<a class="dropdown-item" href="#">2018</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->
@endsection
@section('content')
		<!-- row opened -->
		<div class="row row-sm">
			<!--div-->
			<div class="col-xl-12">
				<div class="card">
					<div class="card-header pb-0">
						<div class="d-flex justify-content-between">
							<h4 class="card-title mg-b-0">{{ __('messages.users') }}</h4>
							<i class="mdi mdi-dots-horizontal text-gray"></i>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover mb-0 text-md-nowrap">
								<thead>
									<tr>
										<th>{{ __('messages.id') }}</th>
										<th>{{ __('messages.name') }}</th>
										<th>{{ __('messages.email') }}</th>
										<th>{{ __('messages.phone') }}</th>
										<th>{{ __('messages.settings') }}</th>
									</tr>
								</thead>
								<tbody>

									@foreach ($clients as $client)
										
										<tr>							
											<th scope="row">{{ $client->id }}</th>
											<td>{{ $client->name }}</td>
											<td>{{ $client->email }}</td>
											<td>{{ $client->phone }}</td>
											<th>
												
												<div class='dropdown-invoice'>
													<button type='button' class='btn p-0 dropdown-toggles hide-arrow' id='dropdownMenuButton' data-bs-toggle='dropdown'>
														<i class='bx bx-dots-vertical-rounded'></i>
													</button>
													<div class='dropdown-menu-invoice'>
														{{-- href='{{ route('user.destroy', ['id' => $client->id]) }}' --}}
														<a class='dropdown-item link' id="delete-user">
														<i class='bx bx-trash me-1 red'></i> {{ __('messages.delete') }}</a>
													</div>
												</div>
											</th>
										</tr>

									@endforeach
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!--/div-->
		</div>
		<!-- /row -->
	</div>
	<!-- Container closed -->
</div>
		
@endsection
@section('js')
@endsection