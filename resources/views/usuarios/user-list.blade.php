

<table data-toggle="table">
    <thead>
        <tr>
          <th>Id</th>
          <th>Usuario</th>
        </tr>
    </thead>
    <tbody>
      @if($rows !== null)

        @foreach ($rows as $user)

          <tr>
              <td>{{$user['id']}}</td>
              <td>{{$user['email']}}</td>
          </tr>
          
        @endforeach
        @endif
        

    </tbody>
</table>


<script>
    $( document ).ready(function() {
      

      
    });
  </script>