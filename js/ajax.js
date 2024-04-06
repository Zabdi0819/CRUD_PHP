const formularios_ajax = document.querySelectorAll(".employeeFormControl");

formularios_ajax.forEach(formularios => {

    formularios.addEventListener("submit", function (e) {

        e.preventDefault();

        // Validar que los campos no estén vacíos
        let inputs = this.querySelectorAll('input, textarea');
        let camposVacios = false;

        inputs.forEach(input => {
            if (input.value.trim() === '') { // Comprobar si el valor del campo está vacío
                camposVacios = true;
                input.classList.add('is-invalid'); // Agregar clase de Bootstrap para indicar un campo inválido
            } else {
                input.classList.remove('is-invalid'); // Si el campo no está vacío, eliminar la clase de invalidación
            }
        });

        if(camposVacios == false){
            let data = new FormData(this);
            let method = this.getAttribute("method");
            let action = this.getAttribute("action");
            let name = this.getAttribute("name");
    
            let encabezados = new Headers();
    
            let config = {
                method: method,
                headers: encabezados,
                mode: 'cors',
                cache: 'no-cache',
                body: data
            };
    
            fetch(action, config)
                .then(respuesta => respuesta.json())
                .then(respuesta => {
                    // console.log(respuesta);
                    return alertas_ajax(respuesta);
                });
        }

    });

});



function delete_ajax(name, id) {
    Swal.fire({
        title: 'Confirmación',
        text: "¿Está seguro de eliminar al usuario " + name + "?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, realizar',
        cancelButtonText: 'No, cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            let encabezados = new Headers();
            let config = {
                method: 'POST',
                headers: encabezados,
                mode: 'cors',
                cache: 'no-cache',
            };

            // Agregar el ID como parámetro en la URL y el cuerpo de la solicitud
            let data = { id: id, delete: true };
            let params = new URLSearchParams(data);

            fetch('ajax/employeeAjax.php?delete=true', {
                ...config,
                body: params
            })
            .then(respuesta => respuesta.json())
            .then(respuesta => {
                return alertas_ajax(respuesta);
            });
        }
    });
}

function alertas_ajax(alert) {
    if (alert.type == "simple") {
        Swal.fire({
            icon: alert.icon,
            title: alert.title,
            text: alert.text,
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed && alert.icon != "error") {
                window.location.href = '?view=list';
            }
        });
    }
}


