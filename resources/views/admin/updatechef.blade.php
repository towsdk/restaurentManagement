<x-app-layout>
    
</x-app-layout>
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
    
    
          <form action="{{ url('/updatechef', $data->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
    
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="name" class="form-control text-white"  value="{{ $data->name }}" required>
              </div>
              <div class="form-group">
                <label>Price</label>
                <input type="number" name="speciality" class="form-control text-white"  value="{{ $data->speciality }}" required>
              </div>
              <div class="form-group">
                <label>Image</label>
                <img height="200" width="200" src="/chefimage/{{ $data->image }}">
            </div>
              <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control text-white"  placeholder="Enter a image" required>
              </div>
             
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
       </div>

       @include('admin.adminscript')
</body>
</html>