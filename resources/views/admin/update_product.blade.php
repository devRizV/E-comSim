<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    @include('admin.css')

    <style type="text/css">
        
        .div_center
        {
            text-align: center;
            padding-top: 40px;
            background-color: rgb(100, 10, 50);
        }

        .font_size
        {
            font-size: 40px;
            padding: 40px 40px 40px 40px;
            margin: 10px 10px 10px 10px;
            background-color: rgb(120, 0, 10);
            border-radius: 100px;
            display: inline-block;
        }
        .text_color
        {
            color: black;
            padding-bottom: 20px;
            border-radius: 30px;
        }
        label
        {
          display: inline-block;
          width: 200px;
        }
        .div_design
        {
          border-radius: 100px;
          padding: 10px;
          margin: 10px;
          background-color: rgb(100, 0, 10);
          display: inline-block;
        }
        .pill
        {
          border-radius: 30px;
          border: transparent;
          margin: 2px;
        }
        .pill:hover
        {
            border: 1px solid white;
        }
        .option_css
        {
          background-color: rgb(100,0,100);
        }

        .curr_img
        {
            width: 100px;
            height: 100px;
            margin: auto;
        }

    </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper div_center">

                @if(session('message'))
                  <div class="alert alert-success">

                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                      {{ session('message') }}
                      
                  </div>
                @endif

                <div class="div_center" >
                    <h1 class="font_size">Update Product:</h1>

                    <form action="{{ url('/product_update_confirm', $product->id) }}" method="POST" enctype="multipart/form-data">

                      @csrf

                    <div class="div_design pill">
                       <label> Product Title: </label>
                        <input class="text_color" type="text" name="title" placeholder="Write a product title" required="" value="{{$product->title}}"> 
                    </div>
                    
                    <div class="div_design pill">
                       <label> Product Description: </label>
                        <input class="text_color" type="text" name="description" placeholder="Write a product description" required="" value="{{$product->description}}"> 
                    </div>

                    <div class="div_design pill">
                       <label> Product Price:</label>
                        <input class="text_color" type="number" name="price" placeholder="Write product price" required="" value="{{$product->price}}"> 
                    </div>

                    <div class="div_design pill">
                       <label> Discount Price: </label>
                        
                       <input class="text_color" type="number" name="discount_price" placeholder="Write discount to apply:" value="{{$product->discount_price}}"> 
                    </div>

                    <div class="div_design pill">
                       <label> Product Quantity: </label>
                        <input class="text_color" type="number" min="0" name="quantity" placeholder="Write product quantity" required="" value="{{$product->quantity}}"> 
                    </div>
                   
                    <div class="div_design pill">
                       <label> Product Category: </label>
                        <select class="text_color" name="category" id="category" required="">
                           @foreach($category as $categoryItem)
                            <option class="option_css"  value="{{ $categoryItem->id }}">{{ $categoryItem->category_name }}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="">
                       <label>Current Product Image: </label>
                        <img class="curr_img" src="/product/{{ $product->image }}" alt="{{ $product->image }}">
                    </div>
                   
                    <div class="div_design pill">
                       <label> Change Product Image: </label>
                       <input type="file" name="image" id="image"> 
                    </div>
                    
                    <div class="div_design pill">
                       <input type="submit" value="Update Product" class="btn">
                    </div>

                    </form>
            </div>
        </div>
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
