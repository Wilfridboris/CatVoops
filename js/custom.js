$(function(){
    let touch=0;
    $('#form3').hide();
    $('#update').hide();
    $('#level').hide();
    $('#logo').on('click',(e)=>{
         touch+=1;
         e.preventDefault();
         if(touch<=1){
       
        $('#update').show();
         $('#level').show();
        }
         if(touch>=2) {
            $('#update').hide();
            $('#level').hide();
            touch=0;
             
         }
        });
    $('#update').click(function(e){
        e.preventDefault();
        $('#form3').show();
        $('#update').hide();
        $('#level').hide();
    });
    $('#ok').click(function(e){
        e.preventDefault();
        touch=0;

        $('#form3').hide();
    });
    
    
$("#sign-up").on('click',function(){
    window.location='form-login.php';
});

$("#sign-in").on('click',function(){
    window.location='login.php';
});

$('#submit').click(function(e){
    e.preventDefault();
    var Username=$('#Username2').val();
    var Password=$('#Password2').val();
    var Email=$('#Email2').val();
    $.ajax({

        type:"POST",
        dataType:"JSON",
        url:'register.php',
        data:{Username:Username,Password:Password,Email:Email},
        success:function(data){
            if(data.stat==true){
            $('#note2').text(data.requete);
            }
            else{
            $('#note2').text(data.requete);
            }
        }
    });
});
$('#Sign').click(function(){
    var Username=$('#Username').val();
    var Password=$('#Password').val();
    $.ajax({
       type:"POST",
       dataType:"JSON",
       url:'login-access.php',
       data:{Username:Username,Password:Password},
       success:function(data){
        if(data.status==true){
            
            $('#note').text(data.request);          
                              window.location='CatVops.php';
        /*
        $.post( "perso.php", { name: "John", pass: "2pm" } ).done(function(data){
            console.log(data);
        });
        */
       
            }
            else{
            $('#note').text(data.request);
            } 

            },error:function(){
                alert('Sorry an ERROR Occur');
       }
    });

});


    $('div.list-group a').click(function(e){
        e.preventDefault();
        var url=this.href;
    $('div.list-group a.active').removeClass('active');
    $(this).addClass('active');
        $('div.container').remove();
        $('div.contient').load(url+'#contient').fadeIn();

    
    });





});