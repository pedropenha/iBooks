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

    public static function validar_dominio(String $dominio): bool
    {
        return filter_var($dominio, FILTER_VALIDATE_URL);
    }

    public static function validar_telefone(String $telefone): bool
    {
        return preg_match('/^[0-9]{11}+$/', $telefone);
    }

    public static function campos_vazios_game(array $game): bool
    {
        foreach ($game['game'][0] as $key => $item){
            if($key != 'statusGame'){
                if(empty($item)) {
                    var_dump($item);
                    return false;
                }
            }
        }

        foreach ($game['niveis'] as $item){
            foreach ($item as $nivelItem){
                if(empty($nivelItem)){
                    return false;
                }
            }
        }

        foreach ($game['fases'] as $item){
            foreach ($item as $faseItem){
                if(empty($faseItem))
                    return false;
             }
        }

        return true;
    }
}