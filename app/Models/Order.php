<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;
//use App\Notifications\SendEmailNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Order extends Model 
{
    
    use HasFactory;
    use Notifiable;
    protected $fillable=[
        'Name',
        'Email',
        'Phone',
        'Address',
        'Product_Title',
        'Product_Qantity',
        'Price',
        'Image',
        'Product_Id',
        'User_Id',
        'Payment_Status',
        'Delivary_Status'
    ];

}
