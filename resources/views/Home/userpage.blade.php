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
         @include('Home.slider')
         <!-- end slider section -->
   
      <!-- why section -->
      @include('home.why')
      <!-- end why section -->
      
      <!-- arrival section -->
      @include('home.arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('home.product')
      <!-- end product section -->

      <!-- comment section start -->

       <div style="text-align:center;padding-bottom:30px;">
         <h1 style="text-align:center;font-size:30px;padding-top:20px;padding-bottom:20px">Comments</h1>

         <form action="{{url('add_comment')}}" method="POST">

           @csrf
         <textarea style="margin:0px;height:150px;width:600px;" placeholder="write something here........" name="comment">
       </textarea>
       <br>
       <input type="submit" class="btn btn-primary" value="comment">
         </form>
       </div>
      

       <div style="padding-left:20%">
         <h1 style="font-size:30px;padding-bottom:20px">All Comments</h1>
         
       @foreach($cmnt as $comment)
         <div>
         <b>{{$comment->name}}</b>
         <p>{{$comment->comment}}</p>
         <a href="javascript::void(0)"onclick="reply(this)"data_commentid="{{$comment->id}}">Reply</a>
        
        @foreach($reply as $rep)
        @if($rep->comment_id == $comment->id)
         <div style="padding-left:3%;padding-top:10px;padding-bottom:10px">
        <b>{{$rep->name}}</b>
         <p>{{$rep->reply}}</p>
         <a style="color:blue;"href="javascript::void(0)"onclick="reply(this)"data_commentid="{{$comment->id}}">Reply</a>
        </div>
        @endif
        @endforeach
        </div>
       @endforeach
        
<!-- reply textbox -->
        <div style="display:none" class="replyDiv">
        <form action="{{url('add_reply')}}" method="POST">
         @csrf
        <input type="text" name="commentId" id="commentId" hidden="">
        <textarea style="margin:0px;height:150px;width:600px;" name="reply"placeholder="Reply here........">
       </textarea>
       <br>
       
     <button type="submit" class="btn btn-warning">Reply</button>
          <a class="btn btn-secondary" href="javascript::void(0)"onclick="reply_close(this)">Close</a>
          </form>
         </div>
       </div>


       <!-- comment section end -->

      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.client')
      <!-- end client section -->
      <!-- footer start -->
      @include('home.fotter')
      <!-- footer end -->
      <div class="cpy_">
         <p>© 2023 All Rights Reserved By <span style="color:red">OURSHOPS.com</span></p>
      </div>
      <!-- jQery -->

      <script>
         function reply(caller){
            document.getElementById('commentId').value=$(caller).attr('data_commentid')
          $('.replyDiv').insertAfter($(caller));
          $('.replyDiv').show();
         }

         function reply_close(caller){
      
          $('.replyDiv').hide();
         }
      </script>
<!-- end comment script -->
<!-- overload page ending -->
<script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
   
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