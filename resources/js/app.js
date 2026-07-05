import Dropzone from "dropzone";
//import "dropzone/dist/dropzone.css";
Dropzone.autoDiscover = false;

const inputPerfil = document.querySelector('#perfil');
if (inputPerfil){
    const preview = document.querySelector('#preview');

    inputPerfil.addEventListener('change', function(){
        const file = this.files[0];

        if (file){
            const url = URL.createObjectURL(file);
            preview.src = url;
        }
    });
}

const inputSearch = document.querySelector('#search');
if (inputSearch){
    const labelSearch = document.querySelector('#labelSearch');
    const usuario404 = document.querySelector('#usuario404');

    labelSearch.addEventListener('click', function(){
        inputSearch.hidden = !inputSearch.hidden;
        labelSearch.hidden = !labelSearch.hidden;
        usuario404.hidden = true;
    });

    inputSearch.addEventListener('blur',function(){
        inputSearch.hidden = !inputSearch.hidden;
        labelSearch.hidden = !labelSearch.hidden;
    });
}

if(document.querySelector("#dropzone")){
    const dropzone = new Dropzone('#dropzone',{
        dictDefaultMessage: "Sube aqui tu imagen",
        acceptedFiles: ".png,.jpg,.jpeg,.gif",
        addRemoveLinks: true,
        dictRemoveFile: "Borrar Archivo",
        maxFiles: 1,
        uploadMultiple: false,
    
        init: function(){
            if (document.querySelector('[name="imagen"]').value.trim()){
                const imagenPublicada = {};
                imagenPublicada.size = 0;
                imagenPublicada.name = document.querySelector('[name="imagen"]').value;
    
                this.options.addedfile.call(this, imagenPublicada);
                this.options.thumbnail.call(this, imagenPublicada,`/uploads/${imagenPublicada.name}`);
            
                imagenPublicada.previewElement.classList.add("dz-success","dz-complete");
            }
        }
    });
    
    dropzone.on("success",function(file, response){
        document.querySelector('[name="imagen"]').value = response.img;
    });
    
    dropzone.on("removedfile", function(file){
        document.querySelector('[name="imagen"]').value = '';

        if(file.xhr){
            const respuesta = JSON.parse(file.xhr.responseText);

            fetch('/imagenes/eliminar', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ imagen: respuesta.img })
            });
        }
    });
}
