<?php
include_once 'dbconfig.php';

$sql = "SHOW TABLES FROM $datbase";
$result = mysqli_query($dbcon,$sql);
if ($result->num_rows === 0) {
    $sql = 'CREATE TABLE IF NOT EXISTS `users` (
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `first_name` varchar(25) NOT NULL,
    `last_name` varchar(25) NOT NULL,
    `user_city` varchar(50) NOT NULL,
    PRIMARY KEY (`user_id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1' ;
    mysqli_query($dbcon,$sql);
      
    $sql = 'INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `user_city`) VALUES
    (1, "Sreeprakash", "Neelakantan", "Trivandrum")';
    mysqli_query($dbcon,$sql);
} 

if(isset($_GET['delete_id']))
{
	$sql_query="DELETE FROM users WHERE user_id=".$_GET['delete_id'];
	mysqli_query($dbcon,$sql_query);
	header("Location: $_SERVER[PHP_SELF]");
}
// delete condition

if(isset($_GET['btn-save']))
{
    // variables for input data
    $first_name = $_GET['first_name'];
    $last_name = $_GET['last_name'];
    $city_name = $_GET['city_name'];
    // variables for input data
    if(!isset($_GET['first_name'])||empty($_GET['first_name'])){
        ?>
        <script type="text/javascript">
        window.location.href='index.php';
        </script>
        <?php      
    }else{
        // sql query for inserting data into database
        $sql_query = "INSERT INTO users(first_name,last_name,user_city) VALUES('$first_name','$last_name','$city_name')";
        // sql query for inserting data into database
        
        // sql query execution function
        if(mysqli_query($dbcon,$sql_query))
        {
            ?>
            <script type="text/javascript">
            window.location.href='index.php';
            </script>
            <?php
        }

}
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>PHP MySQL Web App</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script type="text/javascript">
function save()
{

        var str="first_name="+jQuery("#first_name").val()
        str+="&last_name="+jQuery("#last_name").val()
        str+="&city_name="+jQuery("#city_name").val()
        window.location.href='index.php?btn-save=y&'+str;

}
function edit(id)
{
        window.location.href='edit.php?btn-edit=y&edit_id='+id;
}
</script>

  </head>
  <body>
    




<div class="col-md-10 col-md-offset-1">
    <h1>PHP MySQL Web App</h1>

        <div class="table-responsive">




              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                
                   <th>First Name</th>
                    <th>Last Name</th>
                     <th>Address</th>

                   </thead>
    <tbody>
  

    <tr>
    <td><input class="form-control" type="text" value="" id="first_name"></td>    
    <td><input class="form-control" type="text" value="" id="last_name"></td>    
    <td><input class="form-control" type="text" value="" id="city_name"></td>
    <td>&nbsp;</td>
    <td><p data-placement="top" data-toggle="tooltip" title="Add"><a href="javascript:save()"><button class="btn btn-danger btn-large" data-title="Add" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span></button></a></p>
    </td>
    </tr>


 
    <?php
    $sql_query="SELECT * FROM users";
    $result_set=mysqli_query($dbcon,$sql_query);
    if(mysqli_num_rows($result_set)>0)
    {
        while($row=mysqli_fetch_row($result_set))
        {
        ?>
            <tr>


    
    <td><?php echo $row[1]; ?></td>
    <td><?php echo $row[2]; ?></td>
    <td><?php echo $row[3]; ?></td>
    <td>
    <p data-placement="top" data-toggle="tooltip" title="Edit"><a href="javascript:edit(<?php echo $row[0]; ?>)"><button class="btn btn-primary btn-large" data-title="Edit" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></button></a></p></td>

    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="index.php?delete_id=<?php echo $row[0]; ?>"><button class="btn btn-danger btn-large" data-title="Delete" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span></button></a></p>
    </td>


            </tr>
        <?php
        }
    }
    else
    {
        ?>
        <tr>
        <td colspan="5">No Data Found !</td>
        </tr>
        <?php
    }
    ?>



    
 
    
   
    
   
    
    </tbody>
        
</table>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
