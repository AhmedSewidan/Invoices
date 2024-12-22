@extends('layouts.master')
@section('css')
@endsection

@extends('layouts.invoices-header')
@section('page')
	{{ __('messages.invoice-details') }}
@endsection
@section('content')
			<!-- row opened -->
			
		<div class="invoice-container-2">
			
			<!-- ترويسة الفاتورة -->
			<div class="invoice-header-2">
				<h2>{{__('messages.invoice-details-number')}}<span> {{ $invoice->invoice_number }} </span></h2>
			</div>
		
			<!-- تفاصيل الفاتورة -->
			<div class="invoice-details-card" style="padding: 20px; background-color: #f8f9fa; border: 1px solid #e0e0e0; border-radius: 0 0 8px 8px;">
				<div style="display: flex; justify-content: space-between; ">
					<div>
						<p><strong>{{__('messages.invoice-date')}} : </strong> {{ $invoice->invoice_number }} </p>
						<p><strong>{{__('messages.due-date')}} : </strong> {{ $invoice->due_date }} </p>
					</div>
					<div>
						<p><strong>{{ __('messages.status') }} : </strong>  {{ trans('messages.' . $invoice->status) }} </p>
						<p><strong>{{__('messages.due-amount')}} : </strong> {{ $invoice->amount }} $</p>
					</div>
				</div>
				<div style="display: flex; justify-content: space-between; width: 672px;">
					<p><strong>{{__('messages.tax')}} : </strong> {{ $invoice->tax }} </p>
					<p><strong>{{__('messages.discount')}} : </strong> {{ $invoice->discount }} </p>
				</div>
				@if ( $invoice->status != 'unpaid' )
					
					<div>
						<p><strong>{{ trans('messages.' . $invoice->status .'-date') }} : </strong> {{ $invoice->status_date }} </p>
					</div>
				@endif
				<div>
					<p><strong>{{__('messages.description')}} : </strong> {{ $invoice->description }} </p>
				</div>
			</div>
			<!-- بيانات العميل -->
		
			<div class="client-details-card" style="padding: 20px; margin-top: 20px; background-color: #f8f9fa; border: 1px solid #e0e0e0; border-radius: 8px;">
				<h3 style="margin-bottom: 15px;">{{__('messages.client-details')}}</h3>
				<p><strong>{{ __('messages.name') }} : </strong> {{ $user->name }} </p>
				<p><strong>{{__('messages.email')}} : </strong> {{ $user->email }} </p>
				<p><strong>{{__('messages.phone')}} : </strong> {{ $user->phone }} </p>
			</div>
		</div>
	
		<!-- /row -->
	</div>
  <!-- Container closed -->
</div>
		
@endsection