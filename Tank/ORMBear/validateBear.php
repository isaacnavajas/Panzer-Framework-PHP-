<?php

class validateBear {
    public static function validateRequired($data, $fields) {
        foreach ($fields as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                return "$field es requerido.";
            }
        }
        return null;
    }

    public static function validateEmail($data, $fields) {
        foreach ($fields as $field) {
            if (!filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
                return "$field no es un correo electrónico válido.";
            }
        }
        return null; 
    }

}
