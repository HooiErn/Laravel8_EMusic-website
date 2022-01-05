@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add Artist</h3>
        <form action="{{ route('addArtist') }}" method="POST">
            @CSRF
            <div class="form-group">
                <label for="artistName">Artist Name</label>
                <input type="text" class="form-control" id="artistName" name="artistName">                
            </div>
            <button type="submit" class="btn btn-primary">Add New</button>
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection