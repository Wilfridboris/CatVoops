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
                    $myPDO=new PDO("pgsql:host=localhost;dbname=test","postgres","VoiturE5");
                    $myPDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $verification=$myPDO->query("INSERT INTO utilisateur(name,email,password) VALUES ('$Username','$Email','$Password')");
                    $msgError='connected';
                    $msgok=true;
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