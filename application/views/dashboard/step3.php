       <?php include_once './stripe/config.php'; ?>
       <?php include('header.php') ?>
       <?php include('side.php') ?>
       <?php include('bottom_header.php') ?>

       <div class="crad">
           <div class="card-header">
               <h4>Step 3</h4>
           </div>
       </div>
       <div class="container mt-5">

           <?php if ($this->session->flashdata('success')) { ?>
               <div class="alert alert-success text-center"><?= $this->session->flashdata('success') ?></div>
           <?php } ?>
           <?php if ($this->session->flashdata('error')) { ?>
               <div class="alert alert-danger text-center"><?= $this->session->flashdata('error') ?></div>
           <?php } ?>
           <?php if ($status == 1) : ?>
               <div class="card">
                   <div class="card-header text-center"><b>Payment Section</b></div>
                   <div class="card-body">
                       <p>You are stand final state you pay payment and complete your application.</p>
                       <p><b>Application fee Rs.500</b></p>
                       <div class="row">
                           <div class="col-md-4 offset-md-4 text-center mt-5">
                               <?= form_open('dashboard/payment') ?>
                               <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo $Publishablekey ?>" data-amount="50000"  data-name="iExam" data-description="iExam application fee" data-image="" data-currency="inr"></script>
                               </form>
                               <!-- <a href="#" class="btn btn-info">Pay</a> -->
                           </div>
                       </div>
                   </div>
               </div>
           <?php else : ?>

               <br><br><br><br>
               <div class="row">
                   <div class="col-lg-4 offset-lg-4">
                       <div class="card">
                           <div class="card-header text-center"><b>Lock Section</b> <i class="fa fa-lock" aria-hidden="true"></i> </div>
                           <div class="card-body">
                               <p class="text-danger">Please before complete First & Second step then can access this section</p>
                           </div>
                       </div>

                   </div>
               </div>

           <?php endif ?>
       </div>
       <?php include('footer.php') ?>