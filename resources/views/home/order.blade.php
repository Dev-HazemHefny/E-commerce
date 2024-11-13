<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <!-- slider section -->
    <div class="py-2 d-flex justify-content-center align-items-center vh-100">
        <table  class="table w-75 text-white bg-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col"> Delivery Status</th>
                <th scope="col">Image</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order )
              <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->product->title}}</td>
                <td>{{$order->product->price}}</td>
                <td>{{$order->status}}</td>
                <td><img height="150" width="150" src="products/{{$order->product->image}}"></td>
                @endforeach
            </tr>
            </tbody>
          </table>
    </div>
   {{-- @include('home.slider') --}}

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->

  {{-- @include('home.product') --}}
  <!-- end shop section -->







  <!-- contact section -->

  {{-- @include('home.contact') --}}

  <br><br><br>

  <!-- end contact section -->



  <!-- info section -->
  @include('home.footer')
</body>

</html>
