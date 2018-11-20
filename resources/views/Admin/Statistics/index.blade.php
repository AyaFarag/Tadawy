@extends('Admin.layout.dashboard')

@section('contentpages')

<h1>Statistics</h1>
<div>
	<h3>Clients : {{ $client_count }}</h3>
	<h3>Companies : {{ $company_count }}</h3>
	<h3>Total Visitors : {{ $visitor_count }}</h3>
</div>


@endsection