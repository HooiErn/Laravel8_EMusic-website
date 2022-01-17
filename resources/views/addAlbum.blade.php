@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Create New Album</h3>
        <form action="{{ route('addAlbum') }}" method="POST">
            @CSRF
            <div class="form-group">
                <label for="albumName">Album Name</label>
                <input type="text" class="form-control" id="albumName" name="albumName">                
            </div>
            <div class="form-group">
                <label for="songID">Song</label>
                <select name="songID" id="songID" class="form-control">
                    @foreach($songID as $song)
                    <option value="{{$song->id}}">{{$song->name}}</option>
                    @endforeach
</select>
<div class="form-group">
                <label for="artistID">Artist</label>
                <select name="artistID" id="artistID" class="form-control">
                    @foreach($artistID as $artist)
                    <option value="{{$artist->id}}">{{$artist->name}}</option>
                    @endforeach
</select>
            </div>
            <div class="form-group">
                <label for="coverImage">Image</label>
                <input type="file" class="form-control" id="coverImage" name="coverImage">                
            </div>
          
            <div class="form-group">
                <label for="songDescription">Desciption</label>
                <input type="text" class="form-control" id="songDescription" name="songDescription">                
            </div>

            <div class="form-group">
                <label for="dataReleased">Data Released</label>
                <input type="date" class="form-control" id="dataReleased" name="dataReleased">                
            </div>
      
            <button type="submit" class="btn btn-primary">Add New</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection