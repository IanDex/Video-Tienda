/**
 * Created by Cristtian PC on 23/01/2018.
 */
function validarform() {

    var txt_cod = document.getElementById('Codigo').value;
    var txt_nom = document.getElementById('Nombre').value;
    var txt_des = document.getElementById('Descripcion').value;

    var boll = false;

    if(txt_cod == null ||txt_cod.length == 0 || isNaN(txt_cod)){

        $("#cod").html("<label class='error'>Codigo *</label>");

        return false;
    }if(txt_nom == null ||txt_nom.length == 0 || /^\s+$/.test(txt_nom)){

        document.pelis.Nombre.focus();
        $("#nom").html("<label class='error'>Nombre *</label>");

        return false;
    }if(txt_des == null ||txt_des.length == 0 || /^\s+$/.test(txt_des)){
        document.pelis.Descripcion.focus();
        $("#des").html("<label class='error'>Descripcion *</label>");

        return false;
    }

    else{
        return true;
    }
}