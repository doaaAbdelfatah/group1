@extends('app')
@section('content')
<div class="container">

<div class="row mt-5">
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Contacts</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>   
               @forelse ($users as $u)
               <tr>
                <th>{{$u->name}}</th>
                <th>{{$u->email}}</th>
                <th>{{$u->role}}</th>
                <th><ul>               
                @forelse ($u->contacts as $c) 
                <li>{{$c->contact_type->type}} : {{$c->contact}}</li>       
                @empty
                <li>No Contact Yet</li>
                @endforelse
            </ul>
      </th>
            <th>&nbsp;</th>
                </tr>
               @empty
               <tr>
                    <th colspan="2">No Users</th>                    
                </tr>
               @endforelse    
               
            </tbody>
        </table>
    </div>
</div>
</div>
    
@endsection