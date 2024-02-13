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
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
   <style>
    .table{
        margin:auto;
        width:80%;
        text-align:center;
        padding:30px;
    }
   </style>
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
   <body>
   
      <div class="hero_area">
      @include('sweetalert::alert')
        @include('home.header')
         <!-- slider section -->
         @if(session()->has('msg'))
         <div class="alert alert-success alert-dismissible" >
                        {{session()->get('msg')}}
                        <button class="close"type="button" data-dismiss="alert" aria-hidden="true" style="margin:right">
                         x</button>
     
                        </div>
                        @endif
         <!-- end slider section -->
         @if(session()->has('messege'))
         <div class="alert alert-success alert-dismissible" >
                        {{session()->get('messege')}}
                        <button class="close"type="button" data-dismiss="alert" aria-hidden="true" style="margin:right">
                         x</button>
     
                        </div>
         @endif
        
     <div class="table">
     <h2 style="text-align:center;margin-bottom:20px">YOUR CARD PRODUCT</h2>
         <table class="table table-hover table-dark">
        <tr>
            <th>Product Title</th>
            <th>Product Quantity</th>
            <th>Product Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php $total_price=0;
        
        ?>

        @foreach($cart as $cart)
        <tr>
            <td>{{$cart->Product_Title}}</td>
            <td>{{$cart->Product_Qantity}}</td>
            <td>{{$cart->Price}}</td>
            <td>
            <img src='{{"storage/".$cart->Image}}' alt="" style="height:100px;width:50px;border-radius:0px;">
            </td>
            <td><a onclick="return confirm('Are You Sure To Remove This Product')" href="{{url('remove_cart',$cart->id)}}" class="btn btn-danger">Remove Product</a></td>
        </tr>
        <?php $total_price=$total_price+$cart->Price;
  
        ?>

        @endforeach
      <tr>
        <td colspan="5"style="font-size:30px"><h1>TOTAL PRICE:{{$total_price}}</h1></td>
      
      </tr>
      </table>
      <div style="margin-top:20px">
        <h1 style="font-size:30px;padding-bottom:15px">Process To Order</h1>
        <?php
        if($total_price!=0){
         ?>
        <a href="{{url('Cash_Order')}}" class="btn btn-danger">Cash On Delivary</a>
        <a href="{{url('/stripe',$total_price)}}" class="btn btn-danger">Pay Using Cart</a>
        <?php
        }
        else{
        ?>
          <input type="button" id="btnFinish" class="btn btn-primary" value="Cash On Delivary" onclick="this.disabled = true" style="background-color:green"/>

          <input type="button" id="btnFinish" class="btn btn-danger" value="Pay Using Card" onclick="this.disabled = true" style="background-color:red"/>
         <?php
        }
        ?>
        </div>
      </div>
      <!-- why section -->
      @include('home.fotter')
      <div class="cpy_">
         <p>© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a></p>
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