<?php

namespace App\Services;

final class UtilValidator{

    public static function validar_formulario($data, $arrayValido): bool
    {
        if($data === null)
            return false;

        foreach($arrayValido as $key => $item){
            if(!array_key_exists($item, $data)){
                return false;
            }
        }
        return true;
    }

    public static function validar_campos_obrigatorios(array $data, array $arrayValido): bool
    {
        foreach ($arrayValido as $key => $item){
            if(empty($data[$item]))
                return false;
        }
        return true;
    }

    public static function validar_campos_nao_vazios($data): bool
    {
        foreach ($data as $key => $item){
            if(empty($item))
                return false;
        }

        return true;
    }

    public static function validar_email(String $email): bool
    {
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    public static function validar_telefone(String $telefone): bool
    {
        return preg_match('/^[0-9]{11}+$/', $telefone);
    }
}