@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Update Album</h3>
        <form action="{{route('updateAlbum')}}" method="POST" enctype="multipart/form-data">
        @CSRF
           @foreach($albums as $album)
            <div class="form-group">
                <label for="albumName">Album Name</label>
                <input type="text" class="form-control" id="albumName"
                name="albumName" value="{{$album->name}}">
                <input type="hidden" name="albumID" id="albumID" value="{{$album->id}}">
            </div>
            <div class="form-group">
                <label for="songID">Song</label>
                <select name="songID" id="songID" class="form-control">
                    @foreach($songID as $song)
                    <option value="{{$song->id}}">{{$song->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="artistID">Artist</label>
                <select name="artistID" id="artistID" class="form-control">
                    @foreach($artistID as $artist)
                    <option value="{{$artist->id}}">{{$artist->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="coverImage">Cover Image</label><br>
                <img src="{{asset('images')}}/{{$album->coverImage}}" alt="" width="100" class="img-fluid">
                <input type="file" class="form-control" id="coverImage"
                name="coverImage" value="">
            </div>
            <div class="form-group">
                <label for="albumDescription"> Description</label>
                <input type="text" class="form-control" id="albumDescription"
                name="albumDescription" value="{{$album->description}}">
            </div>
            <div class="form-group">
                <label for="dateReleased">Data Released</label>
                <input type="date" class="form-control" id="dateReleased" name="dateReleased" value="{{$album->dateReleased}}">                
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <br><br>
    </div>
</div>
@endsection