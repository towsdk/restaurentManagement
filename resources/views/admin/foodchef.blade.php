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
  
   <div style="position: relative; top: 60px; right: -150px">
    


      <form action="{{ url('/uploadchef') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control text-white"  placeholder="Enter title" required>
          </div>
          <div class="form-group">
            <label>Price</label>
            <input type="text" name="speciality" class="form-control text-white"  placeholder="Enter price" required>
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control text-white"  placeholder="Enter image" required>
          </div>
         
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      
   </div>
    

    </div>
    @include('admin.adminscript')

    
  </body>
</html>