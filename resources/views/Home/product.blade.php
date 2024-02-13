
<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
               <br><br>
               <div>
               <form action="{{url('product_search')}}" method="GET">
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
            <div class="btn-box">
               <a href="{{url('/Product')}}">
               View All products
               </a>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
         </div>

         
      </section>
      


      