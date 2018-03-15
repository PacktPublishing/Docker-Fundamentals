<?php

include_once 'dbconfig.php';


if(isset($_GET['btn-edit']))
{
    $sql_query=
    "SELECT * FROM users WHERE user_id=".$_GET['edit_id'];
    $result_set=mysqli_query($dbcon,$sql_query);
    if(mysqli_num_rows($result_set)>0)
    {
        $row=mysqli_fetch_row($result_set);
    }else{

    }
}
if(isset($_GET['btn-save']))
{
    $first_name = $_GET['first_name'];
    $last_name = $_GET['last_name'];
    $city_name = $_GET['city_name'];
    $user_id = $_GET['user_id'];
    $sql_query = "UPDATE users 
    SET first_name='$first_name',
        last_name='$last_name',
        user_city='$city_name' 
        WHERE user_id=".$user_id
    ;
    // echo $sql_query;exit;
    mysqli_query($dbcon,$sql_query);
    header("Location: index.php");
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
function edit(id)
{

        var str="first_name="+jQuery("#first_name").val()
        str+="&last_name="+jQuery("#last_name").val()
        str+="&city_name="+jQuery("#city_name").val()
        str+="&user_id="+id
        window.location.href='edit.php?btn-save=y&'+str;

}
</script>

  </head>
  <body>
    




<div class="col-md-10 col-md-offset-1">
    <h1>PHP MySQL Web App [EDIT]</h1>

        <div class="table-responsive">
              <table id="mytable" class="table table-bordred table-striped">
                   <thead>
                   <th>First Name</th>
                    <th>Last Name</th>
                     <th>Address</th>
                   </thead>
    <tbody>
    <tr>
    <td><input class="form-control" type="text" value="<?php echo $row[1]; ?>" id="first_name"></td>    
    <td><input class="form-control" type="text" value="<?php echo $row[2]; ?>" id="last_name"></td>    
    <td><input class="form-control" type="text" value="<?php echo $row[3]; ?>" id="city_name"></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Save"><a href="javascript:edit(<?php echo $row[0]; ?>)"><button class="btn btn-danger btn-large" data-title="Save" data-toggle="modal"><span class="glyphicon glyphicon-ok"></span></button></a></p>
    </td>    
    <td><p data-placement="top" data-toggle="tooltip" title="Cancel"><a href="index.php"><button class="btn btn-danger btn-large" data-title="Cancel" data-toggle="modal"><span class="glyphicon glyphicon-remove"></span></button></a></p>
    </td>
    </tr>
    </tbody>
</table>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
