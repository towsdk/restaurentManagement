
<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
    @include('admin.navbar')
    <!-- container-scroller -->
    <div style="position: relative; top:60px; right: -150px">
        <table style="background-color:grey; border:3px solid red">
            <tr>
                <th style="padding: 30px">Name</th>
                <th style="padding: 30px">Email</th>
                <th style="padding: 30px">Action</th>
            </tr>

            @foreach ($datas as $data)
            <tr style="text-align:center">
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                
                @if ($data->usertype=="0")
                <td><a href="{{ url('/deleteuser', $data->id) }}">Delete</a></td>
                @else
                <td><a>Not Allowed</a></td>
                @endif
            </tr>
            @endforeach
        </table>
    </div>
</div>
    @include('admin.adminscript')
  </body>
</html>