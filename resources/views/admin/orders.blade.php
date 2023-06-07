<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
    @include('admin.navbar')
    <!-- container-scroller -->

   <div class="container">
    <h5>Order Data </h5>
    <form action="{{ url('/search') }}" method="GET">
    @csrf
    <input type="text" name="search" style="color: blue">
    <input type="submit" value="search" class="btn btn-success">
    </form>
    <table class="table mt-5 text-white table-bordered border-primary">
        <thead>
          <tr>
            <th class="text-white">Food Name</th>
            <th class="text-white">Price</th>
            <th class="text-white">Quantity</th>
            <th class="text-white">Name</th>
            <th class="text-white">Phone</th>
            <th class="text-white">Address</th>
            <th class="text-white">Total Price</th>
          </tr>
        </thead>
        <tbody>
         @foreach ($datas as $data)
         <tr>
          <th >{{ $data->foodname }}</th>
          <td>{{ $data->price }}</td>
          <td>{{ $data->quantity }}</td>
          <td>{{ $data->name }}</td>
          <td>{{ $data->phone }}</td>
          <td>{{ $data->address }}</td>
          <td>{{ $data->quantity * $data->price }}</td>
        </tr>
         @endforeach
        </tbody>
      </table>
   </div>
  
    @include('admin.adminscript')

    </div>
  </body>
</html>