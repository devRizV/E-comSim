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
        }
        .pill:hover
        {
            border: 1px solid white;
            margin:0;
            transition: 0.5s ease-in-out;
        }
        .option_css
        {
          background-color: rgba(230, 200, 230, 1.0);
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
            <div class="content-wrapper">
              @if(session('message'))
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

                    {{ session('message') }}
                    
                </div>
              @endif
                <div class="div_center" >
                    <h1 class="font_size">Add Product:</h1>

                    <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">

                      @csrf

                    <div class="div_design pill">
                       <label> Product Title: </label>
                        <input class="text_color" type="text" name="title" placeholder="Write a product title" required=""> 
                    </div>
                    
                    <div class="div_design pill">
                       <label> Product Description: </label>
                        <input class="text_color" type="text" name="description" placeholder="Write a product description" required=""> 
                    </div>

                    <div class="div_design pill">
                       <label> Product Price:</label>
                        <input class="text_color" type="number" name="price" placeholder="Write product price" required=""> 
                    </div>

                    <div class="div_design pill">
                       <label> Discount Price: </label>
                        
                       <input class="text_color" type="number" name="discount_price" placeholder="Write discount to apply:"> 
                    </div>

                    <div class="div_design pill">
                       <label> Product Quantity: </label>
                        <input class="text_color" type="number" min="0" name="quantity" placeholder="Write product quantity" required=""> 
                    </div>
                    
                    <div class="div_design pill">
                       <label> Product Category: </label>
                        <select class="text_color" name="category" id="category" required="">
                          <option class="option_css" value="" selected placeholder="select category"></option>
                          @foreach($categories as $category)
                            <option class="option_css"  value="{{ $category->id }}">{{ $category->category_name }}</option>
                          @endforeach

                        </select>
                    </div>

                    <div class="div_design pill">
                       <label> Product Image here: </label>
                        
                       <input type="file" name="image" id="" required=""> 
                    </div>
                    
                    <div class="div_design pill">
                       <input type="submit" value="Add Product" class="btn">
                    </div>

                    </form>

                </div>
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