@extends('Task.app')
@section('title')
    My Todo App
@endsection
@section('content')
{{ session()->get('Message') }}   
    <div class="row mt-3">
        <div class="col-12 align-self-center">
            <table class='table table-hover table-responsive table-bordered'>
                <!-- creating our table heading -->
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>From</th>
                    <th>To</th>
    
                </tr>
    <?php $i= 1;?>
    @foreach ($data as $fetchedData )
                <tr>
    
                    <td>{{ $i++ }}</td>
    
                    <td>{{$fetchedData->id  }}</td>
                    <td>{{$fetchedData->title  }}</td>
                    <td>{{$fetchedData->description  }}</td>
                    <td>{{$fetchedData->fromT }}</td>
                    <td>{{$fetchedData->tOO }}</td>
                 
                </tr>
    
    
                @endforeach
    
                <!-- end table -->
            </table>
            
        </div>

@endsection