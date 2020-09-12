<?php 

session_start();
$conn = mysqli_connect('localhost','root','','project');
$show_feedback = mysqli_query($conn, "CALL display_fb");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css" />
  <link rel="stylesheet" href="css/style.css">
    <title>admin-dashboard</title>
</head>
<body>
    hi
    <h1>Admin Dashboard</h1>
    <form method="POST" action="channge-server.php">
                <center>
                    <p>Add a service</p><input type="text" class="add-form" placeholder="comment:" name="service_name" id="comment"></center><br>
                  <center>
                    <p>Add service desription</p><input type="text" class="add-form" placeholder="comment:" name="service_desc" id="comment"></center><br>
                    <center>
                    <p>Add a product</p> <input type="text" class="add-form" placeholder="comment:" name="product_name" id="comment"></center><br>
                
                    <center>
                    <p>Add product description</p> <input type="text" class="add-form" placeholder="comment:" name="product_desc" id="comment"></center><br>
             
          
                <div>
                    <p style="line-height: 70px; text-align: center;"><button type="submit" class="btn btn-primary mb-2">Submit</button>
                </div>
            </form>

  
            <table>
        <th>Service ID</th>
        <th>Service name </th>
        <th>Service description </th>
        <th>Product ID</th>
        <th>Product name </th>
        <th>Product description</th>
        <?php while($row = mysqli_fetch_array($show_feedback))
    {
    ?>
        <tr>
            <td>
                <?php echo $row["service_id"]; ?>
            </td>
            <td>
                <?php echo $row["service_name"]; ?>
            </td>
            <td>
                <?php echo $row["service_desc"]; ?>
            </td>
            <td>
                <?php echo $row["product_id"]; ?>
            </td>
            <td>
                <?php echo $row["product_name"]; ?>
            </td>
            <td>
                <?php echo $row["product_desc"]; ?>
            </td>
           
        </tr>
       <?php
    }
            ?>
    </table></body>
</html>