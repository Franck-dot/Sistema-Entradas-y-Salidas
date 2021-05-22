/************ LOGIN **********/
$(document).ready(function(){
    $("#btnAdd").text('Iniciar Sesion');
	
    $('#formLogin').submit(function(event){
        event.preventDefault();
		
        let userlg = $('#userlg').val();    
        let passlg = $('#passlg').val();
		
        $.ajax({
            url: "appweb/db/login.php",
            method: "POST",  
            data:  {
                userlg:userlg,
                passlg:passlg
            },
            beforeSend: function(){
                $("#btnAdd").text('Validando...');
            },  
            success: function(response) {
                if(response==2){
                    window.location.href="appweb/vistas/inicio.php"
                }else if(response==1){
                    window.location.href="appweb/vistas/in_out.php"
                }else if(response==0){
                    alert("No tienes Acceso al sistema");
                    $("#btnAdd").text('Iniciar Sesion');
                }else{
                    alert("Usuario o Contraseña son incorrectos");
                    $("#btnAdd").text('Iniciar Sesion');
                }
            },
        })

      });
});