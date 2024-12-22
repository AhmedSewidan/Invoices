@extends('layouts.master')
@section('css')
@endsection
@extends('layouts/invoices-header')
@section('page')
	@if (count($invoices)  )
		{{ trans('messages.' . $invoices[0]->status .'-invoices') }}
	@endif
@endsection
@section('content')
				<!-- row opened -->
				<div class="row row-sm">
					<!--div-->
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">{{ __('messages.invoices') }}</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover mb-0 text-md-nowrap">
										<thead>
											<tr>
												<th>{{ __('messages.id') }}</th> 
												<th>{{ __('messages.invoice-number') }}</th>
												<th>{{ __('messages.discount') }}</th>
												<th>{{ __('messages.tax') }}</th>
												<th>{{ __('messages.due-amount') }}</th>
												@if (count($invoices)  )
													@if (  $invoices[0]->status != 'unpaid' )
														<th>{{ trans('messages.' . $invoices[0]->status .'-date') }}</th>
													@endif
												@endif
												<th>{{ __('messages.invoice-date') }}</th>
												<th>{{ __('messages.due-date') }}</th>
												<th>{{ __('messages.settings') }}</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($invoices as $invoice)
												
												<tr>							
													<th scope="row">{{ $invoice->id }}</th>
													<td>{{ $invoice->invoice_number  }}</td>
													<th>{{ $invoice->discount }}%</th>
													<th>{{ $invoice->tax }}%</th>
													<th>{{ $invoice->amount_after }} $</th>
													@if ( $invoice->status != 'unpaid' )
														<td>{{ $invoice->status_date }}</td>
													@endif
													<td>{{ $invoice->due_date }}</td>
													<td>{{ $invoice->invoice_date }}</td>
													<th>
														
														<div class='dropdown-invoice'>
															<button type='button' class='btn p-0 dropdown-toggles hide-arrow' id='dropdownMenuButton' data-bs-toggle='dropdown'>
																<i class='bx bx-dots-vertical-rounded'></i>
															</button>
															<div class='dropdown-menu-invoice'>
						
																{{-- <a class='dropdown-item link under' href='{{ route('invoice.show', ['id' => $invoice->id ]) }}'>
																&#x1F4C5; {{ __('messages.details') }}</a> --}}
																
																<a class='dropdown-item link under' href='{{ route('invoice.show', ['invoice_num' => $invoice->invoice_number ]) }}'>
																	&#x1F4C5; {{ __('messages.details') }}</a>

																<a class='dropdown-item link' href='{{ route('invoice.destroy', ['id' => $invoice->id ]) }}'>
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

		<!-- Button to Scroll to Top -->
		<button id="scrollToTopBtn" title="Go to top">⬆️</button>

		
@endsection
@section('js')
@endsection