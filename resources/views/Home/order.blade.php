<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
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
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
      
    </head>
   <body>
      <div class="hero_area">
      @include('sweetalert::alert')

          @include('home.header')
         <!-- slider section -->
         <div class="main-panel">
        <div class="content-wrapper">
         <div class="table-responsive">
                      <table class="table Payment_status table-contextual"style="margin-top:10px;margin:auto;width:80%">
                        <thead style="background-color:green">
                          <tr >
  
                            <th style="color:white;font-size:14px;">Product Title </th>
                            <th style="color:white;font-size:14px;"> Quantity </th>
                            <th style="color:white;font-size:14px;"> Price </th>
                            <th style="color:white;font-size:14px;">Payment Status </th>
                            <th style="color:white;font-size:14px;">Delivary Status </th>
                            <th style="color:white;font-size:14px;">Product Image</th>

                            <th style="color:white;font-size:14px;">Cancel Order</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($order as $order)
                          <tr class="">
                           <td>{{$order->Product_Title}}</td>
                           <td>{{$order->Product_Qantity}}</td>
                           <td>{{$order->Price}}</td>
                           <td>{{$order->Payment_status}}</td>
                           <td>{{$order->Delivary_status}}</td>
                           <td>
                            <img src='{{"storage/".$order->Image}}' alt=""style="height:100px;width:50px;border-radius:0px;">
                           </td>

                         
                        <td>
                           @if($order->Delivary_status=='Processing')
                            <a onclick="return confirm('Are You Sure To Cancel Order..')"href="{{url('/cancel_order',$order->id)}}" class="btn btn-danger">Cancel Order</a>
                         @elseif($order->Delivary_status=='Delivered')
                          <p style="color:green">Delivered</p>
                         
                            @else
                          <p style="color:green">Cancelled</p>
                          
                         @endif
                        </td>
                         </tr>
                 
                          @endforeach
                        </tbody>
                      </table>
                      
                    </div>
                    </div>
                    </div>
    
      <div class="cpy_">
         <p>© 2023 All Rights Reserved By <a href="https://html.design/">OURSHOPS.com</a></p>
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