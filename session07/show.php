<?php 
require "./helper/connection.php";
require "./includes/header.php";
require './helper/validator.php';


/*****************Get All User From DB *********************/
$sqlquery = "select * from student";
$query    =  mysqli_query($conn,$sqlquery);
?>

 <h1 class="text text-center fs-1"> PHP CRUD Tutorial</h1>
<!-- container -->
<div class="container">
    <div class="page-header">
            <h1>Read Users </h1>   Welcome , <?php echo $_SESSION['user']['name'];?>
        <br>
        <a href="logout.php">LogOut</a>
    </div>
    <!-- PHP code to read records will be here -->
    <table class='table table-hover table-responsive table-bordered'>
        <!-- creating our table heading -->
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

         <!-- Fetch All Usera As assoc array and display in table -->
        <?php 
        while($row = mysqli_fetch_assoc($query)){?>
        <tr>
               <td><?php echo $row['id']; ?></td>
               <td><?php echo $row['name']; ?></td>
               <td><?php echo $row['email']; ?></td>

            <td>
                <a href='delete.php?id=<?php echo $row['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                <a href='edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>
                <a href='addtask.php' class='btn btn-info m-r-1em'>Add Task</a>
            </td>

        </tr>
<?php }?>

        <!-- end table -->
    </table>

</div>
<!-- end .container -->

</body>

</html>