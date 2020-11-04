<?php
include "./config.php";
if (isset($_GET['delete']))
{
    mysqli_query($connection, "DELETE FROM `users` WHERE `id` =" . $_GET['delete']);
    unset($_GET['delete']);
}
if (isset($_GET['deleteMany']))
{
    $id = explode(",", $_GET['deleteMany']);
    for ($i = 0;$i < count($id) - 1;$i++)
    {
        mysqli_query($connection, "DELETE FROM `users` WHERE `id` =" . $id[$i]);
    }
    unset($_GET['deleteMany']);
}
if (isset($_GET['setActive']))
{
    $id = explode(",", $_GET['setActive']);
    for ($i = 0;$i < count($id) - 1;$i++)
    {
        mysqli_query($connection, "UPDATE `users` SET `status` = 'on' WHERE `id` =" . $id[$i]);
    }
    unset($_GET['setActive']);
}
if (isset($_GET['setNotActive']))
{
    $id = explode(",", $_GET['setNotActive']);
    for ($i = 0;$i < count($id) - 1;$i++)
    {
        mysqli_query($connection, "UPDATE `users` SET `status` = '' WHERE `id` =" . $id[$i]);
    }
    unset($_GET['setNotActive']);
}
if (isset($_POST['editsolo']))
{
    mysqli_query($connection, "UPDATE `users` SET `name` = '" . $_POST['name'] . "', `lastname` = '" . $_POST['lastname'] . "', `status` = '" . $_POST['status'] . "', `role` = '" . $_POST['role'] . "' WHERE `id` =  " . $_POST['id']) or die(mysqli_error($connection));
    unset($_POST['editsolo']);
}
if (isset($_POST['addsolo']))
{
    mysqli_query($connection, "INSERT INTO `users`  (`name`, `lastname`, `status`, `role`) VALUES ('" . $_POST['name'] . "', '" . $_POST['lastname'] . "', '" . $_POST['status'] . "', '" . $_POST['role'] . "')") or die(mysqli_error($connection));
    unset($_POST['addsolo']);
}
?>
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
      <a href="#" class="user-link"><?php echo $user['name']; ?> <?php echo $user['lastname']; ?></a>
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
      <a data-toggle="modal" data-target="#ModalAdd" class="table-link text-info edit-item">
      <span class="fa-stack">
      <i class="fa fa-square fa-stack-2x"></i>
      <i id="<?php echo $user['id'] ?>" class="fa fa-pencil fa-stack-1x fa-inverse btn-Edit-Submit"></i>
      </span>
      </a>
      <a data-toggle="modal" data-target="#ModalConfirm" class="table-link danger delete-item ">
      <span class="fa-stack ">
      <i class="fa fa-square fa-stack-2x "></i>
      <i id="<?php echo $user['id'] ?>" class="fa fa-trash-o fa-stack-1x fa-inverse del btn-Delete-Submit"></i>
      </span>
      </a>
   </td>
</tr>
<?php