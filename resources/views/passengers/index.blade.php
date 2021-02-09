@extends('layouts.app')

@section('title', 'Passengers')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(document).ready(iniciarEventos);
    function iniciarEventos(){
      let button = $('button');
      button.click(mostratContenido)
    }
    function mostratContenido(){
      let id = $("#selector").val();
      pedirInfo(id);
    }
    function pedirInfo(id){
      $.ajax({
    url:'/api/flights/'+id,

    data: {
        id: 123
    },
    type: 'GET',
    dataType: 'json',
    success: function (json) {
      let borrar = $('.autocreated');
      borrar.remove();
      let tabla = $('table');
      if(json.length==0){
        alert("aki no hay na");
      }
   for(let i =0;i<json.length;i++){
    let row =$('<tr class="autocreated">');
    let name = $('<td>');
    name.append(json[i].name);
    row.append(name);
    let lastname = $('<td>');
      lastname.append(json[i].lastname);
      row.append(lastname);
    let date = $('<td>');
      date.append(json[i].pivot.created_at);
      row.append(date);
      tabla.append(row);

   }
    },

    error: function (xhr, status) {
        alert('Disculpe, existió un problema al cargar los sensores');
    },

    // código a ejecutar sin importar si la petición falló o no
    complete: function (xhr, status) {

    }

});

    }
  </script>
  <h2>Flights</h2>
  <form  action="/flights">
  <select name="flight" id="selector">
  @foreach($flights as $flight)
    <option value="{{$flight->id}}">{{$flight->name}}</option>
  @endforeach
  </select>
  
</form>
  <button type="btn btn-warning">Show passengers</button>

  <h2>Passengers</h2>

  <table>
    <tr>
      <th>Name</th>
      <th>Lastname</th>
      <th>Ticket acquisition date</th>
    </tr>
    

  </table>



@endsection
