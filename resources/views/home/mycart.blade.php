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
                <th scope="col">Image </th>
                <th scope="col">Delete </th>
              </tr>
            </thead>
            <tbody>
                    <?php
                        $value = 0 ;
                    ?>
                @foreach ($cart as $cart )
              <tr>
                <td>{{$cart->product->id}}</td>
                <td>{{$cart->product->title}}</td>
                <td>{{$cart->product->price}}</td>
                <td><img height="100px" width="150" src="/products/{{$cart->product->image}}" alt="" srcset=""></td>
               {{-- <td><a class="btn btn-warning" href="{{url('edit_category',$data->id)}}">Edit</a></td> --}}
                <td><a class="btn btn-danger" href="{{url('deleteproduct',$cart->id)}}">Delete</a></td>
                <?php
                    $value = $value+$cart->product->price;
                ?>
                @endforeach
            </tr>
            </tbody>
          </table>
    </div>
    <div class="d-flex justify-content-center align-items-center  ">
    <h3> Total : ${{$value}} </h3>
    </div>
    <div class=" d-flex justify-content-center align-items-center mt-3">
        <form action="{{url('confirm_order')}}" method="POST">
            @csrf
            <div>
                <label for="Receiver Name">Receiver Name</label><br>
                <input class="mb-4 w-100 " value="{{Auth::user()->name}}" type="text" name="name" required >
            </div>

            <div>
                <label for="Receiver Address">Receiver Address</label><br>
                <textarea  class="mb-4  w-100"  name="address" required cols="20" rows="3">{{Auth::user()->address}}</textarea>
            </div>

            <div>
                <label for="phone">Receiver Phone</label><br>
                <input class="mb-4 w-100 " value="{{Auth::user()->phone}}" type="text" name="phone" required >
            </div>
            <div><input class="btn btn-info p-2 my- mx-5" type="submit" value="Cash On Delivery">
                <a href="{{url('stripe',$value)}}" class="btn btn-success">Pay Using Card</a>
            </div>
        </form>
    </div>
    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->


  <!-- end shop section -->







  <!-- contact section -->


  <br><br><br>

  <!-- end contact section -->



  <!-- info section -->
  @include('home.footer')
</body>

</html>
