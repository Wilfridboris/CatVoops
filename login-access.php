<?php
session_start();
$msgok=false;
$msgError='not loaded';
$id="";
$name="";

if(isset($_POST['Username'],$_POST['Password'])):
    if($_POST['Username']!=""):
        if($_POST['Password']!=""):
            $Username=$_POST['Username'];
            $Password=$_POST['Password'];

            try{
                $myPDO=new PDO("pgsql:host=ec2-35-171-31-33.compute-1.amazonaws.com;dbname=d5fja2almvc5e8","gxduzwzaxyaymp","388a801b058ba778c16646117bfb17e0426daf5cb118552f96d9688af77741a9");
                $myPDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $verification= $myPDO->query("SELECT *FROM utilisateur WHERE name='$Username' AND password='$Password'");
                if($verification->rowCount()>0){
                    $msgError='connected';
                    $msgok=true;
                    $user= $verification->fetch(PDO::FETCH_ASSOC);
                    $id=$user['id'];
                    $name=$user['name'];
                        
                    
                        $_SESSION["id"]=$user['id'];
                        $_SESSION["name"]=$user['name'];
                       
                    

                   
                    

                }
                else{
                    $msgError='not Valide';
                    $msgok=false;
                }

            }
            catch(PDOException $e){
                echo $e->getMessage();
                $msgok=false;
                $msgError='not Connected';
            }


        endif;
    endif;
endif;
$data=array('request'=>$msgError,'status'=>$msgok,'id'=>$id,'name'=>$name);

echo json_encode($data);

?>
