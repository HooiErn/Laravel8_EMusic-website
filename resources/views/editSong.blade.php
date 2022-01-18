@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Update Song</h3>
        <form action="{{route('updateSong')}}" method="POST" enctype="multipart/form-data">
        @CSRF
           @foreach($songs as $song)
            <div class="form-group">
                <label for="songName">Song Name</label>
                <input type="text" class="form-control" id="songName"
                name="songName" value="{{$song->name}}">
                <input type="hidden" name="songID" id="songID" value="{{$song->id}}">
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
                <label for="songDescription">Song Description</label>
                <input type="text" class="form-control" id="songDescription"
                name="songDescription" value="{{$song->description}}">
            </div>
            <div class="form-group">
                <label for="lyrics">Lyrics</label><br>
                <textarea id="lyrics" name="lyrics" rows="4" cols="50" value="{{$song->lyrics}}">
                    {{$song->lyrics}}
                </textarea>               
            </div>
            <div class="form-group">
                <label for="musicID">Music Type</label>
                <select name="musicID" id="musicID" class="form-control">
                    @foreach($musicID as $music)
                    <option value="{{$music->id}}">{{$music->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="duration">Song Duration</label>
                <input type="text" class="form-control" id="duration" name="duration" value="{{$song->duration}}">                
            </div>

            <div class="form-group">
                <label for="file">Song File</label><br>
                <audio controls>
                    <source src="{{asset('songmp3')}}/{{$song->file}}"></source>
                </audio>
                <input type="file" class="form-control" id="file" name="file" value="">                
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <br><br>
    </div>
</div>
@endsection