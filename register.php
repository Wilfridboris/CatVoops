<?php
$msgok=false;
$msgError='not loaded';

if(isset($_POST['Username'],$_POST['Password'],$_POST['Email'])):
    if($_POST['Username']!=""):
        if($_POST['Email']!=""):
            if($_POST['Password']!=""):
                $Username=$_POST['Username'];
                $Password=$_POST['Password'];
                $Email=$_POST['Email'];

                try{
                    $myPDO=new PDO("pgsql:host=ec2-35-171-31-33.compute-1.amazonaws.com;dbname=d5fja2almvc5e8","gxduzwzaxyaymp","388a801b058ba778c16646117bfb17e0426daf5cb118552f96d9688af77741a9");
                    $myPDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $verification=$myPDO->query("INSERT INTO utilisateur(name,email,password) VALUES ('$Username','$Email','$Password')");
                    $msgError='connected';
                    $msgok=true;
                    

                    $req=$myPDO->query("SELECT * FROM utilisateur WHERE email='$Email'");
                    $emit=$req->fetch(PDO::FETCH_ASSOC);
                    $to=$emit['email'];
                    $subject="Welcome to CatVops";
                    $message='<h1>Hi there</h1><p>Thanks for testing!</p>';
                    $header="From: The sender Name <boriskwayep9@gmail.com>\r\n";
                    $header="Reply-To:boriskwayep9@gmail.com\r\n";
                    $header.="Content-type:text/html\r\n";

                    mail($to,$subject,$message,$header);
                    
                    
                    


                }
                catch(PDOException $e){
                    echo $e->getMessage();
                    $msgok=false;
                    $msgError='not Connected';
                    
                }

            endif;
        endif;
    endif;
endif;
$data=array('requete'=>$msgError,'stat'=>$msgok);
echo json_encode($data);

?>
