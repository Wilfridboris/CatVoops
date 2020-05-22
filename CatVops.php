<?php
session_start();
$id=$_SESSION['id'];
$name=$_SESSION['name'];

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/custom.css"> 
    <title>CatVops</title>
</head>
<body>
   
    <?php
    require('./views/head.php');
   
    

    ?>
    
    <div class="contain">
    
        <div class="jumbotron">  
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4"></div>
                <div class="col-sm-2">
                </div>
                <div class="col-sm-2">
                <a  id="logo" href=""><img class="logo" src="./img/user.jpg" alt="logo" style="width:20px;"></a>
                    <?php
                    print "<label> $id-</label>";
                    print "<label>  $name </label>";

                    ?>
                    <p><a id="update" href="">update profil</a></p>
                    <p><a  id="level" href="">level:  <span class="badge badge-dark"> 0</span></a></p>
                     <form id="form3" autocomplete="off" action="">
                       <p>
                           <label >User</label>
                           <input type="text"
                           placeholder="new username"
                           name="newuser">
                           
                       </p>
                       <p>
                           <label >pass</label>
                           <input type="password"
                           placeholder="new pass"
                           name="newpass">
                           
                       </p>
                       <button id="ok" type="submit" class="btn btn-danger">ok</button>
                    </form>

                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-4">
                <h1>top courses</h1>
                <div class="list-group">
                    <a class="list-group-item list-group-item-action list-group-item-primary" href="./courses/python/chap1.php">Python</a>
                    <a class="list-group-item list-group-item-action list-group-item-primary" href="./courses/cloud/chap1.php">cloud</a>
                    
                </div>
            </div>
            <div class="col-sm-8">
                
                <h1>recent</h1>
                <div class="contient">
                    <div class="container">
                        

                    </div>

                </div>
            </div>
        </div>
    </div>
<script src="./js/jquery.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/custom.js"></script> 
 
</body>
</html>