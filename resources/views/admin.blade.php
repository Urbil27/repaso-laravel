@extends('layouts.app')
@section('title', 'ADMIN')

@section('content')

<h3>Users</h3>
@foreach($users as $user)
<h4>{{$user->name}}</h4>
@endforeach
@endsection
