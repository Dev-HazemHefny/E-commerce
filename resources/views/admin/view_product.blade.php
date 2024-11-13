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
                    <div class="py-2 d-flex justify-content-center align-items-center vh-100">

                        <form action="{{url('product_search')}}" method="get">
                            @csrf
                            <label for="search"></label>
                            <input class="mb-2  w-100" type="search" name="search" ><br>
                            <input type="submit" value="search" class="btn btn-info mx-5">
                        </form>

                    </div>


            <div class="py-2 d-flex justify-content-center align-items-center vh-100">

                <table  class="table w-75 text-white bg-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Descreption</th>
                        <th scope="col"> Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Image</th>
                        <th scope="col">update</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product )
                      <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->title}}</td>
                        <td>{!!Str::limit($product->descreption,5)!!}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>
                            <img width="120" height="120" src="products/{{$product->image}}" alt="" srcset="">
                        </td>
                        <td><a class=" mt-5 btn btn-warning" href="{{url('update_product',$product->id)}}">Edit</a></td>
                         <td><a class=" mt-5 btn btn-danger" href="{{url('delete_product',$product->id)}}">Delete</a></td>
                        @endforeach
                    </tr>
                    </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-center align-items-center">

                    {{$products->onEachSide(1)->links()}}
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
