
function ChequeoUsuarios(Boton) {
	
    var error    = false;
    var Mensaje  = "Atención!!\nFalta Ingresar:\n";

    // cargar en variables datos del formulario
    var Login      = document.getElementById("FrmUsuarios").Login.value;
    var Contrasenia= document.getElementById("FrmUsuarios").Password.value;
    var Nombre     = document.getElementById("FrmUsuarios").NombreUsu.value;
    var Apellido   = document.getElementById("FrmUsuarios").ApellidoUsu.value;

    //Establecer que botón fue presionado
    document.getElementById("FrmUsuarios").QueBoton.value=Boton;

    // Verificar si hay campos vacíos
    if (Login=="")
    {
        Mensaje += "- Login\n";
        error = true;
    }
    if (Contrasenia=="")
    {
        Mensaje += "- Password\n";
        error = true;
    }
    if (Nombre=="")
    {
        Mensaje += "- Nombre\n";
        error = true;
    }
    if (Apellido=="")
    {
        Mensaje += "- Apellido\n";
        error = true;
    }

    if (error)
    {
        window.alert(Mensaje);
    } else
    {
    	
        document.getElementById("FrmUsuarios").submit();

    }
} // end function ChequeoUsuarios
    
 
function ValidarFecha(Fecha){
    var Validar=true;

    var Dia=Fecha.substring(0,2);
    var Mes=Fecha.substring(3,5);
    var Año=Fecha.substring(6,10);
    var Bis=Año%4;


    // Valido el año
    if (isNaN(Año) || Año.length<4 || parseFloat(Año)<1900)
    {
        Validar=false;
    }
    // Valido el Mes
    if (isNaN(Mes) || parseFloat(Mes)<1 || parseFloat(Mes)>12)
    {
        Validar=false;
    }
    // Valido el Dia
    if (isNaN(Dia) || parseInt(Dia, 10)<1 || parseInt(Dia, 10)>31)
    {
        Validar=false;
    }
    if (Mes==4 || Mes==6 || Mes==9 || Mes==11)
    {
        if (Dia>30)
        {
            Validar=false;
        }
    }

   if (Mes==2){
     if (Bis!=0 && Dia>28)
     {
        Validar=false;
     }
     if (Bis==0 && Dia>29)
     {
        Validar=false;
     }
    }

      return Validar;

}// end function ValidarFecha



function ValidarHora(hora){

    Validar=true;

    a=hora.charAt(0); //<=2
    b=hora.charAt(1); //<4
    c=hora.charAt(2); //:
    d=hora.charAt(3); //<=5
    e=hora.charAt(4); //<=9

    if ((a==2 && b>3) || (a>2) || isNaN(a) || isNaN(b))
    {
        Validar=false;
    }
    if ((d==5 && e>9) || (d>5) || isNaN(d) || isNaN(e))
    {
        Validar=false;
    }
    if (c!=':')
    {
        Validar=false;
    }
    return Validar;
}



function ValidarEmail(valor) {
    var validar;
    //  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(valor)){
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(valor))
    {
        //La dirección de email es correcta
        validar=true;
    } else
    {
        //La dirección de email es incorrecta
        validar=false;
    }
    return validar;
}



    
function SetInput(id,estado) {
    // cambiar el color de fondo de una entrada
    if (estado=="on")
    {
        document.getElementById(id).style.backgroundColor = "#FFFFCA";
    } else
    {
        document.getElementById(id).style.backgroundColor = "#FFFFFF";
    } // endif
} // end function


// Función que direcciona a una pagina recibida en el parametro pagina
function IrAPagina(pagina) {
    // cargar la página recibida en parámetro pagina
    window.location.href = pagina;
} // end function IrAPagina


// Confirmación de borrado

function Confirmar(Pagina,Formulario,Boton) {

    if (confirm ('¿Está Seguro de Borrar?'))
	{
        //Establecer que botón fue presionado
        document.getElementById(Formulario).QueBoton.value=Boton;
		document.getElementById(Formulario).submit();
	}
	else
	{
		window.location.href = Pagina;
	}
 } // End Function confirmar


// Función para desplegar mensajes generales de error
// y regresar a la página desde el que se produjo el mismo.
    
function Error(mensaje,pagina) {
// cargar la página recibida en parámetro pagina
    window.alert(mensaje);
    window.location.href = pagina;
} // end error
    
    
    
function Salir() {
    // cargar la página recibida en parámetro pagina
    window.window.close();
} //
    
    
    
function Mensaje(titulo){
    window.alert(titulo);
}
  


    
function VerDatosUsu(Formulario,Boton) {

    var oid = document.getElementById(Formulario).SelUsuario.value;

    // oid del usuario
    document.getElementById(Formulario).IdUsu.value=oid;
    //Establecer que botón fue presionado
    document.getElementById(Formulario).QueBoton.value=Boton;
    document.getElementById(Formulario).submit();

} //
    

    
