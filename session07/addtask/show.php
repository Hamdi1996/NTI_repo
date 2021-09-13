<?php 

include "../helper/connection.php";
require "../helper/validator.php";
require "../includes/header.php";

/*****************Get All User From DB *********************/
$sqlquery = "SELECT * FROM `tasks`";
$query    =  mysqli_query($conn,$sqlquery);
?>

 <h1 class="text text-center fs-1"> SHOW TASKS</h1>
<!-- container -->
<div class="container">
    <div class="page-header">
            <h1>Show All tasks </h1> 
        <br>
    </div>
    <!-- PHP code to read records will be here -->
    <table class='table table-hover table-responsive table-bordered'>
        <!-- creating our table heading -->
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Action</th>
        </tr>

         <!-- Fetch All Usera As assoc array and display in table -->
        <?php 
        while($row = mysqli_fetch_assoc($query)){?>
        <tr>
               <td><?php echo $row['id']; ?></td>
               <td><?php echo $row['title']; ?></td>
               <td><?php echo $row['description']; ?></td>
               <td><?php echo $row['sDate']; ?></td>
               <td><?php echo $row['endDate']; ?></td>

            <td>
                <a href='delete.php?id=<?php echo $row['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                <a href='edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>
            </td>

        </tr>
<?php }?>

        <!-- end table -->
    </table>

</div>
<!-- end .container -->

</body>

</html>