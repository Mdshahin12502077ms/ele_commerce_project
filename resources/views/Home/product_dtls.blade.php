<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="\public">
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

   </style>
   
   
   
   </head>
   <body>
      <div class="hero_area">
        @include('home.header')
        @if(session()->has('messege'))
                        
                        <div class="alert alert-success alert-dismissible" >
                        {{session()->get('messege')}}
                        <button class="close"type="button" data-dismiss="alert" aria-hidden="true" style="margin:right">
                         x</button>
     
                        </div>
     
                        @endif

                        @if(session()->has('rat_msg'))
                        
                        <div class="alert alert-success alert-dismissible" >
                        {{session()->get('rat_msg')}}
                        <button class="close"type="button" data-dismiss="alert" aria-hidden="true" style="margin:right">
                         x</button>
     
                        </div>
     
                        @endif
            <div class="row">

               <div class="col-sm-6 col-md-6 col-lg-6" style="margin:auto; text-align:center;padding:30px;background-color:aqua">
                  <div class="box">
                     
                     <div class="img-box">
                        <img src="{{'storage/'.$product_dtls->Img}}" alt=""style="margin:auto;height:200px;width:200px;margin-bottom:10px;">
                     </div>
                     <div class="detail-box" style="">
                        <h5 style="color:aqua;border:1px solid black;margin:auto;width:100%;margin-bottom:10px">
                        <span style="color:black;"> 
                         {{$product_dtls->Title}}
                     </span>
                        </h5>
                     @if($product_dtls->Dis_Price!=0)
                        <h6 style="color:magenta;border:1px solid black;margin:auto;width:100%;margin-bottom:10px">
                        Discount Price
                        <br>
                        <span style="color:black"> 
                         {{$product_dtls->Dis_Price}}
                         </span>
                        </h6>
                        <h6 style="text-decoration:line-through;color:magenta;border:1px solid black;margin:auto;width:100%;margin-bottom:10px;">
                        Price
                        <br>
                        <span style="color:black"> 
                        {{$product_dtls->Price}}
                        </span>
                        </h6>
                        @else
                        <h6 style="color:magenta;border:1px solid black;margin:auto;width:100%;margin-bottom:10px" >
                        Price
                        <br>
                        <span style="color:black"> 
                        {{$product_dtls->Price}}
                        </span>
                        </h6>
                        
                        @endif
                        <h6 style="color:magenta;border:1px solid black;margin:auto;width:100%;margin-bottom:10px">
                       Category Name
                        <br>
                        <span style="color:black"> 
                        {{$product_dtls->Category}}
                        </span>
                        </h6>
                        <h6 style="color:magenta;border:1px solid black;margin:auto;width:100%;margin-bottom:10px">
                        Description
                        <br>
                        <span style="color:black"> 
                        {{$product_dtls->Description}}
                        </span>
                        </h6>
                        <h6 style="color:magenta;border:1px solid black;margin:auto;width:100%;margin-bottom:10px">
                       Available Quantity
                        <br>
                       <span style="color:black"> {{$product_dtls-> Quantity}}

                       </span>
                        </h6>
                        <form action="{{url('Add_cart',$product_dtls->id)}}" method="post">
                        @csrf
                      
                        <div class="row">
                           <div class="col-md-6">
                           <input type="number" value="1"name="quantity" min="1" class="option1"style="border-radius:30px;">
                        
                           </div>
                          
                           <div class="col-md-6">
                           <input type="submit" value="Add To Cart"class="option1"style="border-radius:30px;">
                           </div>
                           </div>
                        </form>
                     </div>
                  </div>


                  <div>
                     <form class="rating"action="{{url('add_rating',$product_dtls->id)}}"  method="POST">
                      @csrf
                      <div>
                   <label>
                  <input type="radio" name="stars" value="1" />
                  <span class="icon">★</span>
                </label>
                <label>
                  <input type="radio" name="stars" value="2" />
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                </label>
                <label>
                  <input type="radio" name="stars" value="3" />
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>   
                </label>
                <label>
                  <input type="radio" name="stars" value="4" />
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                </label>
                <label>
                  <input type="radio" name="stars" value="5" />
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                  <span class="icon">★</span>
                </label>
                </div>
                   <div>    <input type="submit"               value="Rating"class="option1"style="border-radius:30px;"></div>
                   </form>
                    </div> 
                 <div style="margin-top:20px">
                 @php $avg_rate=number_format($rating_avg) @endphp
                 @for($i=1;$i<=$avg_rate;$i++)
                   <i class="fa fa-star checked"></i>
                 @endfor
           @for($j=$avg_rate+1;$j<=5;$j++)
                 <i class="fa fa-star"></i>
                   @endfor  
               @if($rating->count()>0)
                       <h1>Rating:{{$rating->count()}}</h1>

                 @else
                 <h1>No Rating</h1>
                 @endif
            </div>
           </div>
           </div>

           <!-- product_comment -->
            <div class="container" style="margin-top:20px">
         </div class="row"style="margin:">
         <div class="col-sm-6 col-md-6 col-lg-6" style="margin:auto; text-align:center;padding:30px;background-color:#E4F7F4 ">
         <form action="{{url('Customer_Comment',$product_dtls->id)}}" method="POST">

      @csrf
           <textarea style="margin:auto;height:150px;" placeholder="write something here........" name="comment">
            </textarea>
          <br>
<input type="submit" class="btn btn-primary" value="comment">
</form>

@foreach($Cust_comment as $Cust_comment)

<div  style="margin:0;padding:30px;background-color:#E4F7F4 ">
         <b style="">{{$Cust_comment->name}}</b>
         <p>{{$Cust_comment->comment}}</p>
         <a href="javascript::void(0)"onclick="reply(this)"data_commentid="{{$Cust_comment->id}}">Reply</a>
       
         @foreach($cust_reply as $rep)
         @if($rep->user_id=='1')
         <p>Admin Reply:{{$rep->reply}}</p>
       @endif
        
        @if($rep->comment_id == $Cust_comment->id)
         <div style="padding-left:3%;padding-top:10px;padding-bottom:10px">
        <b>{{$rep->name}}</b>
         <p>{{$rep->reply}}</p>
         <a style="color:blue;"href="javascript::void(0)"onclick="reply(this)"data_commentid="{{$Cust_comment->id}}">Reply</a>
      
      </div>
        @endif
       
        @endforeach
       
      </div>
         @endforeach

</div>



<!-- reply textbox -->
        <div style="display:none" class="replyDiv">
        <form action="{{url('Customer_add_reply',$product_dtls->id)}}" method="POST">
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
</div>
      
     
      @include('home.fotter')
      <!-- footer end -->
      <div class="cpy_">
         <p>© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a></p>
      </div>
      <!-- ratting -->
      <script>
      (':radio').change(function() {
       console.log('New star rating: ' + this.value);
       this->submit;
        });
      </script>
    <!-- reply -->
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
      <!-- jQery -->
      <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('home/js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('home/js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{asset('home/js/custom.js')}}"></script>
   </body>
</html>