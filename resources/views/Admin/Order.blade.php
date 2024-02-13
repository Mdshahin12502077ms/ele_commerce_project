<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="Admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="Admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="Admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="Admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="Admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="Admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="Admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="Admin/assets/images/favicon.png" />
  </head>
  <body>
  @include('Admin.sidebar')
      <!-- partial -->
      @include('Admin.header')
        <!-- partial -->
        <div class="main-panel">
        <div class="content-wrapper">
        <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                   
                    <h2 style="text-align:center;margin:20px">ORDER INFORMATION</h2>
             
                    <div style=" padding-bottom:30px;color:black;">
                      <form action="{{url('/search')}}" method="get">
                      @csrf
                        <input type="text" name="srch" placeholder="please enter for search...">
                        <input type="submit" value="Search" class="btn btn-outline-primary">
                      </form>
                    </div>


                    <div class="table-responsive" >
                      <table class="table Payment_status table-contextual"style="margin-top:10px;width:80%">
                        <thead style="background-color:green">
                          <tr >
                            <th style="color:white;font-size:14px;">Customer Name</th>
                            <th style="color:white;font-size:14px;">Email</th>
                            <th style="color:white;font-size:14px;"> Address </th>
                            <th style="color:white;font-size:14px;"> Phone Number </th>
                            <th style="color:white;font-size:14px;">Product Title </th>
                            <th style="color:white;font-size:14px;"> Quantity </th>
                            <th style="color:white;font-size:14px;"> Price </th>
                            <th style="color:white;font-size:14px;">Payment Status </th>
                            <th style="color:white;font-size:14px;">Delivary Status </th>
                            
                            <th style="color:white;font-size:14px;">Product Image</th>
                            <th style="color:white;font-size:14px;">Delivered</th>
                            <th style="color:white;font-size:14px;">Cancel Order </th>
                            <th style="color:white;font-size:14px;">Print PDF</th>
                            <th style="color:white;font-size:14px;">Send Email</th>
                          </tr>
                        </thead>
                        <tbody>
                        @forelse($order as $order)
                          <tr class="">
                         
                           <td>{{ $order->Name}}</td>
                           <td>{{$order->Email}}</td>
                           <td>{{$order->Address}}</td>
                           <td>{{$order->Phone}}</td>
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
                          <a href="{{url('/Delivered',$order->id)}}" onclick="return confirm('Are You Sure This Product Is Delivered !!!!')" class="btn btn-primary">Delivered</a>
                             @else
                           <p style="color:magenta">Delivered</p>
                          @endif
                        </td>
                        <td>
                        @if($order->Delivary_status=='Processing')
                        <a onclick="return confirm('Are You Sure To Cancel Order..')"href="{{url('/cancel_order',$order->id)}}" class="btn btn-danger">Cancel Order</a>
                        @else
                           <p style="color:magenta">Canceled Order</p>
                          @endif
                      </td>

                        <td>
                          <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print PDF</a>
                        </td>

                        <td>
                          <a href="{{url('/send_email',$order->id)}}" class="btn btn-info">Send Email</a>
                        </td>
                          </tr>

                          @empty
                          <tr>
                            <td style="text-align:center"colspan="13">
                     
                              Here Is NO Data For Your Search.....
                 
                            </td>
                          </tr>
                 
                          @endforelse
                        </tbody>
                      </table>
                      
                    </div>
                  </div>
                </div>
              </div>
              </div>
              </div>
        <!-- main-panel ends -->
      
    </div>
        <!-- main-panel ends -->
      
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="Admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="Admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="Admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="Admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="Admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="Admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="Admin/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="Admin/assets/js/off-canvas.js"></script>
    <script src="Admin/assets/js/hoverable-collapse.js"></script>
    <script src="Admin/assets/js/misc.js"></script>
    <script src="Admin/assets/js/settings.js"></script>
    <script src="Admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="Admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </body>
</html>