// SUBMIT

document.addEventListener('wpcf7submit', function (event) {

    document.addEventListener('wpcf7spam', function (event) {
        showAlert('spam');
    }, false);

    document.addEventListener('wpcf7mailsent', function (event) {
        showAlert('mailsent');
    }, false);

    document.addEventListener('wpcf7mailfailed', function (event) {
        showAlert('mailfailed');
    }, false);


}, false);

document.addEventListener('wpcf7invalid', function (event) {
    showAlert('invalid');
}, false);



// Show Alerts
function showAlert(status) {

    if (status === 'invalid') {
        swal({
            title: "¡Error!",
            text: "Uno o más campos son inválidos... ¡Chequéalos!",
            icon: "error",
            button: "OK, Lo arreglaré",
        });
    } else if (status === 'spam') {
        swal({
            title: "¡Fuera de aquí!",
            text: "No nos agrada el spam.",
            icon: "warning",
            button: "No molesto mas :(",
        });
    } else if (status === 'mailsent') {
        swal({
            title: "¡Mensaje enviado!",
            text: "Responderemos tu mensaje lo antes posible, ¡Gracias!",
            icon: "success",
            button: "Cerrar",
        });
    } else if (status === 'mailfailed') {
        swal({
            title: "¡Ha ocurrido un problema!",
            text: "Algo falló al enviar su mensaje. ¡Inténtalo nuevamente!",
            icon: "warning",
            button: "Lo intentaré de nuevo",
        });
    }
}
