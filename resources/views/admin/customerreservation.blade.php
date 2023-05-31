<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public" />
    @include('admin.admincss')

    
</head>
<body>
    <div class="container-scroller">
        @include('admin.navbar')
        <!-- container-scroller -->
      
       <div style="position: relative; top: 60px; right: -150px">
        <table class="table mt-5 text-white table-bordered border-primary">
            <thead>
              <tr>
                <th class="text-white">Name</th>
                <th class="text-white">Email</th>
                <th class="text-white">Phone</th>
                <th class="text-white">Date</th>
                <th class="text-white">Time</th>
                <th class="text-white">Message</th>
                <th>Action</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($datas as $data)
             <tr>
              <th >{{ $data->name }}</th>
              <td>{{ $data->email }}</td>
              <td>{{ $data->phone }}</td>
              <td>{{ $data->date }}</td>
              <td>{{ $data->time }}</td>
              <td>{{ $data->message }}</td>
              <td><a href="{{ url('/deleteMenu',$data->id) }}">Delete</a></td>
              <td><a href="{{ url('/updateMenu',$data->id) }}">Update</a></td>
            </tr>
             @endforeach
            </tbody>
          </table>
       </div>

       @include('admin.adminscript')
</body>
</html>