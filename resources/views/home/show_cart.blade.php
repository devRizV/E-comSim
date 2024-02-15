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

      <style>
            .center
            {
                margin:auto;
                width: 70%;
                text-align; 30px;
                padding:30px
            }
            table, th, td
            {
                border: 1px solid #f0f;
                align-items: center;
                text-align: center;
            }
            .th_deg
            {
                font-size: 30px;
                padding: 5px;
                background: skyblue;
            }
            .img_deg
            {
                width: 200px;
                height: 200px;
            }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
      
      
        <div class="center">

            <table>
                <tr>
                    <th class='th_deg'>Product Title</th>
                    <th class='th_deg'>Product Quantity</th>
                    <th class='th_deg'>Price</th>
                    <th class='th_deg'>Image</th>
                    <th class='th_deg'>Action</th>
                </tr>

                <?php $totalprice=0; ?>

                @foreach($cart as $item)
                <tr>
                    
                    <td>{{$item->product_title}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price}}</td>
                    <td ><img class="img_deg" src="product/{{$item->image}}" alt=""></td>
                    <td>
                        <a class="btn btn-danger" onclick="return confirm('Please confirm.')" href="{{ url('/remove_cart', $item->id) }}">Remove from cart</a>
                    <td>

                <?php $totalprice=$totalprice + $item->price; ?>

                </tr>
                @endforeach

            </table>
            <div>
                <h3>Total Price: {{$totalprice}}</h3>
            </div>

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