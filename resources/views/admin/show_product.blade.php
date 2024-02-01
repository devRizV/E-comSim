<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    @include('admin.css')

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
              <div class="">
                <h2 class="h2_font"> List of Products</h2>
                <table class="center table_design">
                  <thead> 
                    <tr>
                      <th>Product Title</th>
                      <th>Description</th>
                      <th>Quantity</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Discount Price</th>
                      <th>Product Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                @foreach($products as $product)
                  <tbody>
                    <tr>
                      <td>{{ $product->title }}</td>
                      <td>{{ $product->description }}</td>
                      <td>{{ $product->quantity }}</td>
                      <td>{{ $product->category->category_name }}</td>
                      <td>{{ $product->price }}</td>
                      <td>{{ $product->discount_price }}</td>
                      <td>
                        <img class="img_size" src="/product/{{ $product->image }}" alt="{{ $product->image }}">
                      </td>
                      <td>
                        <a class="btn btn-success flex" href="{{ url('update_product', $product->id) }}">Edit</a>
                        <a class="btn btn-danger flex" onclick="return confirm('Are you sure you?')" href="{{ url('delete_product', $product->id) }}">Delete</a>
                        
                      </td>
                      
                    </tr>
                  </tbody>
                    
                @endforeach
                </table>
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