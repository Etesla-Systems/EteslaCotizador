function myAlert(){
    setTimeout(function(){
        $(".myAlert").hide();
    }, 35000);
}

/*var modal = document.getElementById("mdlCuadroDialogoContent");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}*/

function cuadroDialogo(_array){
    var src = '';

    switch(_array.modalType)
    {
        case 0:
            //Caution (Only message)
            src = '../public/img/modal-notification/caution.png';
            modal.css("display","");
            $('#mdlImage').attr("src",src);
            $('#mdlMessage').html(_array.msg);
            $('#mdlCuadroDialogoFooter').css("display","");
            $('#btnModalConfirm').css("display","");
            break;
        case 1:
            //Confirm (Message with double button)
            src = '../public/img/modal-notification/error.png';
            modal.css("display","");
            $('#mdlImage').attr("src",src);
            $('#mdlMessage').html(_array.msg);
            $('#mdlCuadroDialogoFooter').css("display","");
            $('#btnModalConfirm').css("display","");
            $('#btnModalCancel').css("display","");
            if($('#btnModalCancel').click()){
                return false;
            }
            else if($('#btnModalConfirm').click()){
                return true;
            }
            break;
        case 2:
            /*
                +c?@: (Ventanilla "No volver a ver" -PD. No olvidar guardar dicha conf. en el navegador-)
                +(Only message without buttons and only check that save cookies values through the browser)
            */
            src = '../public/img/modal-notification/notification.png';
            modal.css("display","");
            $('#mdlImage').attr("src",src);
            $('#mdlMessage').html(_array.msg);
            $('#mdlCuadroDialogoFooter').css("display","");
            $('#btnModalConfirm').css("display","");
            //Check - "No volver a mostrar"
            break;
        default:
            alert('Hubo un error al intentar desplegar el alert-modal, revisar: alert-boostrap.js');
            break;
    }
}
