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
                <div class="py-2 d-flex justify-content-center align-items-center ">
                    <h2>All Orders</h2>

                </div>
            <div class="py-2 d-flex justify-content-center align-items-center vh-100">
                <table  class="table w-100 text-white bg-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Product Title </th>
                        <th scope="col">Price </th>
                        <th scope="col"> Image </th>
                        <th scope="col"> Payment Status </th>
                        <th scope="col"> Status </th>
                        <th scope="col">Change Status</th>
                        <th scope="col">Print PDF</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data )
                      <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->rec_address}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->product->title}}</td>
                        <td>{{$data->product->price}}</td>
                        <td>
                            <img width="120" height="120" src="products/{{$data->product->image}}" alt="">
                        </td>
                        <td>{{$data->payment_status}}</td>
                        <td>
                            @if($data->status == 'In Progress')
                            <span style="color: red">{{$data->status}}</span>
                            @elseif($data->status =='Order Accepted')
                            <span style="color:yellow">{{$data->status}}</span>
                            @else <span style="color: green">{{$data->status}}</span>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{url('order_accepted',$data->id)}}"> Order Accepted </a>
                            <a class="btn btn-success" href="{{url('order_delivered',$data->id)}}">Order Delivered</a>
                        </td>
                        <td>
                            <a class="btn btn-secondary" href="{{url('print_pdf',$data->id)}}">Print PDF</a>
                        </td>
                        {{-- <td><a class="btn btn-warning" href="{{url('edit_category',$data->id)}}">Edit</a></td> --}}
                        {{-- <td><a class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a></td> --}}
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
