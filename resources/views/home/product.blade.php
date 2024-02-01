<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">

               @foreach($products as $product)

               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Men's Shirt
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
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
                     </div>
                  </div>
               </div>

               @endforeach

               <span class="pt-4">
                  {!!$products->withQueryString()->links('pagination::bootstrap-5')!!}
               </span>

               <script>
                  $(document).ready(function () {
                     $('body').on('click', 'a:not(.pagination a)', function (e) {
                           // Check if the clicked link is not a pagination link
                           if (!$(this).hasClass('pagination')) {
                              e.preventDefault();
                              
                              // Check if the link has a hash (indicating an anchor link)
                              if (this.hash) {
                                 $('html, body').animate({
                                       scrollTop: $(this.hash).offset().top
                                 }, 500);
                              } else {
                                 // If the link doesn't have a hash, perform the default behavior
                                 window.location.href = $(this).attr('href');
                              }
                           }
                     });
                  });
               </script>

            </div>
         </div>
      </section>