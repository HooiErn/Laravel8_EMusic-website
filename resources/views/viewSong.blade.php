@extends('layouts.app')
@section('content')

<div class="row" style="margin:30px;"> 
         @foreach($songs as $song)  
            <div class="col-sm-3" style="background-color:white;margin:10px;
            padding:10px;">       
                    <tr>                      
                       <h4><b><td>{{$song->name}}</td><br></b></h4> 
                        <td>Artist:{{$song->arName}}</td><br>
                        <td>Music Type:{{$song->mName}}</td><br>
                        <td>Duration:{{$song->duration}}</td><br>  
                        <td><audio controls style="width:250px;">
                   <source src="{{asset('songmp3')}}/{{$song->file}}"></source>
                </audio>
                        <td>Lyrics:<br>
                        <p>{!! nl2br($song->lyrics) !!}</p>
                        </td><br>
                        <br>
                    
                        </td>
                    </div>
                    </tr>
            @endforeach            
        </div> 
    @endsection