function eliminar(modelo, ruta) {
    let eliminar = confirm('¿Desea eliminar el '+modelo+'?');
    let form = document.form;

    if (eliminar) {
        form.submit();
    }else{
        window.location = "http://localhost:8080/veterinaria/" + ruta;
    }
}