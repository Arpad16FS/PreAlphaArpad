const botones = document.querySelectorAll('.btnEliminar');

botones.forEach(boton => {

    boton.addEventListener('click', function() {
        const idEmpleado = this.dataset.id;
        //console.log(idEmpleado);

        const confirm = window.confirm('¿Deseas eliminar al empleado con id ' + idEmpleado + '?');

        if (confirm){
            // Solicitud AJAX
            httpRequest('http://localhost/preAlphaArpad/consultarUsuario/eliminarEmpleado/' + idEmpleado, function(){
                console.log(this.responseText);
                document.querySelector('#respuesta').innerHTML = "Se eliminó al empleado";

                const tbody = document.querySelector("#tbody-empleados");
                const fila = document.querySelector("#fila-" + idEmpleado);

                tbody.removeChild(fila);
            });
        }
    });
});

function httpRequest(url, callback) {
    const http = new XMLHttpRequest();
    http.open('GET', url);
    http.send();

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status >= 200 && this.status < 400){
            callback.apply(http);
        }
    }
}