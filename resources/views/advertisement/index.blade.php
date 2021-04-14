@extends('welcome')
@section('content')

    @foreach($advertisements as $advertisement)
    <div class="mx-3 my-5">
        <h3 class="text-center"><a href="{{route('advertisements.show',$advertisement->id)}}">{{$advertisement->title}}</a></h3>
        <article>
            {{$advertisement->description}}
        </article>
        <h4 class="my-3">Created by  {{$advertisement->user->name}}</h4>
        <h6>  {{$advertisement->created_at->diffForHumans()}}</h6>
        @auth()
            @if(\Illuminate\Support\Facades\Auth::id() && \Illuminate\Support\Facades\Auth::id()===$advertisement->user_id)
                <a href="{{route('advertisements.edit',$advertisement->id)}}" class="btn btn-info">Edit</a>
                <a href="{{route('advertisements.destroy',$advertisement->id)}}" class="btn btn-danger">Delete</a>
            @endif
        @endauth
    </div>
    @endforeach
    {{$advertisements->links()}}
@endsection
