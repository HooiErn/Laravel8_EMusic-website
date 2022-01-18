@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <br><br>
        <table class="table table-bordered">
            <thread>
                <tr>
                    <td>ID</td>
                    <td>Album Name</td>
                    <td>Description</td>
                    <td>Cover Image</td>
                    <td>Artist</td>
                    <td>Song</td>
                    <td>Release Date</td>
                    <td>Action</td>
                </tr>
            </thread>
            <tbody>
                @foreach($albums as $album)
                <tr>
                    <td>{{$album->id}}</td>
                    <td>{{$album->name}}</td>
                    <td>{{$album->description}}</td>
                    <td><img src="{{ asset('images/' . $album->coverImage)}}" width="100" class="img-fluid" alt=""/></td>
                    <td>{{$album->arName}}</td>
                    <td>{{$album->sName}}</td>
                    <td>{{$album->dateReleased}}</td>
                    <td><a href="{{route('editAlbum',['id'=>$album->id])}}" class="btn btn-warning btn-xs">Edit</a>
                    <a href="{{ route('deleteAlbum',['id'=>$album->id])}}" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure to delete?')">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br><br>
    </div>
</div>
@endsection