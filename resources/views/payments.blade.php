{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('invoice_id', 'Invoice_id:') !!}
			{!! Form::text('invoice_id') !!}
		</li>
		<li>
			{!! Form::label('payment_date', 'Payment_date:') !!}
			{!! Form::text('payment_date') !!}
		</li>
		<li>
			{!! Form::label('payment_method', 'Payment_method:') !!}
			{!! Form::text('payment_method') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}