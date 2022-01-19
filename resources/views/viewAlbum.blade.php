@extends('layouts.app')
@section('content')

<div class="row" style="margin:30px;"> 
         @foreach($albums as $album)  
            <div class="col-sm-3" style="background-color:white;margin:10px;
            padding:10px;">       
                    <tr>
                    <td><a href="{{ route('view.song',$album->id)}}"><img src="{{ asset('images/' . $album->coverImage)}}" width="300"
                     class="img-fluid" alt=""/></a></td><br><br>      
                       <h4><b><td>{{$album->name}}</td><br></b></h4> 
                        <td>Artist:{{$album->arName}}</td><br>
                        <td>Song List:{{$album->sName}}</td><br>
                        <br>
                        </td>
                    </div>
                    </tr>
            @endforeach            
        </div> 
    @endsection