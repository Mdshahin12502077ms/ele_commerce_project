<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="text-align:center">
    <h1>Order Details</h1>
    <h1>..........................................</h1>
    <h1>Customer Name:           {{    $order->Name}}</h1>
    <h1>Customer Email:          {{    $order->Email}}</h1>
    <h1>Customer Address:        {{     $order->Address}}</h1>
    <h1>Customer Phone No:       {{     $order->Phone}}</h1>
    <h1>Customer Id:             {{     $order->User_Id}}</h1>

    <h1>Product Name:             {{     $order->Product_Title}}</h1>
    <h1>Product Price:             {{     $order->Price}}</h1>
    <h1>Product Quantity:             {{    $order->Product_Qantity}}</h1>
    <h1>Payment Status:             {{      $order->Payment_status}}</h1>
    <h1>Product Id:             {{         $order->Product_Id}}</h1>
    <h1>....................................................</h1>
    <br>
    <img src='{{"storage/".$order->Image}}' alt=""style="height:100px;width:50px;border-radius:0px;">
    </div>
</body>
</html>