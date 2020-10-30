<?php require "./includes/config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    if (isset($_GET['delete'])) {
        mysqli_query($connection,"DELETE FROM `users` WHERE `id` =".$_GET['delete']);
    }
    var_dump($_POST);
    mysqli_query($connection,"UPDATE `users` SET `name` = ".$_POST['name'].", `lastname` = ".$_POST['lastname'].", `status` = ".$_POST['status'].", `role` = ".$_POST['role']." WHERE `id` = 10");

    ?>
    <meta charset="utf-8">
    <title>Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
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
                    <div class="table-responsive">
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
                            <tbody>
                            <?php 
                            $users = mysqli_query($connection,"SELECT * FROM `users` ORDER BY `id` ");
                            ?>
                            <?php
                            while($user = mysqli_fetch_assoc($users)){
                            ?>
                                <tr>
                                    <td class="text-center">
                                        <input type="checkbox" id="scales" name="scales" checked />
                                    </td>
                                    <td>
                                        <a href="#" class="user-link"><?php echo $user['name']; ?> <?php echo $user['lastname']; ?></a>
                                    </td>
                                    <td class="text-center">
                                        <span class="fa-stack">
                                            <i class="fa fa-circle <?php if($user['status'] = 0) echo "gray"; else echo "green"; ?>"></i>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="#"><?php echo $user['role']; ?></a>
                                    </td>
                                    <td class="text-center" style="width: 20%;">
                                        <a id="<?php echo $user['id'] ?>" data-toggle="modal" data-target="#exampleModalCenter" class="table-link text-info edit-item">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </a>
                                        <a id="<?php echo $user['id'] ?>" data-toggle="modal" data-target="#exampleModalCenter" class="table-link danger delete-item">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse del"></i>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="./includes/main.js" type="text/javascript">
</body>
</html>