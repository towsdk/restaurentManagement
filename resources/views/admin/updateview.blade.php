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
    
    
          <form action="{{ url('/update', $data->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
    
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control text-white"  value="{{ $data->title }}" required>
              </div>
              <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" class="form-control text-white"  value="{{ $data->price }}" required>
              </div>
              <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" class="form-control text-white"  value="{{ $data->description }}"ption" required>
              </div>
              <div class="form-group">
                <label>Image</label>
                <img height="200" width="200" src="/foodimage/{{ $data->image }}">
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