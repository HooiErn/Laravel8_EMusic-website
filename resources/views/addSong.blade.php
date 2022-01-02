extends('layouts.app')
section('content')
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
                <label for="artist">Artist</label>
                <input type="text" class="form-control" id="artistID" name="artistID">                
            </div>
            <div class="form-group">
                <label for="songDescription">Desciption</label>
                <input type="text" class="form-control" id="songDescription" name="songDescription">                
            </div>
            <div class="form-group">
                <label for="ablum">Album</label>
                <input type="text" class="form-control" id="albumID" name="albumID">                
            </div>
            <div class="form-group">
                <label for="lyrics">Lyrics</label>
                <input type="text" class="form-control" id="lyrics" name="lyrics">                
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