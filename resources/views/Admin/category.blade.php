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
                   
                    <h4 class="card-title"> Add Category</h4>
                    @if(session()->has('message'))
                     <div class="alert alert-success alert-dismissible">
                  
                    
                      {{session()->get('message')}}
                    <button class="close"type="button" data-dismiss="alert" aria-hidden="true">x</button>
                     </div>
                    @endif
                    <p class="card-description" style="font-size:20px;color:white;padding-top:20px"> Add Category </p>
                    <form class="forms-sample" action="{{url('/add_category')}}" method="POST">
                      @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" style="color:white" id="exampleInputName1" name="category_name"placeholder="Name">
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Add Category</button>
                      
                    </form>
                  
                    <div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead >
                          <tr >
                            <th style="color:white;font-size:20px;">Serial</th>
                            <th style="color:white;font-size:20px;">Category Name </th>
                            <th style="color:white;font-size:20px;"> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                             <!-- message show -->
                             @if(session()->has('delete'))
                     <div class="alert alert-success alert-dismissible">
                      {{session()->get('delete')}}
                    <button class="close"type="button" data-dismiss="alert" aria-hidden="true">x</button>
                     </div>
                    @endif
                          @foreach($data as $data)
                          <tr class="">
                           <td>{{$loop->iteration}}</td>
                           <td>{{$data->category_name}}</td>
                       
                           <td>
                          
                            <a onclick="return confirm('Are You Sure To Delete This Data')"href="{{url('delete_category',$data->id)}}"class="btn btn-danger">Delete</a>
                          
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