<?php
if (isset($_GET['delete']))
{
    mysqli_query($connection, "DELETE FROM `users` WHERE `id` =" . $_GET['delete']);
}
if (isset($_GET['deleteMany']))
{
    $id = explode(",", $_GET['deleteMany']);
    for ($i = 0;$i < count($id) - 1;$i++)
    {
        mysqli_query($connection, "DELETE FROM `users` WHERE `id` =" . $id[$i]);
    }
}
if (isset($_GET['setActive']))
{
    $id = explode(",", $_GET['setActive']);
    for ($i = 0;$i < count($id) - 1;$i++)
    {
        mysqli_query($connection, "UPDATE `users` SET `status` = 'on' WHERE `id` =" . $id[$i]);
    }
}
if (isset($_GET['setNotActive']))
{
    $id = explode(",", $_GET['setNotActive']);
    for ($i = 0;$i < count($id) - 1;$i++)
    {
        mysqli_query($connection, "UPDATE `users` SET `status` = '' WHERE `id` =" . $id[$i]);
    }
}
if (isset($_POST['edit_post']))
{
    mysqli_query($connection, "UPDATE `users` SET `name` = '" . $_POST['name'] . "', `lastname` = '" . $_POST['lastname'] . "', `status` = '" . $_POST['status'] . "', `role` = '" . $_POST['role'] . "' WHERE `id` =  " . $_POST['id']) or die(mysqli_error($connection));
}
if (isset($_POST['add_post']))
{
    mysqli_query($connection, "INSERT INTO `users`  (`name`, `lastname`, `status`, `role`) VALUES ('" . $_POST['name'] . "', '" . $_POST['lastname'] . "', '" . $_POST['status'] . "', '" . $_POST['role'] . "')") or die(mysqli_error($connection));
}
?>