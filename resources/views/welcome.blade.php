@extends('layouts.master')

@section('main')
    <h1 class="mt-5">Mali oglasi</h1>
    <div class="row">
        <div class="col-3 mt-5 bg-secondary">
            <ul class="list-group list-group-flush">
                @foreach($categories as $category)
                   <li class="list-group-item bg-secondary">
                        <a href="{{ route('welcome') }}?cat={{ $category->name }}" class="text-light">{{ $category->name }}</a>
                    </li>
                @endforeach
                <li class="list-group-item bg-secondary">
                    <form action="{{ route('welcome') }}" method="GET">
                        <select name="type" class="form-control">
                            <option value="lover" {{ (isset(request()->type) && request()->type == 'lover') ? 'selected' : '' }}>Cene rastuce</option>
                            <option value="upper" {{ (isset(request()->type) && request()->type == 'upper') ? 'selected' : '' }}>Cene opadajuce</option>
                        </select>
                        <button type="submit" class="btn btn-success form-control mt-1">Search</button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="col-9 mt-5">

            @foreach($all_ads as $ad)
            <div class="card mb-3" >
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="/ad_images/{{ $ad->image1 }}" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('singleAd',['id'=>$ad->id]) }}" class="align-top">{{ $ad->title }}</a></h5>
                    <p class="card-text h-100">
                        <p>{{ $ad->body }}</p>
                        <div class="card-footer  border-secondary">
                        <span class="badge badge-warning float-right p-1">Pregleda {{ $ad->views }}</span>
                        <span class="badge badge-primary badge-pill p-1">{{ $ad->price }} rsd</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        

    </div>
</div>

@endsection