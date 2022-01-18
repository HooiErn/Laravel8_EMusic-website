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
                    <td>Song Name</td>
                    <td>Description</td>
                    <td>Artist</td>
                    <td>Music Type</td>
                    <td>Lyrics</td>
                    <td>Duration</td>
                    <td>Action</td>
                </tr>
            </thread>
            <tbody>
                
                @foreach($songs as $song)
                <tr>
                    <td>{{$song->id}}</td>
                    <td>{{$song->name}}</td>
                    <td>{{$song->description}}</td>
                    <td>{{$song->arName}}</td>
                    <td>{{$song->mName}}</td>
                    <td>{{$song->lyrics}}</td>
                    <td>{{$song->duration}}</td>
                    <td><a href="{{route('editSong',['id'=>$song->id])}}" class="btn btn-warning btn-xs">Edit</a>
                    <a href="{{ route('deleteSong',['id'=>$song->id])}}" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure to delete?')">Delete</a></td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
        <br><br>
    </div>
</div>
@endsection