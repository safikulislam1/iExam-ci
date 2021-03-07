       <?php include('header.php') ?>
       <?php include('side.php') ?>
       <?php include('bottom_header.php') ?>
       <div class="crad">
           <div class="card-header">
               <h4>Step 2</h4>
           </div>
       </div>
       <div class="container mt-5">
           <div class="alert alert-success text-center f-success d-none">hlleo</div>
           <div class="alert alert-danger text-center f-error d-none">hlleo</div>
           <?php if ($status == 1) : ?>

               <div class="card">
                   <div class="card-header text-center"><b>Photo & Signature Upload</b></div>
                   <div class="card-body">
                       <p><b>Some Condition in photo & signature uploading process</b></p>
                       <ol class="ml-5 text-danger">
                           <li>Size maximum 2 md.</li>
                           <li>File type is jpg,jpeg,png.</li>
                           <li>Size 200px*200px.</li>
                       </ol>
                       <br><br>
                       <p class="alert alert-success d-none" id="success"></p>
                       <?php echo form_open_multipart('upload/do_upload', array('id' => 'photo_upload')); ?>

                       <!-- <form action="" id="photo_uplaod"> -->
                       <div class="form-row">

                           <div class="form-group col-md-4">
                               <label for="exampleFormControlFile1">Photo</label><br>
                               <input type="file" id="photo" name="photo">
                           </div>
                           <!-- <div class="form-group col-md-4 mt-4">
                               <input type="submit" class="btn btn-primary" value="Upload">
                              
                           </div> -->
                       </div>
                       </form>
                       <div class="form-group col-md-3">
                           <div class="show_photo">

                           </div>
                       </div>
                       <?php echo form_open_multipart('upload/do_upload', array('id' => 'signature_uplaod')); ?>
                       <div class="form-row">
                           <div class="form-group col-md-4">
                               <label for="exampleFormControlFile2">Signature</label>
                               <input type="file" id="signature" name="signature">
                           </div>
                           <!-- <div class="form-group col-md-4 mt-4">
                               <input type="submit" class="btn btn-primary" value="Upload">
                              
                           </div> -->
                       </div>
                       </form>
                       <div class="form-group col-md-3">
                           <div class="show_singnature">

                           </div>
                       </div>
                   </div>
                   <div class="card-footer">
                       <center><button class="btn btn-primary" id="upload_file">Upload</button></center>
                   </div>
               </div>
           <?php else : ?>
               <br><br><br><br>
               <div class="row">
                   <div class="col-lg-4 offset-lg-4">
                       <div class="card">
                           <div class="card-header text-center"><b>Lock Section</b> <i class="fa fa-lock" aria-hidden="true"></i> </div>
                           <div class="card-body">
                               <p class="text-danger">Please before complete first step then can access this section</p>
                           </div>
                       </div>

                   </div>
               </div>



           <?php endif ?>
       </div>
       <?php include('footer.php') ?>

       <script>
           $(function() {
               $('#photo_upload').on('change', function(event) {

                   $.ajax({
                       url: "<?php echo base_url('index.php/dashboard/photo_upload') ?>",
                       method: "POST",
                       data: new FormData(this),
                       contentType: false,
                       processData: false,
                       success: function(data) {
                           $('.show_photo').html(data);
                       }
                   });

               });


               $('#signature_uplaod').on('change', function(event) {
                   event.preventDefault();

                   $.ajax({
                       url: "<?php echo base_url('index.php/dashboard/sign_upload') ?>",
                       method: "POST",
                       data: new FormData(this),
                       contentType: false,
                       processData: false,
                       success: function(data) {
                           $('.show_singnature').html(data);
                       }
                   });


               });

               $('#upload_file').on('click', function(event) {
                   event.preventDefault();

                   var photo = $('#photo').val();
                   var signature = $('#signature').val();

                   if (photo == '') {
                       alert('Please select Photo');
                   } else if (signature == '') {
                       alert('Please select signature');
                   } else {
                       $.ajax({
                           url: "<?php echo base_url('index.php/dashboard/upload_data') ?>",
                           success: function(data) {
                               if (data == 1) {
                                   $('.f-success').removeClass('d-none').text('Photo & Signature Upload Successfully');
                               } else {
                                   $('.f-error').removeClass('d-none').text('Please try again');
                               }
                               setTimeout(() => {
                                   location.reload();
                               }, 5000);
                           }
                       });
                   }

               });

           });
       </script>