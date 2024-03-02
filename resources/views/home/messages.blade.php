@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row"> 
      <div class="col-4">
       @include('home.partials.sidebar')
      </div>
      <div class="col-8 ">
          <h2 class="m-2">All Messages</h2>
          <ul class="list-group">
              @foreach($messages as $message)
                <li class="list-group-item mb-2">
                  <p>Oglas: {{ $message->ad->title }} <span class="float-right">{{ $message->created_at->format('d M Y') }}</span></p>
                  <p>From: {{ $message->sender->name }}</p>
                  <p><strong>{{ $message->text }}</strong></p>
                  <a href="{{ route('home.replay',['sender_id'=>$message->sender->id,'ad_id'=>$message->ad_id,'message_id'=>$message->id]) }}">Replay</a>
                  <form action="/home/messages/delete{{ $message->id }}" method="POST">
                    @csrf
                    
                    <button type="submit" class="btn btn-sm btn-danger float-right">Delete</button>
                  </form>
                </li>
              @endforeach 
          </ul>
          @if(session()->has('message'))
              <div class="alert alert-success mt-3">
                <p>{{ session()->get('message') }}</p>
              </div>
          @endif

          @if(session()->has('message_delete'))
              <div class="alert alert-danger mt-3">
                <p>{{ session()->get('message_delete') }}</p>
              </div>
          @endif
      </div>
  </div> 
</div>
@endsection
