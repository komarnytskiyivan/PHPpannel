<?php require "./includes/config.php"; ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Panel</title>
      <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link href="./includes/style.css" rel="stylesheet">
   </head>
   <body>
      <?php include "./includes/modal.php" ?>
      <hr>
      <div class="container bootstrap snippets bootdey">
         <div class="row">
            <div class="col-lg-12">
               <div class="main-box no-header clearfix">
                  <div class="main-box-body clearfix">
                     <button type="button" class="btn btn-primary btn-add-item" data-toggle="modal" data-target="#ModalAdd">Add</button>
                     <select class="btn btn-primary select-action">
                        <option>Please select</option>
                        <option>Set active</option>
                        <option>Set not active</option>
                        <option>Delete</option>
                     </select>
                     <button type="button" data-toggle="modal" data-target="#ModalConfirm" class="btn btn-primary btn-ok">OK</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="container bootstrap snippets bootdey">
         <div class="row">
            <div class="col-lg-12">
               <div class="main-box no-header clearfix">
                  <div class="main-box-body clearfix">
                     <div class="table-responsive ">
                        <table class="table user-list">
                           <thead>
                              <tr>
                                 <th class="text-center"> <input type="checkbox" id="scales" name="scales" /></i></span></th>
                                 <th class="text-center"><span>Name</span></th>
                                 <th class="text-center"><span>Status</span></th>
                                 <th class="text-center"><span>Role</span></th>
                                 <th class="text-center"><span>Options</span></th>
                              </tr>
                           </thead>
                           <tbody class="table-content">
                              <?php 
                                 $users = mysqli_query($connection,"SELECT * FROM `users` ORDER BY `id` ");
                                 ?>
                              <?php
                                 while($user = mysqli_fetch_assoc($users)){
                                 ?>
                              <tr>
                                 <td class="text-center">
                                    <input type="checkbox" id="<?php echo $user['id']?>" name="scales" class="checkout" />
                                 </td>
                                 <td>
                                    <p><?php echo $user['name']; ?></p> 
                                    <p><?php echo $user['lastname']; ?></p>
                                 </td>
                                 <td class="text-center">
                                    <span class="fa-stack">
                                    <i class="fa fa-circle <?php if($user['status'] == 'on') echo "green"; else echo "gray"; ?>"></i>
                                    </span>
                                 </td>
                                 <td class="text-center">
                                    <a href="#"><?php echo $user['role']; ?></a>
                                 </td>
                                 <td class="text-center" style="width: 20%;">
                                    <a id="<?php echo $user['id'] ?>" data-toggle="modal" data-target="#ModalAdd" class="table-link text-info edit-item">
                                    <span class="fa-stack">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i id="<?php echo $user['id'] ?>" class="fa fa-pencil fa-stack-1x fa-inverse btn-Edit-Submit"></i>
                                    </span>
                                    </a>
                                    <a data-toggle="modal" data-target="#ModalConfirm" class="table-link danger delete-item">
                                    <span class="fa-stack">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i id="<?php echo $user['id'] ?>" class="fa fa-trash-o fa-stack-1x fa-inverse del btn-Delete-Submit"></i>
                                    </span>
                                    </a>
                                 </td>
                              </tr>
                              <?php
                                 }
                              ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="container bootstrap snippets bootdey">
         <div class="row">
            <div class="col-lg-12">
               <div class="main-box no-header clearfix">
                  <div class="main-box-body clearfix">
                     <button type="button" class="btn btn-primary btn-add-item" data-toggle="modal" data-target="#ModalAdd">Add</button>
                     <select class="btn btn-primary select-action">
                        <option>Please select</option>
                        <option>Set active</option>
                        <option>Set not active</option>
                        <option>Delete</option>
                     </select>
                     <button type="button" data-toggle="modal" data-target="#ModalConfirm" class="btn btn-primary btn-ok">OK</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script src="./includes/main.js" type="text/javascript"></script>
   </body>
</html>