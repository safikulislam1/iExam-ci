   <?php include('header.php') ?>
   <?php include('side.php') ?>
   <?php include('bottom_header.php') ?>


   <div class="container">
       <h2 class="text-center m-5">iExam <span class="text-black text-uppercase">Application Form</span></h2>
       <h5>You complete this application in three steps:</h5>
       <ul>
           <li>Step 1 : Basic information</li>
           <li>Step 2 : Photo & Signature Upload</li>
           <li>Step 3 : Payment Method</li>

       </ul>
       <br><br><br>
       <?php if ($row) : ?>
           <table class="table">
               <thead>
                   <tr>
                       <th scope="col">#</th>
                       <th scope="col">Name</th>
                       <th scope="col">Email</th>
                       <th scope="col">Action</th>
                   </tr>
               </thead>
               <tbody>
                   <?php foreach ($row as $value) : ?>
                       <tr>
                           <th scope="row">1</th>
                           <td><?= $value['name'] ?></td>
                           <td><?= $value['email'] ?></td>
                           <td>
                               <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">View</a>
                               <a href="#" onclick="return popitup('<?= base_url('index.php/dashboard/print/'. $value['u_id']) ?>')" class="btn btn-sm btn-info">Print</a>
                           </td>
                       </tr>
                   <?php endforeach ?>
               </tbody>
           </table>
       <?php endif ?>
   </div>
   <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <div class="row">
                       <div class="col-lg-4 offset-lg-4 text-center">
                           <img src="<?php echo $value['photo']; ?>" alt="" width="100" height="100"><br><br>
                           <img src="<?php echo $value['signature']; ?>" alt="" width="100" height="30">
                       </div>
                   </div><br>
                   <div class="row">
                       <div class="col-lg-12">
                           <p class="text-center">Basic Details</p>
                           <table class="table table-bordered">
                               <thead>
                                   <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">Name</th>
                                       <th scope="col">Father</th>
                                       <th scope="col">Mother</th>
                                       <th scope="col">Sex</th>
                                       <th scope="col">Address</th>
                                       <th scope="col">Birth Date</th>
                                       <th scope="col">City</th>
                                       <th scope="col">State</th>
                                       <th scope="col">Zip</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <tr>
                                       <th scope="row">1</th>
                                       <td><?= $value['fname']; ?> <?= $value['lname']; ?> </td>
                                       <td><?= $value['father']; ?></td>
                                       <td><?= $value['mother']; ?></td>
                                       <td><?= $value['sex']; ?></td>
                                       <td><?= $value['address']; ?></td>
                                       <td><?= $value['date']; ?></td>
                                       <td><?= $value['city']; ?></td>
                                       <td><?= $value['state']; ?></td>
                                       <td><?= $value['zip']; ?></td>
                                   </tr>
                               </tbody>
                           </table>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-lg-6 offset-lg-3">
                           <p class="text-center">Payment Details</p>
                           <table class="table table-bordered">

                               <tr>
                                   <th>Amount</th>
                                   <td><?php echo $value['str_amount']; ?></td>
                               </tr>
                               <tr>
                                   <th>Transation</th>
                                   <td><?php echo $value['str_trn']; ?></td>
                               </tr>
                               <tr>
                                   <th>Status</th>
                                   <td>Complate</td>
                               </tr>

                           </table>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <?php include('footer.php') ?>
   <script language="javascript" type="text/javascript">
       function popitup(url) {
           newwindow = window.open(url, 'name', 'height=600,width=500');
           if (window.focus) {
               newwindow.focus()
           }
           return false;
       }
   </script>