<?php
$msgok=false;
$msgError='not loaded';
require 'phpmailer/PHPMailerAutoload.php';


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
                    
                    $msgok=true;
                    $req=$myPDO->query("SELECT * FROM utilisateur WHERE email='$Email'");
                    $emit=$req->fetch(PDO::FETCH_ASSOC);
                    $to=$emit['email'];
                    $mail=new PHPMailer;
                    $mail->Host='smtp.gmail.com';
                    $mail->Port=587;
                    $mail->SMTPAuth=true;
                    $mail->SMTPSecure='tls';
                    $mail->Username='visualinc18';
                    $mail->Password='LamborginI5';
                    $mail->setFrom($to);
                    $mail->addReplyTo(($to));
                    $mail->isHTML(true);
                    $mail->Subject='Form Submissiom:Welcome';
                    $mail->Body='<h1>yo</h1>';

                    if(!$mail->send()){
                        $msgError='something wrong';
                    }
                    else{
                        $msgError='connected';
                    }






                    /*

                    $req=$myPDO->query("SELECT * FROM utilisateur WHERE email='$Email'");
                    $req=$req->fetch(PDO::FETCH_ASSOC);
                    $to=$req['email'];
                    $subject="Welcome to CatVops";
                    $message=" hello";
                    $header="From:boriskwayep9@gmail.com" ."r\n";

                    mail($to,$subject,$message,$header);
                    */
                    
                    


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
