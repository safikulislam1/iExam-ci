       <?php include('header.php') ?>
       <?php include('side.php') ?>
       <?php include('bottom_header.php') ?>
       <div class="crad">
           <div class="card-header">
               <h4>Step 1</h4>
           </div>
       </div>
       <div class="container mt-2">
           <?php if ($this->session->flashdata('success')) { ?>
               <div class="alert alert-success text-center"><?= $this->session->flashdata('success') ?></div>
           <?php } ?>
           <?php if ($this->session->flashdata('error')) { ?>
               <div class="alert alert-danger text-center"><?= $this->session->flashdata('error') ?></div>
           <?php } ?>
           <div class="card">
               <div class="card-header text-center">
                   <b>Basic information</b>
               </div>
               <div class="card-body">
                   <p class="alert alert-success d-none" id="success"></p>
                   <?= form_open('dashboard/step1_action') ?>
                   <div class="form-row">
                       <div class="form-group col-md-6">
                           <label for="inputfirst">First Name</label>
                           <input type="text" class="form-control" name="fname" value="<?= set_value('fname'); ?>" placeholder="First Name">
                           <span class="text text-danger"><?= form_error('fname') ?></span>
                       </div>
                       <div class="form-group col-md-6">
                           <label for="inputlast">Last Name</label>
                           <input type="text" class="form-control" name="lname" value="<?= set_value('lname'); ?>" placeholder="Last Name">
                           <span class="text text-danger"><?= form_error('lname') ?></span>
                       </div>
                       <div class="form-group col-md-6">
                           <label for="inputfather">Father Name</label>
                           <input type="text" class="form-control" name="father" value="<?= set_value('father'); ?>" placeholder="Father Name">
                           <span class="text text-danger"><?= form_error('father') ?></span>
                       </div>
                       <div class="form-group col-md-6">
                           <label for="inputmother">Mother Name</label>
                           <input type="text" class="form-control" name="mother" value="<?= set_value('mother'); ?>" placeholder="Mother Name">
                           <span class="text text-danger"><?= form_error('mother') ?></span>
                       </div>
                   </div>
                   <div class="form-row">
                       <div class="form-group col-md-6">
                           <label for="inputsex">Sex</label><br>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" name="sex" value="male">
                               <label class="form-check-label">Male</label>
                           </div>
                           <div class="form-check form-check-inline">
                               <input class="form-check-input" type="radio" name="sex" value="female">
                               <label class="form-check-label">Female</label>
                           </div><br>
                           <span class="text text-danger"><?= form_error('sex') ?></span>
                       </div>
                       <div class="form-group col-md-6">
                           <label for="inputState">Birth Date</label>
                           <input type="text" class="form-control" id="datepicker" name="date" value="">
                           <span class="text text-danger"><?= form_error('date') ?></span>
                       </div>
                   </div>
                   <div class="form-group">
                       <label for="inputAddress">Address</label>
                       <input type="text" class="form-control" name="address" value="<?= set_value('address'); ?>" placeholder="address">
                       <span class="text text-danger"><?= form_error('address') ?></span>
                   </div>
                   <div class="form-row">
                       <div class="form-group col-md-6">
                           <label for="inputCity">City</label>
                           <input type="text" class="form-control" value="<?= set_value('city'); ?>" name="city" placeholder="City">
                           <span class="text text-danger"><?= form_error('city') ?></span>
                       </div>
                       <div class="form-group col-md-3">
                           <label for="inputState">State</label>
                           <input type="text" class="form-control" name="state" value="<?= set_value('state'); ?>" placeholder="State name">
                           <span class="text text-danger"><?= form_error('state') ?></span>
                       </div>
                       <div class="form-group col-md-3">
                           <label for="inputZip">Zip</label>
                           <input type="text" class="form-control" name="code" value="<?= set_value('code'); ?>">
                           <span class="text text-danger"><?= form_error('code') ?></span>
                       </div>
                   </div>
                   <div class="form-group">
                       <div class="form-check">
                           <input class="form-check-input" type="checkbox" name="check">
                           <label class="form-check-label">
                               Check me
                           </label>
                       </div>
                       <span class="text text-danger"><?= form_error('check') ?></span>
                   </div>
                   <div class="col-md-4 offset-md-4 text-center">

                       <button type="submit" class="btn btn-primary">Submit</button>
                   </div>
                   </form>
               </div>
           </div>
       </div>
       <?php include('footer.php') ?>