<!DOCTYPE html>
<html>
   <head>
       
      <!-- Basic -->
      <base href="/public">
      
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{asset('home/images/favicon.png')}}" type="">
      <title>ShopNest - An online Market Place</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body style="background-color: #99d0f1">
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
      </div>
      <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50%; padding: 30px">
         <div class="img-box" style="padding: 20px">
            <img src="product/{{$product->image}}" alt="">
         </div>
         <div class="detail-box">
            <h5>
               {{ $product->title }}
            </h5>
                       
            @if($product->discount_price!=null)
            <h6 style="color:red">
               Discounted price <br>   
               TK{{ $product->discount_price }}
            </h6> 
            <h6 style="color:blue; text-decoration: line-through;">
               Regular price <br>
               TK{{ $product->price }}
            </h6>
            @else
            <h6>
               Price <br>
               TK{{ $product->price }}
            </h6>
            @endif

            <h6>Product Category : {{ $product->category->category_name }}</h6>

            <h6>Product Deatails : {{ $product->description }}</h6>

            <h6>Available : {{ $product->quantity }}</h6>

            <form action="{{ url('add_cart', $product->id) }}" method="Post">
               @csrf
               <div class="row">
                  <div class="col-md-4">
                     <input type="number" name="quantity" value="1" min="1"> 
                  </div>
                  <div class="col-md-4">
                     <input type="submit" value="Add to Cart" class="">
                  </div>
               </div>
            </form>
         </div>
      </div>
      
      

      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->

      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>

      

      <!-- jQery -->
      <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('home/js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('home/js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{asset('home/js/custom.js')}}"></script>

      


   </body>
</html>