

      <!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
   
   </head>
   <body>
      <div class="hero_area">
        @include('home.header')
      
<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
               <div>
                  <form action="{{url('product_search_product')}}" method="GET">
                     @csrf
                     <input style="width:500px" type="text" name="search" placeholder="search for something....">
                     <input type="submit" value="Search">
                  </form>
               </div>
            </div>
            @if(session()->has('messege'))
                        
                        <div class="alert alert-success alert-dismissible" >
                        {{session()->get('messege')}}
                        <button class="close"type="button" data-dismiss="alert" aria-hidden="true" style="margin:right">
                         x</button>
     
                        </div>
     
                        @endif
            <div class="row">
               @foreach($product as $products)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box"style=" box-shadow: 5px 10px #888888;background-color: rgb(68,68,68); ">
                     <div class="option_container">
                        <div class="options">
                          
                           <a href="{{url('Product_details',$products->id)}}" class="option1">
                            Product Details
                           </a>
                        <form action="{{url('Add_cart',$products->id)}}" method="post">
                        @csrf
                        <div class="row">
                           <div class="col-md-12">
                             
                           <input type="number" value="1"name="quantity" min="1" class="option1"style="border-radius:30px;">
                           </div>
                           </div>
                           <div class="row">
                       
                           <div class="col-md-3">
                           <input type="submit" value="Add To Cart"class="option1"style="border-radius:30px;">
                           </div>
                   
                           </div>
                        </form>
                        </div>
                     </div>
                     
                     <div class="img-box"style="margin-bottom:10px">
                        <img src="{{'storage/'.$products->Img}}" alt="">
                     </div>
                     <div class="detail-box;" style="text-align:center">
                        <h5 style="border:1px solid black;height:50px;color:white;width:200px;margin-bottom:10px">
                         {{$products->Title}}
                        </h5>
                     @if($products->Dis_Price!=0)
                        <h6 style="border:1px solid black;height:40px;width:200px;margin-bottom:10px;color:red">
                        Discount Price
                        <br>
                         {{$products->Dis_Price}}
                        </h6>
                        <h6  style="text-decoration:line-through;color:blue;border:1px solid black;height:40px;width:200px;margin-bottom:10px">
                        Price
                        <br>
                        {{$products->Price}}
                        </h6>
                        @else
                        <h6 style="color:blue">
                        Price
                        {{$products->Price}}
                        </h6>
                        @endif
                        @if($products->Quantity>0)
                       <h6 style="color:aqua;border:1px solid black;height:40px;width:200px;margin-bottom:10px">Stock In</h6>
                       @else
                       <h6 style="color:aqua;border:1px solid black;height:40px;width:200px;margin-bottom:10px">Stock Out</h6>
                       @endif
                       
                     </div>
                  </div>
                 
                  
                  

               </div>
               @endforeach
               
               
            </div>
            <span style="padding-top:25px">
            {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}
            </span>
            
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
         </div>
      </section>
      <!-- footer start -->
      @include('home.fotter')
      <!-- footer end -->
      <div class="cpy_">
         <p>© 2023 All Rights Reserved By <a href="https://html.design/">OURSHOPS</a></p>
      </div>
      <!-- jQery -->
      <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('home/js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('home/js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{asset('home/js/custom.js')}}"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </body>
</html>


