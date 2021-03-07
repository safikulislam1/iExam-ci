   <div class="wrapper">
       <header>
           <div class="container-fluid">
               <div class="row">
                   <div class="col-lg-6 left">
                       <b>Welcome : <span class="text-white"><?php if (isset($user_name)) {
                                                                    echo $user_name;
                                                                } ?></span></b>
                   </div>
                   <div class="col-lg-6 right">
                       <a href="#" class="show-hide"><span><i class="fa fa-user" aria-hidden="true"></i></span></a>
                   </div>
                   <div class="user-info">
                       <ul>
                           <li><a href="<?php echo base_url('index.php/admin/logout') ?>">Logout</a></li>
                       </ul>
                   </div>
               </div>
           </div>
       </header>