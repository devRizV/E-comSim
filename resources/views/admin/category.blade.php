<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    @include('admin.css')

    <style>
        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }
        .h2_font
        {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input_color
        {
            color: black;
        }
        .center
        {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid green;
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


                <div class="div_center"> 
                    <h2 class="h2_font">Add Category</h2>

                    <form action="{{ route('add_category') }}" method="POST">
                        @csrf
                        <input class="input_color" type="text" name="category" placeholder="Category Name">
                        <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                    </form>

                    <table class="center">

                        <tr>
                            <td>Category Name</td>
                            <td>Action</td>
                        </tr>
                        
                        <tr>
                            <td>Toys</td>
                            <td><a href="#" class="btn btn-danger">Delete</a></td>
                            
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>