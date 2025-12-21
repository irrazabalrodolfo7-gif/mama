<?php

function guardarImagen($source, $destination){
    // mueve la imagen subida tal cual
    if (!move_uploaded_file($source, $destination)) {
        return false;
    }
    return true;
}
