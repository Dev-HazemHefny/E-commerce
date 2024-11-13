<!DOCTYPE html>
<html>

<head>
    @include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')

  </div>
  <!-- end hero area -->

  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container ">
      <div class="row">
        <div  class=" col-md-12 ">
          <div class="box" style="background-color: transparent">
              <div class="img-box d-flex justify-content-center align-items-center ">
                <img width="300" src="/products/{{$data->image}}">
              </div>
              <div class="detail-box">
                <h6>
                  {{$data->title}}
                </h6>
                <h6>
                  Price :
                  <span>
                    {{$data->price}}
                  </span>
                </h6>
              </div>
              <div class="detail-box">
                <h6>
                 Category : {{$data->category}}
                </h6>
                <h6>
                  Available Quantity
                  <span>
                    : {{$data->quantity}}
                  </span>
                </h6>
            </div>

              <div class="d-flex justify-content-center align-items-center detail-box">
                        <p>  {{$data->descreption}}  </p>
            </div>

            <div class="d-flex justify-content-center align-items-center detail-box">
                <a class="btn btn-success ml-4" href="{{url('add_cart',$data->id)}}">Add to Cart</a>
           </div>

          </div>
        </div>

      </div>

    </div>
  </section>



  <!-- end contact section -->



  <!-- info section -->
  @include('home.footer')
</body>

</html>
