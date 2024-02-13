<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\category;
use App\Models\Products;
use App\Models\Order;
use App\Models\User;
use App\Models\Contact;
use App\Models\Customer_comment;
use App\Models\Customer_Reply;
use PDF;
use Notification;
use App\Notifications\SendEmailNotification;

// use App\Http\Controllers\redirect;
class AdminController extends Controller
{
    //add panel show
    public function view_category(){
      if(Auth::id())
      {
        $data=category::all();
        return view('Admin.category',compact('data'));
      }
    else {
      return redirect('login');
      }

      
    }
    //delete category
    public function delete_category($id){
      $data=category::find($id);
       $data->delete();
       return redirect()->back()->with('delete','Delete Data Successfully');
    }
   //add category
     public function add_category(Request $request){
      $data= new category(); //model call
     $data->category_name=$request->category_name;
     $data->save();
     return redirect()->back()->with('message','Add Category Successfully');
   
    }
    //View Product Page
    public function view_product(){
      $category = category::all();
      //$category = $category ->get();
     
    
      return view('Admin.Products',compact('category'));
    }
    //add product
    public function Add_Product(Request $request){

      
      $title=$request->input('title');
      $description=$request->input('description');
      $product_price=$request->input('product_price');
      $product_quantity=$request->input('product_quantity');
      $dis_price=$request->input('dis_price');
      $category=$request->input('category');
    $img= $request->file('img')->store('public/product');
   
    //  $image=$request->file('img');
    //  $imagename=time().'.'.$image->getClientOriginalExtension();
    //  $request->$image->move('product', $imagename);
    //   $product= $imagename;
        
      $product= new Products();
       $product->Title=  $title;
      $product->Description= $description;
      $product->Price= $product_price;
      $product->Quantity= $product_quantity;
      $product->Dis_Price=$dis_price;
      $product->Category= $category;
      $product->Img=$img;
      

      
     $product->save();
       return redirect()->back()->with('message','Product Added Successfully');



    }
    //show_product
    public function show_product(){
     $product=Products::all();
     
      return view('Admin.show_product',compact('product'));
    }
    //delete product
    public function delete_product($id){
     $pro_dlt=Products::find($id);
     $pro_dlt->delete();
     return redirect()->back()->with('dl_message','Delete Product information successfully');

    }

    // show update product
    public function Edit_product($id){
       $update_product=Products::find($id);
       $category=category::all();
      return view('Admin.Edit_product',compact('update_product','category'));
    }
    //Update_product_confirm
    public function Update_product_confirm(Request $request,$id){
    


      if(Auth::id())
      {
        $title=$request->input('title');
        $description=$request->input('description');
        $product_price=$request->input('product_price');
        $product_quantity=$request->input('product_quantity');
        $dis_price=$request->input('dis_price');
        $category=$request->input('category');
        $product=Products::find($id);
        if($request->file('img')){
      $img= $request->file('img')->store('public/product');
      $product->Img=$img;
     }
      //  $image=$request->file('img');
      //  $imagename=time().'.'.$image->getClientOriginalExtension();
      //  $request->$image->move('product', $imagename);
      //   $product= $imagename;
          
 
         $product->Title=  $title;
        $product->Description= $description;
        $product->Price= $product_price;
        $product->Quantity= $product_quantity;
        $product->Dis_Price=$dis_price;
        $product->Category= $category;
      
           
       $product->save();
       return redirect()->back()->with('message','Update Product Successfully');
  
      }
    else {
      return redirect('login');
      }
        
    
    }

  public function Order(){
      $order=Order::all();
      return view('Admin.Order',compact('order'));
    }
    public function Delivered($id){
      $order=Order::find($id);
      $order->Delivary_status="Delivered";
      $order->Payment_status="Paid";
      $order->save();
      return redirect()->back();

    }
//cancel order
public function cancel_order($id){
  $data=Order::find($id);
  $data->Delivary_Status='You Canceled The Order..';
  $data->save();

 return redirect()->back();
  }
    //print
    public function print_pdf($id){
      $order=Order::find($id);
      $pdf=PDF::loadview('Admin.pdf',compact('order'));
      return $pdf->download('order_details.pdf');
   
    }
//send email
    public function send_email($id){
      $order=Order::find($id);

      return view('Admin.email',compact('order'));

    }
    //user email send
   public function send_user_email(Request $request,$Email){

     $order=Order::find($Email);
      $user=User::all();
     $details=[

      'greeting'=>$request->greeting,
      'firstline'=>$request->firstline,
      'body'=>$request->body,
      // 'button'=>$request->button,
      // 'url'=>$request->url,
      // 'lastline'=>$request->lastline,
    
    ];
 
   $data=Notification::send($user,new SendEmailNotification( $details));
  
   return redirect()->back();
   
  //problem ace 

}

//search for order
public function search(Request $request){
  $search_text=$request->srch;
  
  $order=Order::where('Name','LIKE',"%$search_text%")->orwhere('Phone','LIKE',"%$search_text%")->orwhere('Product_Title','LIKE',"%$search_text%")->get();

  return view('Admin.Order',compact('order'));
}
public function messege_showing(){
  $contact=Contact::all();
  return view('Admin.messege_showing',compact('contact'));
}
public function Show_Customer_Comment(){
  $Customer_Comment=Customer_comment::all();
  return view('Admin.Customer_Comment',compact('Customer_Comment'));
}
public function Reply_comment($id){
  
  $Customer=Customer_comment::find($id);
  return view('Admin.Reply',compact('Customer'));
}

public function Customer_add_reply(Request $request,$id){
  $reply= new Customer_Reply();
  if(auth::id()){

     $reply->Customer_name=auth::user()->name;
     $reply->user_id=auth::user()->id;
     $product=Products::find($id);
     $comment=Customer_comment::find($id);
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