<?php
session_start();
if(!isset($_SESSION['admin_id'])){
    header('location:../login');
    die;
}
include '../config/connect.php';
include "layout/header.php";
$select = "SELECT * FROM `users` ";

$query = mysqli_query($connect, $select);
for ($data = []; $row = mysqli_fetch_assoc($query); $data[] = $row);
?>

<!-- [id] => 90
    [first_name] => a
    [last_name] => a
    [role] => admin
    [gender] => Male
    [avatar] => 
    [email] => a@mail.com
    [password] => $1$XncupYmS$C5GH05QMBj8mdWmJ6fx4B.
    [phone] => 20201101
    [created_at] => 2020-11-07 17:16:36 -->
    <div class="container">
        <div class="row">
                <table class="table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>PHONE</th>
                        <th>IMG</th>
                        <th>ROLE</th>
                        <th>TIME</th>
                    </tr>
                <?
                foreach($data as $el):?>
                <tr>
                    <td><?=$el['id']?></td>
                    <td><?=$el['first_name']." ".$el['last_name'] ?></td>
                    <td><?=$el['email']?></td>
                    <td><?=$el['phone']?></td>
                    <td>
                        <img src="../uploads/<?=$el['avatar']?>" alt="" style="width: 120px; heigth: 100px;">
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><?=$el['role']?>
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">ADMIN</a></li>
                                <li><a href="#">USER</a></li>
                            </ul>
                        </div>
                    </td>
                    <td><?=$el['created_at']?></td>
                    <td><a class="btn btn-danger" href="deleteUser.php?id=<?=$el['id']?>">DELETE</a></td>
                </tr>
                <?
                endforeach;
                    

                
                ?>
                </table>
             </div>
            </div>

<?php include "layout/footer.php"; ?>