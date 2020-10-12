@extends('app')
@section('content')
<div class="container">
<div class="row  mt-5 mb-5">
    <div class="col-md-5">
       <h2>Manage Contact Types</h2>
           <form method="POST" action="/types">
                @csrf       
            <div class="form-group">
            <label for="">Contact Type</label>
            <input type="text" name="type" class="form-control" value="{{old("type")}}" placeholder="" aria-describedby="helpId">
            @error('type')
                <span class="text-danger"> {{$message}}</span>
            @enderror
            </div>
            <input class="btn btn-primary" type="submit" value="Save">
        </form>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <th>Contact Types</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>   
               @forelse ($types as $item)
               <tr>
                <th>{{$item->type}}</th>
                <th><form method="POST" action="/types/{{$item->id}}"> @csrf @method('DELETE') <input class="btn btn-sm btn-danger" type="submit" value="Delete"></form>
                &nbsp; <a class="btn btn-sm btn-success" href="/types/{{$item->id}}/edit">Edit</a>
                </th>
                </tr>
               @empty
               <tr>
                    <th colspan="2">No Contact Types</th>                    
                </tr>
               @endforelse    
               
            </tbody>
        </table>
    </div>
</div>
</div>
    
@endsection