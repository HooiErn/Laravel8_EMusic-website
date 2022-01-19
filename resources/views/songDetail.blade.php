@extends('layouts.app')
@section('content')

<div class="row" style="margin:30px;"> 
          @foreach($songs as $song) 
            <div class="col-sm-6" style="background-color:white;margin:10px;
            padding:10px;">       
                    <tr>  
                    @foreach($albums as $album)  
                    <td><a href="{{ route('view.song',$album->id)}}"><img src="{{ asset('images/' . $album->coverImage)}}" width="300"
                     class="img-fluid" alt=""/></a></td><br><br> 
                     @endforeach                    
                       <td><h4><b>{{$song->name}}<br></b></h4> </td> 

                       @foreach($artists as $artist)               
                        <td>Artist:{{$artist->name}}</td><br>
                        @endforeach
                        
                        <td>Duration:{{$song->duration}}</td><br><br>
                        
                        <td><audio controls style="width:250px;">
                            <source src="{{asset('songmp3')}}/{{$song->file}}"></source>
                          </audio>
                        </td><br><br>
                        <td>Lyrics:<br>
                        <p>{!! nl2br($song->lyrics) !!}</p>
                        </td><br>
                    </div>
                    </tr>      
            @endforeach            
        </div> 
    @endsection