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


            <div class=" text-white bg-dark py-2 d-flex justify-content-center align-items-center vh-100">
                <form action="{{url('edit_product',$data->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <h2 class="mx-3 mb-5 ">Update Product</h2>
                <div>
                       <label for="title">Title</label>
                        <input  class="mb-4 w-100" type="text" name="title" value="{{$data->title}}">
                </div>

                <div>
                    <label for="description">Description</label>
                     <textarea  class="mb-4  w-100" name="description" id="" cols="30" rows="3">{{$data->descreption}}</textarea>
                </div>

                <div>
                    <label for="price">Price</label>
                    <input  class="mb-4 w-100" type="text" name="price" value="{{$data->price}}">
                </div>

                <div>
                    <label for="quantity">Quantity</label>
                    <input  class="mb-4 w-100" type="text" name="quantity" value="{{$data->quantity}}">
                </div>

                <div>
                    <label for="category">Category</label><br>
                     <select class="mb-4 w-100" name="category" id="">
                        {{-- <option value="{{$data->category}}">{{$data->category}}</option> --}}
                            @foreach ($categories as $category )
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach

                     </select>
                </div>

                <div>
                    <label for="current image">Current Image</label>
                    <img width="120" height="120" src="/products/{{$data->image}}" alt="">
                </div>

                <div>
                    <label for="New Image">New Image</label>
                    <input  class="mb-4 w-100" type="file" name="image" value="{{$data->image}}">
                </div>
                      <div><input class="btn btn-primary p-2 my-4 mx-4" type="submit" value="update Product"></div>

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
