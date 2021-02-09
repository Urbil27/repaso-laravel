@extends('layouts.app')

@section('title', 'Flights')

@section('content')

  <h2>Coming flights:</h2>

  <table>
    <tr>
      <th>Name</th>
      <th>Date</th>
      <th>Origin</th>
      <th>Destiny</th>
      <th>Available Seats</th>
      <th></th>
    </tr>
    @foreach($flights as $flight)
    
      <tr>
        <th>{{$flight->name}}</th>
        <th>{{$flight->date}}</th>
        <th>{{$flight->origin}}</th>
        <th>{{$flight->destiny}}</th>
        <th>{{$flight->available_seats}}</th>
        <th>  <form method="POST" action="/reserve">
          @csrf
          <input type="hidden" name="id" value="{{$flight->id}}">
          <input type="number" name="numberOfSeats">
          <button class="btn btn-warning" type="submit">Reserve</button>
        </form></th>
      
      </tr>
    
  
    @endforeach
  </table>

@endsection
