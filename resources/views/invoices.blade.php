{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('client_id', 'Client_id:') !!}
			{!! Form::text('client_id') !!}
		</li>
		<li>
			{!! Form::label('invoice_number', 'Invoice_number:') !!}
			{!! Form::text('invoice_number') !!}
		</li>
		<li>
			{!! Form::label('due_date', 'Due_date:') !!}
			{!! Form::text('due_date') !!}
		</li>
		<li>
			{!! Form::label('invoice_date', 'Invoice_date:') !!}
			{!! Form::text('invoice_date') !!}
		</li>
		<li>
			{!! Form::label('description', 'Description:') !!}
			{!! Form::textarea('description') !!}
		</li>
		<li>
			{!! Form::label('discount', 'Discount:') !!}
			{!! Form::text('discount') !!}
		</li>
		<li>
			{!! Form::label('tax', 'Tax:') !!}
			{!! Form::text('tax') !!}
		</li>
		<li>
			{!! Form::label('amount', 'Amount:') !!}
			{!! Form::text('amount') !!}
		</li>
		<li>
			{!! Form::label('status', 'Status:') !!}
			{!! Form::text('status') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}