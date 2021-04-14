@extends('welcome')
@section('content')

    <h3>{{$advertisement->title}}</h3>
    <article>
        {{$advertisement->description}}
    </article>
    @auth()
        @if(\Illuminate\Support\Facades\Auth::id()===$advertisement->user_id)
            <a href="{{route('advertisements.create',$advertisement->id)}}" class="btn btn-info">Edit</a>
            <a href="{{route('advertisements.destroy',$advertisement->id)}}" class="btn btn-danger">Delete</a>
        @endif
    @endauth
@endsection
