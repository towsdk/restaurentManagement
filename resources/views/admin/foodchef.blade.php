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
  
   <div style="top: 60px; right: -150px">
    


      <form action="{{ url('/uploadchef') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label>Title</label>
            <input type="text" name="name" class="form-control text-white"  placeholder="Enter title" required>
          </div>
          <div class="form-group">
            <label>Price</label>
            <input type="number" name="speciality" class="form-control text-white"  placeholder="Enter price" required>
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control text-white"  placeholder="Enter image" required>
          </div>
         
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      
        <table class="table mt-5 text-white table-bordered border-primary">
          <thead>
            <tr>
              <th class="text-white">Name</th>
              <th class="text-white">Price</th>
              <th class="text-white">Image</th>
              <th class="text-white">Description</th>
              <th class="text-white">Action</th>
            </tr>
          </thead>
          <tbody>
           @foreach ($datas as $data)
           <tr>
            <th >{{ $data->name }}</th>
            <td>{{ $data->speciality }}</td>
            <td>
              <img height="200" width="400" src="/chefimage/{{ $data->image }}" alt="food_image">
            </td>
            <td><a href="{{ url('/chefdelete',$data->id) }}">Delete</a></td>
            {{-- <td><a href="{{ url('/chefupdate',$data->id) }}">Update</a></td> --}}
            <td><a href="{{ url('/chefupdate',$data->id) }}">Update</a></td>
          </tr>
           @endforeach
          </tbody>
        </table>
      
   </div>
    

    </div>
    @include('admin.adminscript')

    
  </body>
</html>