@extends('layouts.app')

@section('title', 'Passengers')

@section('content')

  <h2>Flights</h2>
  <form  action="/flights">
  <select name="flight" id="">
  
  </select>
  <button type="submit" class="btn btn-primary">Search</button>
</form>
  <button type="btn btn-warning">
    Show passengers
  </button>

  <h2>Passengers</h2>

  <table>
    <tr>
      <th>Name</th>
      <th>Lastname</th>
      <th>Ticket acquisition date</th>
    </tr>
    @foreach($flight->users as $user)
    <tr>
      <td>{{$user->name}}</td>
      <td>{{$user->lastname}}</td>
      <td>{{$user->pivot->created_at}}</td>
    </tr>
   @endforeach

  </table>



@endsection
