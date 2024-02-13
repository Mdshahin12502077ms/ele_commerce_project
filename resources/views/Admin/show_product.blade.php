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
                    @if(session()->has('dl_message'))
                    <div class="alert alert-success alert-dismissible">
                      {{session()->get('dl_message')}}
                    <button class="close"type="button" data-dismiss="alert" aria-hidden="true">x</button>
                     </div>
                    @endif

                  
                    <h2 style="text-align:center;margin:20px">PRODUCT INFORMATION</h2>
                    <div class="table-responsive" >
                      <table class="table table-bordered table-contextual"style="margin-top:10px">
                        <thead >
                          <tr >
                            <th style="color:white;font-size:14px;">Serial</th>
                            <th style="color:white;font-size:14px;">Product Title </th>
                            <th style="color:white;font-size:14px;"> Description </th>
                            <th style="color:white;font-size:14px;"> Quantity </th>
                            <th style="color:white;font-size:14px;">Product Category</th>
                            <th style="color:white;font-size:14px;"> Price </th>
                            <th style="color:white;font-size:14px;">Discount Price </th>
                            <th style="color:white;font-size:14px;">Product Image</th>
                          <th style="color:white;font-size:14px;">Delete </th>
                            <th style="color:white;font-size:14px;">Edit</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($product as $product)
                          <tr class="">
                         
                           <td>{{$loop->iteration}}</td>
                           <td>{{$product->Title}}</td>
                           <td>{{$product->Description}}</td>
                           <td>{{$product->Quantity}}</td>
                           <td>{{$product->Category}}</td>
                           <td>{{$product->Price}}</td>
                           <td>{{$product->Dis_Price}}</td>
                           <td>
                            <img src='{{"storage/".$product->Img}}' alt="" style="height:100px;width:50px;border-radius:0px;">
                           </td>
                          <td>
                            
                            <a onclick="return confirm('Are You Sure To Delete This Data')" href="{{url('delete_product',$product->id)}}"class="btn btn-danger">Delete</a>
                          </td>
                          <td>
                              <a href="{{url('Edit_product',$product->id)}}" class="btn btn-success">Edit</a>
                          </td>
                          </tr>
                          @endforeach
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