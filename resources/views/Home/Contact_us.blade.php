



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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </head>
   <body>

      <div class="hero_area">
      @include('sweetalert::alert')

        @include('home.header')
         <!-- slider section -->
       <!-- Wrapper container -->
<div class="container py-4">
@if(session()->has('msg'))
                        
                        <div class="alert alert-success alert-dismissible" >
                        {{session()->get('msg')}}
                        <button class="close"type="button" data-dismiss="alert" aria-hidden="true" style="margin:right">
                         x</button>
     
                        </div>
     
                        @endif
<!-- Bootstrap 5 starter form -->
<div class="heading_container heading_center">
               <h2>
                  Client <span>Claim</span>
               </h2>
               </div>
<form style="background-color:#ECF0F1;box-shadow: 5px 10px #888888;"id="contactForm" action="{{url('/contact')}}" method="POST">
 @csrf
    <!-- Name input -->
    <div class="mb-3">
        <label class="form-label" for="name">Name</label>
        <input class="form-control" name="name"id="name" type="text" placeholder="Name" data-sb-validations="required" />
    </div>

    <!-- Email address input -->
    <div class="mb-3">
        <label class="form-label" for="emailAddress">Email Address</label>
        <input class="form-control"name="client_email" id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required, email" />
    </div>

    <!-- Message input -->
    <div class="mb-3">
        <label class="form-label" for="message">Message</label>
        <textarea class="form-control"name="messege" id="message" type="text" placeholder="Message"
            style="height: 10rem;" data-sb-validations="required"></textarea>
    </div>

    <!-- Form submit button -->
    <div class="d-grid"style="margin-left:50%;">
        <button class="btn btn-primary" style="background-color:green;"type="submit">Submit</button>
    </div>

</form>

</div>
<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Other <span>Contact</span>
               </h2>
               </div>
               <div style="background-color:black;color:white;text-align:center;padding:10px">
                <label for="">Adress</label>
                <h2>West Nandipara,Dhaka-1214</h2>
                <br>
                <label for="">Mobile Number</label>
                <h2>+88 01707966343</h2>
                <br>
                <label for="">Website</label>
                <h2>www.ourshop.com</h2>
               </div>
               

</div>
</section>
      <div class="cpy_">
         <p>© 2023 All Rights Reserved By <span style="color:red">Ourshops.com</span></p>
      </div>
      <!-- jQery -->

     
<!-- end comment script -->
<!-- overload page ending -->

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