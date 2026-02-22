<?php

return [
    'required' => 'El campo :attribute es obligatorio.',
    
    'max' => [
        'array' => 'The :attribute field must not have more than :max items.',
        'file' => 'The :attribute field must not be greater than :max kilobytes.',
        'numeric' => 'The :attribute field must not be greater than :max.',
        'string' => 'El campo :attribute debe tener maximo :max caracteres.',
    ],
    'min' => [
        'array' => 'The :attribute field must have at least :min items.',
        'file' => 'The :attribute field must be at least :min kilobytes.',
        'numeric' => 'The :attribute field must be at least :min.',
        'string' => 'El campo :attribute debe tener minimo :min caracteres.',
    ],

    'email' => 'Se debe ingresar un email valido.',

    'confirmed' => 'EL campo de confirmacion :attribute no coincide',

    'unique' => 'Este :attribute ya está en uso'
];