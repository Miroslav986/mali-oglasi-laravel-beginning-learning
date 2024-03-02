@extends('layouts.master')

@section('main')
	<div class="row">
		@if(isset($single_ad->image1))
			<div class="col-4">
					<div class="card h-100 mt-3">
					<div class="card-body">
						<img src="/ad_images/{{ $single_ad->image1 }}" class="img-fluid">
					</div>
				</div>
			</div>
		@endif
		@if(isset($single_ad->image2))
			<div class="col-4">
				<div class="card h-100 mt-3">
					<div class="card-body">
						<img src="/ad_images/{{ $single_ad->image2 }}" class="img-fluid">
					</div>
				</div>
			</div>
		@endif
		@if(isset($single_ad->image3))
			<div class="col-4">
				<div class="card h-100 mt-3">
					<div class="card-body">
						<img src="/ad_images/{{ $single_ad->image3 }}" class="img-fluid">
					</div>
				</div>
			</div>
		@endif
		<div class="col-12 mt-5">
			<h1 class="display-4">{{ $single_ad->title }} <span class="btn btn-success">{{ $single_ad->category->name }}</span> </h1>
			<p>{{ $single_ad->body }}</p>
			<button class="btn btn-warning">{{ $single_ad->user->name }}</button>
			<button class="btn btn-danger">{{ $single_ad->price }}</button>
		</div>
	</div>
	@if (auth()->check() && auth()->user()->id !== $single_ad->user_id)
	<div class="row mt-3">
		<div class="col-6">
			<form action="{{ route('sendMessage',['id'=>$single_ad->id]) }}" method="POST">
				@csrf
				<label for="msg">Send message to {{ $single_ad->user->name }}</label>
				<textarea id="msg" name="msg" class="form-control" cols="40" rows="5" placeholder="Send message.."></textarea><br>
				<button type="submit" class="btn btn-primary form-control">Send</button>	
			</form>
			@if(session()->has('message'))
				<div class="alert alert-success mt-3">
					<p>{{ session()->get('message') }}</p>
				</div>
			@endif
		
		</div>
	</div>
	@endif
	

@endsection