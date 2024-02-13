<section class="subscribe_section">
         <div class="container-fuild">
            <div class="box">
               <div class="row">
                  <div class="col-md-6 offset-md-3">
                     <div class="subscribe_form ">
                        <div class="heading_container heading_center">
                           <h3>Subscribe To Get Discount Offers</h3>
                        </div>
                        <p>subscribe our website to move with us</p>
                        <form action="{{url('/subscribe')}}" method="POST">
                           @csrf
                           <input type="email" name="subscribe_mail" placeholder="Enter your email">
                           <button type="submit" class="btn btn-warning">subscribe</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>