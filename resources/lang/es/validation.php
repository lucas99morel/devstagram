<?php

return [
    'required' => 'El campo :attribute es obligatorio.',
    
    'max' => [
        'array' => 'El campo :attribute no debe tener más de :max elementos.',
        'file' => 'El campo :attribute no debe ser mayor que :max kilobytes.',
        'numeric' => 'El campo :attribute no debe ser mayor que :max.',
        'string' => 'El campo :attribute debe tener como máximo :max caracteres.',
    ],

    'min' => [
        'array' => 'El campo :attribute debe tener al menos :min elementos.',
        'file' => 'El campo :attribute debe tener al menos :min kilobytes.',
        'numeric' => 'El campo :attribute debe ser al menos :min.',
        'string' => 'El campo :attribute debe tener como mínimo :min caracteres.',
    ],

    'email' => 'Se debe ingresar un email valido.',

    'confirmed' => 'EL campo de confirmacion :attribute no coincide',

    'unique' => 'Este :attribute ya está en uso'
];