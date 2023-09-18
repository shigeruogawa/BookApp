@extends('layout.default')

@section('menuber')
	@parent
	session
@endsection

@section('content')
	<p>{{$session_data}}</p>
	<form action="/MyBook/session" method="post">
		@csrf
		<input type="text" name="input">
		<input type="submit" value="send">
	</form>

	@endsection

	@section('footer')
	copyright
	@endsection