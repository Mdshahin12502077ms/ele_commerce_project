 <!-- header section strats -->
 





 <header class="header_section">
         
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"> </span>
       </button>
 <a style="margin:20px;font-size:30px; width:20%;color:#ff6347"class="navbar-brand" href="{{url('/')}}" class="logo1">OURSHOPS</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      <li class="nav-item active">
                           <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                      
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('/Product')}}">Products</a>
                        </li>
                      
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('/contacts')}}">Contact</a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link" href="{{url('/show_cart')}}">Cart
                        <span class="badge badge-pill bg-primary cart_count" style="height:20px">0</span>
                           </a>
                        </li>
                         
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('/show_order')}}">Order</a>
                        </li>
                        <li>
                  <form class="d-flex"action="{{url('product_search_product')}}" method="GET">
                     @csrf
                    <input class="form-control me-2" type="text"name="search" placeholder="Search" aria-label="Search">
                   <button style="margin-left:10px;margin-right:10px;height:37px"class="btn btn-outline-success" type="submit">Search</button>
                   </form>
                   </li>
                  @if (Route::has('login'))
                        @auth
                        <li class="nav-item logout" style="margin:0.5px;">
                        <x-app-layout>
                       </x-app-layout> 
                        </li>
                        @else
                        <li class="nav-item">
                           <a style="margin-bottom:5px"class="btn btn-primary login" href="{{ route('login') }}" id="logincss">Login</a>
                        </li>
                        
                        <li class="nav-item">
                           <a class="btn btn-success"  href="{{ route('register') }}">Register</a>
                        </li>
                        @endauth
                        @endif
      </ul>
     
      
    </div>
  </div>
</nav>


         </header>
         <script>
      
      $(document).ready(function()
           {
            loadcart();
           }
           )
          function loadcart(){
            $.ajax({
                method:"GET",
                url:"/load-cart-data",
                success: function(response){
                  $('.cart_count').html('');
                  $('.cart_count').html(response.count);
                  // console.log(response.count);
                }
            });
          }
         
    </script>
         <!-- end header section -->
         