@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Create New Song</h3>
        <form action="{{ route('addSong') }}" method="POST" enctype="multipart/form-data" >
           @CSRF
            <div class="form-group">
                <label for="songName">Song Name</label>
                <input type="text" class="form-control" id="songName" name="songName">                
            </div>
            <div class="form-group">
                <label for="catID">Artist</label>
                <select name="artistID" id="artistID" class="form-control">
                    @foreach($artistID as $artist)
                    <option value="{{$artist->id}}">{{$artist->name}}</option>
                    @endforeach
</select>
            </div>
          
            <div class="form-group">
                <label for="songDescription">Desciption</label>
                <input type="text" class="form-control" id="songDescription" name="songDescription">                
            </div>
            <div class="form-group">
                <label for="catID">Album</label>
                <select name="albumID" id="albumID" class="form-control">
                    @foreach($albumID as $album)
                    <option value="{{$album->id}}">{{$album->name}}</option>
                    @endforeach
</select>
            </div>
            <div class="form-group">
                <label for="lyrics">Lyrics</label>
                <textarea id="lyrics" name="lyrics" rows="4" cols="50">
</textarea>               
            </div>
           

            <div class="form-group">
                <label for="catID">Music Type</label>
                <select name="musicID" id="musicID" class="form-control">
                    @foreach($musicID as $music)
                    <option value="{{$music->id}}">{{$music->name}}</option>
                    @endforeach
</select>
            </div>

            <button type="submit" class="btn btn-primary">Add New</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection