<?php

function EncryClave($clave)
{
    $aleatorio = aleatoriedad();
    $valor = "05";
    $salt = '$2y$' . $valor . '$' . $aleatorio . '$';
    $ClaveEncry = crypt($clave, $salt);
    return $ClaveEncry;
}

// Genera una clave aleatoria 
function aleatoriedad()
{
    $caracteres = "abcdefghijklmnopqrstuvwxyz1234567890";
    $nueva_clave = "";
    for ($i = 5; $i < 35; $i++) {
        $nueva_clave .= $caracteres[rand(5, 35)];
    };
    return $nueva_clave;
};
