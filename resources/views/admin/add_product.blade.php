<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div  class=" text-white bg-dark py-2 d-flex justify-content-center align-items-center vh-100">
                <form  action="{{url('upload_product')}}" method="post" enctype="multipart/form-data" >
                  @csrf
                  <h1 class="mx-3 mb-3">Add product</h1>
                      <div>
                        <label for="title">Title</label><br>
                        <input class="mb-4 w-100 " type="text" name="title" required >
                    </div>
                    <div>
                        <label for="description">Description</label><br>
                        <textarea  class="mb-4  w-100"  name="description" required cols="20" rows="3"></textarea>
                    </div>
                    <div>
                        <label for="price">Price</label><br>
                        <input  class="mb-4  w-100"  type="text" name="price" required >
                    </div>
                    <div>
                        <label for="quantity">Quantity</label><br>
                        <input  class="mb-4  w-100"  type="number" name="quantity" required >
                    </div>
                    <div>
                        <label for="product category">Product Category</label><br>

                        <select required class="mb-4  w-100"  name="category" id="">
                                <option>Select Category</option>
                                @foreach ($category as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endforeach
                         </select>

                    </div>
                    <div>
                        <label for="image">Image</label><br>
                        <input  class="mb-4"  type="file" name="image"  >
                    </div>
                      <div><input class="btn btn-success p-2 my- mx-5" type="submit" value="Add Product"></div>
                  </form>
              </div>
        </div>
    </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>
