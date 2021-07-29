@extends('layout.app')

<head>
<link href="{{ secure_asset('css/event.css') }}" rel="stylesheet">
</head>


@section('content')

<div class="input">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by category" title="Type in a category">
</div>

<table id="myTable"  class="centre">
    <tr class="header">
        <th onclick="sortTable(0)">Event Name</th>
        <th>Description</th>
        <th onclick="sortTable(1)">Date</th>
        <th>Category</th>
        @if( auth()->check() )
        <th>Edit</th>
        @endif
    </tr>
    @foreach($events->sortByDesc('interest_ranking') as $event)
    <tr>
        <td onclick="window.location='{{ url("events/{$event->id}") }}'">{{$event->name}}</td>
        <td>{{$event->description}}</td>
        <td>{{$event->date}}</td>
        @if($event->category_id === 1)
          <td>Sport</td>
        @elseif($event->category_id === 2)
          <td>Culture</td>
        @else($event->category_id === 3)
          <td>Other</td>
        @endif
        @if( auth()->check() )
        <td><button onclick="window.location='{{ url("editevent/{$event->id}") }}'">Edit Event</button></td>
        @endif

    </tr>
    @endforeach
</table>
@endsection

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function sortTable(n) {
  var table,
    rows,
    switching,
    i,
    x,
    y,
    shouldSwitch,
    dir,
    switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  dir = "asc";
  while (switching) {
    switching = false;
    rows = table.getElementsByTagName("TR");
    for (i = 1; i < rows.length - 1; i++) { 
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount++;
    } else {
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>