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
            <button type="submit" class="btn btn-primary">Add New</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection