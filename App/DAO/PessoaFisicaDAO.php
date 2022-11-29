<?php

namespace App\DAO;

use App\Model\PessoaFisica;

class PessoaFisicaDAO
{

    public static function getAll()
    {
        $conn = Conexao::getInstance();

        $sql = "SELECT * FROM PessoaFisica";
        $conn = $conn->prepare($sql);
        $conn->execute();

        if ($conn->rowCount() > 0) {
            return $conn->fetchAll();
        }

        return null;
    }

    public static function getById($idPessoaFisica)
    {
        $conn = Conexao::getInstance();

        $sql = "SELECT * FROM PessoaFisica WHERE idPessoaFisica = ?";
        $conn = $conn->prepare($sql);
        $conn->bindValue(1, $idPessoaFisica);
        $conn->execute();

        if ($conn->rowCount() > 0) {
            return $conn->fetchAll();
        }

        return null;
    }

    public static function save(PessoaFisica $pessoaFisica)
    {
        $conn = Conexao::getInstance();

        $sql = "INSERT INTO pessoa_fisica (nome, cpf, dtNasc, senha, nivel_acesso) VALUES (?,?,?,?,?)";
        $sql = $conn->prepare($sql);

        $sql->bindValue(1, $pessoaFisica->getNome());
        $sql->bindValue(2, $pessoaFisica->getCpf());
        $sql->bindValue(3, $pessoaFisica->getDtNasc());
        $sql->bindValue(4, $pessoaFisica->getSenha());
        $sql->bindValue(5, $pessoaFisica->getNivel());

        if ($sql->execute())
            return $conn ->lastInsertId();

        return false;
    }

    public static function update(PessoaFisica $pessoaFisica)
    {
        $conn = Conexao::getInstance();

        $sql = "UPDATE FROM PessoaFisica SET nome = ?, cpf = ?, dtNasc = ?, senha = ? WHERE idPessoaFisica = ?";
        $conn = $conn->prepare($sql);

        $conn->bindValue(1, $pessoaFisica->getNome());
        $conn->bindValue(2, $pessoaFisica->getCpf());
        $conn->bindValue(3, $pessoaFisica->getDtNasc());
        $conn->bindValue(4, $pessoaFisica->getSenha());
        $conn->bindValue(5, $pessoaFisica->getIdPessoaFisica());

        if ($conn->execute())
            return self::getById($pessoaFisica->getIdPessoaFisica());

        return false;
    }

    public static function delete($idPessoaFisica)
    {
        $conn = Conexao::getInstance();

        $sql = "DELETE FROM PessoaFisica WHERE idPessoaFisica = ?";
        $conn = $conn->prepare($sql);

        $conn->bindValue(1, $idPessoaFisica);

        if ($conn->execute())
            return true;

        return false;
    }

    public static function login($cpf, $senha)
    {
        $conn = Conexao::getInstance();

        $sql = "SELECT id_pessoa_fisica, nome, nivel_acesso FROM pessoa_fisica WHERE cpf = ? AND senha = ?";
        $conn = $conn->prepare($sql);

        $conn->bindValue(1, $cpf);
        $conn->bindValue(2, $senha);
        $conn->execute();
        if ($conn->rowCount() > 0)
            return $conn->fetch(\PDO::FETCH_ASSOC);

        return false;
    }
}