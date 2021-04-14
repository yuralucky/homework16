@extends('welcome')
@section('content')

    @if(isset($advertisement))
        <h3>Edit</h3>
    <form action="{{route('advertisements.update',$advertisement->id)}} " method="post">
        @csrf
        <input type="text" name="title" class="form-control my-5" placeholder="title" value="{{$advertisement->title}}">
        <input type="text" name="description" class="form-control  my-5" placeholder="description" value="{{$advertisement->description}}">
        <input type="submit"  class="btn btn-primary btn-block" value="Save">

    </form>
    @else
        <h3>Add new</h3>
        <form action="{{route('advertisements.store')}} " method="post">
            @csrf
            <input type="text" name="title" class="form-control my-5" placeholder="title" value="">
            <input type="text" name="description" class="form-control  my-5" placeholder="description" value="">
            <input type="submit"  class="btn btn-primary btn-block" value="Create">

        </form>
    @endif

@endsection
