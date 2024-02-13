<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;
     
use App\Models\User;
use App\Models\Products;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;
use App\Models\subscribe;
use App\Models\Rating;
use App\Models\Contact;
use App\Models\Customer_comment;
use App\Models\Reply;
use App\Models\Customer_Reply;
use RealRashid\SweetAlert\Facades\Alert;
class HomeController extends Controller
{
    public function redirect(){

        $usertype=Auth::User()->usertype;
        if($usertype=='1'){
            $total_product=Products::all()->count();
            $total_orders=Order::all()->count();
            $total_customer=User::all()->count();
            $order=Order::all();
            $total_revenue=0;
            foreach( $order as  $order){
                $total_revenue=  $total_revenue + $order->Price;
            }

            $total_delivered=Order::where('Delivary_Status','=','Delivered')->get()->count();
            $processing=Order::where('Delivary_Status','=','Processing')->get()->count();
            return view('Admin.home',compact('total_product','total_orders','total_customer','total_revenue','total_delivered','processing'));
        }
        else{
              $product=Products::paginate(10);
              $cmnt= Comment::orderby('id','desc')->get();
                 $reply= Reply::all();
        return view('home.userpage',compact('product','cmnt','reply'));
        }
    }
    public function index(){
      
        $product=Products::paginate(10);
        $cmnt= Comment::orderby('id','desc')->get();
           $reply= Reply::all();
        return view('home.userpage',compact('product','cmnt','reply'));
    }
    //product details
    public function Product_details($id){
        $product_dtls=Products::find($id);
      
        //rating show
         $rating=Rating::where('Product_Id',$product_dtls->id)->get();
         $rating_sum=Rating::where('Product_Id',$product_dtls->id)->sum('Rating');
        if($rating->count()>0){
            $rating_avg=$rating_sum/$rating->count();
        }
         else{
            $rating_avg=0;
         }
        //  comment show
           $Cust_comment=Customer_Comment::where('Product_Id',$product_dtls->id)->get();
     //customer_reply_show
           $cust_reply=Customer_Reply::where('Product_Id',$product_dtls->id)->get();
        // admin reply
            
      
         
           return view('home.product_dtls',compact('product_dtls','rating','rating_avg','Cust_comment','cust_reply'));
    }

    Public function Product(){

       
        
        $product=Products::paginate(10);
        return view('home.show_all_product',compact('product'));
    }
    public function Add_cart(Request $request,$id){
        if(auth::id()){
       $user=auth::user();
       $userid= $user->id;
       $product=Products::find($id);
       $product_exist_id=Cart::where('Product_Id','=',$id)->where('User_Id','=', $userid)->get('id')->first();

       if($product_exist_id)
       {
        $cart=Cart::find($product_exist_id)->first();
        
        $quantity= $cart->Product_Qantity;
        
        $cart->Product_Qantity=$quantity + $request->quantity;
        
        if($product->Dis_Price!=0){
            $cart->Price=$product->Dis_Price *   $cart->Product_Qantity;
           }
           else{
            $cart->Price=$product->Price *$cart->Product_Qantity;
           }
           $re_quantity=$request->quantity;
           $prod=$product->Quantity;
         if($prod<$re_quantity){
             return redirect()->back()->with('messege','Your Choise Limit Is Stock Out');
         }
 
      else{
         if($product->Quantity>=$re_quantity){
             $cart->Product_Qantity=$re_quantity;
             $product_quan=$product->Quantity-$re_quantity;
             $product->Quantity=$product_quan;
               $product->save();
               $cart->save();
               return redirect()->back()->with('messege','Add Cart Successfully');
         }
  
      }
        
   
       }
       else
       {
        $cart=new Cart();
        $cart->name=$user->name;
        $cart->email=$user->email;
        $cart->phone=$user->phone;
        $cart->address=$user->address;
        $cart->User_Id=$user->id;
        $cart->Product_Id=$product->id;
        $cart->Product_Title=$product->Title;
        if($product->Dis_Price!=0){
         $cart->Price=$product->Dis_Price * $request->quantity;
        }
        else{
         $cart->Price=$product->Price * $request->quantity;
        }
 
        $cart->Image=$product->Img;
        $re_quantity=$request->quantity;
          $prod=$product->Quantity;
        if($prod<$re_quantity){
            return redirect()->back()->with('messege','Your Choise Limit Is Stock Out');
        }

     else{
        if($product->Quantity>=$re_quantity){
            $cart->Product_Qantity=$re_quantity;
            $product_quan=$product->Quantity-$re_quantity;
            $product->Quantity=$product_quan;
              $product->save();
              $cart->save();
              return redirect()->back()->with('messege','Add Cart Successfully');
        }
     }
       
 
       }
      
        }
        else{
            return redirect('login');
        }
    }
  public function show_cart(){
    if(auth::id()){
    $id=auth::user()->id;
    $cart=Cart::where('User_Id','=',$id)->get();
    return view('home.show_cart',compact('cart'));
    }

    else{
        return redirect('login');
    }
  }
  public function remove_cart($id){
    $remove_cart=Cart::find($id);
    $remove_cart->delete();
    return redirect()->back()->with('messege','Remove Product Successfully');
  }

  public function cart_count(){
    if(auth::id()){
    $cartcount=Cart::where('user_id',Auth::id())->count();
    return response()->json(['count'=>$cartcount]);
    }
  }

  public function Cash_Order(){
  $user=auth::user();
  $userid= $user->id;

 $data=Cart::where('User_Id','=', $userid)->get();

  foreach($data as $data){
    $order= new Order;
    $order->Name=$data->Name;
    $order->Email=$data->Email;
    $order->Phone=$data->Phone;
    $order->Address=$data->Address;
    $order->User_Id=$data->id;

    $order->Product_Id=$data->id;
    $order->Product_Title=$data->Product_Title;
    $order->Price=$data->Price;
    $order->Image=$data->Image;
    $order->Product_Qantity=$data->Product_Qantity;

    $order->Payment_status='Cash On Delivary';
    $order->Delivary_status='Processing';

    $order->save();

    $crt_id = $data->id;
    $cart=Cart::find($crt_id);
    $cart->delete();;


  }
  return redirect()->back()->with('msg','We Have Recevied Your Order, We will contact with you soon...');

 }
    //payment cart
 public function stripe( $total_price)
 {
  return view('home.stripe',compact('total_price'));
 }

 public function stripePost(Request $request,$total_price)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $total_price* 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks For Payment" 
        ]);
      


        
        $user=auth::user();
        $userid= $user->id;
      
       $data=Cart::where('User_Id','=', $userid)->get();
      
        foreach($data as $data){
          $order= new Order;
          $order->Name=$data->Name;
          $order->Email=$data->Email;
          $order->Phone=$data->Phone;
          $order->Address=$data->Address;
          $order->User_Id=$data->id;
      
          $order->Product_Id=$data->id;
          $order->Product_Title=$data->Product_Title;
          $order->Price=$data->Price;
          $order->Image=$data->Image;
          $order->Product_Qantity=$data->Product_Qantity;
      
          $order->Payment_status='Cash On Delivary';
          $order->Delivary_status='Processing';
      
          $order->save();
      
          $crt_id = $data->id;
          $cart=Cart::find($crt_id);
          $cart->delete();;
      
      
        }
            

        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    //show order to user

    public function show_order(){
        if(auth::id()){
       
            $user=auth::user();
            $userid=$user->email;
            $order=Order::where('Email','=',$userid)->get();

            return view('home.order',compact('order'));
            }
        
            else{
                return redirect('login');
            }
    }
    //cancel order
    public function cancel_order($id){
    $data=Order::find($id);
    $data->Delivary_Status='You Canceled The Order..';
    $data->save();

   return redirect()->back();
    }
    //comment part
    public function add_comment(Request $request){
     $comment= new Comment();
     if(auth::id()){

        $comment->name=auth::user()->name;
        $comment->user_id=auth::user()->id;
        $comment->comment=$request->comment;
        $comment->save();
        return redirect()->back();
     }
     else{
        return redirect('login');
     }
    }
    // reply
    public function add_reply(Request $request){
        $reply= new Reply();
        if(auth::id()){
   
           $reply->name=auth::user()->name;
           $reply->user_id=auth::user()->id;
           $reply->comment_id=$request->commentId;
           $reply->reply=$request->reply;
           $reply->save();
           return redirect()->back();
        }
        else{
           return redirect('login');
        }
       }
    //    product search
    public function product_search(Request $request)
    {
        $search_text=$request->search;
        $cmnt= Comment::orderby('id','desc')->get();
        $reply= Reply::all();
        $product=Products::where('title','LIKE',"%$search_text%")->orwhere('category','LIKE',"$search_text")->paginate(10);

        return view('home.userpage',compact('product','cmnt','reply'));

    }
    //product_search_product
    public function product_search_product(Request $request)
    {
        $search_text=$request->search;
        $cmnt= Comment::orderby('id','desc')->get();
        $reply= Reply::all();
        $product=Products::where('title','LIKE',"%$search_text%")->orwhere('category','LIKE',"$search_text")->paginate(10);

        return view('home.show_all_product',compact('product','cmnt','reply'));

    }

    // subscribe mail
    public function subscribe_mail(Request $request){

        $subscribe=new subscribe();
        $subscribe->subscribe_mail=$request->subscribe_mail;
        $subscribe->save();
        return redirect()->back();
    }

    //contact
    public function contacts(){
        
        return view('Home.contact_us');
    }
    public function contact_client(Request $request){

        $contact=new Contact();
        $contact->Name=$request->name;
        $contact->Email=$request->client_email;
        $contact->Messege=$request->messege;
        $contact->save();
        return redirect()->back()->with('msg','Your Messege Send Successfully,Our Team Contact With You soon..');
    }
    //rating
    public function add_rating(Request $request,$id){
        if(auth::id()){
            $user=auth::user();
            $userid= $user->id;
            $username=$user->name;
            $product=Products::find($id);
            $rating=new Rating();
            $rating->Customer_Name=$username;
            $rating->Product_Title= $product->Title;
            $rating->Product_Id= $product->id;
            $rating->Rating=$request->stars;
           
            $rating->user_id=$userid;
          
            $rating->save();
            return redirect()->back()->with('rat_msg','Thanks For Rating And Keep With Us');
        }
        else{
            return redirect('login');
        }

    }
    public function Customer_Comment(Request $request,$id){
      
       
        if(auth::id()){
            $comment= new Customer_comment();

           $comment->name=auth::user()->name;
           $comment->user_id=auth::user()->id;
           $comment->comment=$request->comment;
           $product=Products::find($id);
           $comment->Product_Id= $product->id;
           $comment->save();
           return redirect()->back();
        }
        else{
           return redirect('login');
        }
       }
//CUSTOMER REPLY
       public function Customer_add_reply(Request $request,$id){
        $reply= new Customer_Reply();
        if(auth::id()){
   
           $reply->Customer_name=auth::user()->name;
           $reply->user_id=auth::user()->id;
           $product=Products::find($id);
           $reply->Product_Name= $product->Title;
           $reply->Product_Id= $product->id;
           $reply->comment_id=$request->commentId;
           $reply->reply=$request->reply;
           $reply->save();
           return redirect()->back();
        }
        else{
           return redirect('login');
        }
       }
}