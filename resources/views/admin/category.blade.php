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
              <form action="{{url('add_category')}}" method="post" >
                @csrf
                <h3 class="mx-3 ">Add Category</h3>
                    <div><input type="text" name="category" ></div>
                    <div><input class="btn btn-primary p-1 my-4 mx-5" type="submit" value="Add Category"></div>
                </form>
            </div>

            <div class="py-2 d-flex justify-content-center align-items-center vh-100">
                <table  class="table w-75 text-white bg-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">created_at</th>
                        <th scope="col">Update Category</th>
                        <th scope="col">Delete Category</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data )
                      <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->category_name}}</td>
                        <td>{{$data->created_at}}</td>
                        <td><a class="btn btn-warning" href="{{url('edit_category',$data->id)}}">Edit</a></td>
                        <td><a class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a></td>
                        @endforeach
                    </tr>
                    </tbody>
                  </table>
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
