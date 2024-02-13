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
        <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                   
                    <h4 class="card-title" style="align:center"> Add Product</h4>
                   @if(session()->has('message'))

                   <div class="alert alert-success alert-dismissible" >
                   {{session()->get('message')}}
                   <button class="close"type="button" data-dismiss="alert" aria-hidden="true" style="margin:right">
                    x</button>

                   </div>

                   @endif
                    <p class="card-description" style="font-size:20px;color:white;padding-top:20px;text-align:center"> Add Product </p>
                    <form class="forms-sample" action="{{url('/Add_Product')}}" method="post" enctype="multipart/form-data">
                      @csrf
                    <div class="form-group">
                        <div>
                        <label for="exampleInputName1"style="margin-top:10px;">Product Title</label>
                        <input type="text" class="form-control" style="color:white" id="exampleInputName1" name="title"placeholder="Enter Product Title"required="">
                        </div>
                        <div>
                        <label for="exampleInputName1"style="margin-top:10px;">Description</label>
                        <input type="text" class="form-control" style="color:white" id="exampleInputName1" name="description"placeholder="Enter Product Description"required="">
                        </div>

                        <div>
                        <label for="exampleInputName1"style="margin-top:10px;">Product Price</label>
                        <input type="number" min="0"class="form-control" style="color:white" id="exampleInputName1" name="product_price"placeholder="Enter Product Price"required="">
                        </div>
                        <div>
                        <label for="exampleInputName1"style="margin-top:10px;">Product Quantity</label>
                        <input type="Number" class="form-control" min="0" style="color:white" id="exampleInputName1" name="product_quantity"placeholder="Enter Product Quantity"required="">
                        </div>
                       
                        <div>
                        <label for="exampleInputName1"style="margin-top:10px;">Discount Price</label>
                        <input type="number"min="0" class="form-control" style="color:white" id="exampleInputName1" name="dis_price"placeholder="Enter Product Discount Price">
                        </div>
                        <div>
                        <label for="exampleInputName1"style="margin-top:10px;">Category</label>
                        <select name="category" id=""class="form-control" style="color:white"required="">
                            <option value="" selected>Add Category Here</option>
                            @foreach($category as $data)
                            <option value="{{$data->category_name}}">{{$data->category_name}}</option>
                            @endforeach
                        </select>
                        </div>
                      
                        <div>
                        <label for="image">Product Image</label>
                        <input type="file" name="img"class="form-control">
                       </div>
                    
                      <button  type="submit" class="btn btn-primary me-2"style="padding:20px 40px 20px 40px;margin:auto;align:center;">Add Product</button>
                    
                    </form>
                

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