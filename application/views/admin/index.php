   <?php include('header.php') ?>
   <?php include('side.php') ?>
   <?php include('bottom_header.php') ?>

   <div class="card">
       <div class="card-header text-center">
           <h4>Admin Dashboard</h4>
       </div>
   </div>

   <div class="container mt-5">
       <?php if ($row) : ?>
           <table class="table">
               <thead>
                   <tr>
                       <th scope="col">User Id</th>
                       <th scope="col">Name</th>
                       <th scope="col">Email</th>
                       <th scope="col">Action</th>
                   </tr>
               </thead>
               <tbody>
                   <?php foreach ($row as $value) : ?>
                       <tr>
                           <th scope="row"><?= $value['u_id'] ?></th>
                           <td><?= $value['name'] ?></td>
                           <td><?= $value['email'] ?></td>
                           <td>

                               <a href="#" onclick="return popitup('<?= base_url('index.php/dashboard/print/' . $value['u_id']) ?>')" class="btn btn-sm btn-info">Print</a>
                           </td>
                       </tr>
                   <?php endforeach ?>
               </tbody>
           </table>
       <?php else : ?>
           <table class="table">
               <thead>
                   <tr>
                       <th scope="col">User Id</th>
                       <th scope="col">Name</th>
                       <th scope="col">Email</th>
                       <th scope="col">Action</th>
                   </tr>
               </thead>
               <tbody>
                   <tr>
                    <td colspan="4" class="text-center text-danger">NO Record Found</td>
                   </tr>
               </tbody>
           </table>
       <?php endif ?>
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