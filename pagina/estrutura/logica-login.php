<?php
session_start();
if (isset($_POST["login"])){
    include_once('conexao/conexao.php');
    if ($con=abreConexao()){
        $ps=mysqli_prepare($con, "SELECT CPF,NOME,ENDERECO,NUMERO_END,BAIRRO,CIDADE,UF,TELEFONE,EMAIL,SENHA FROM usuario WHERE cpf=?");
        mysqli_stmt_bind_param($ps, "s", $_POST["cpf"]);
        mysqli_stmt_execute($ps);
        mysqli_stmt_bind_result($ps, $cpf, $nome, $endereco, $numeroEnd, $bairro, $cidade, $uf, $telefone, $email, $senha);
        if (mysqli_stmt_fetch($ps)){
            if ($senha === md5($_POST["senha"])){
                $usuario = [
                    "cpf" => $cpf,
                    "nome" => $nome,
                    "endereco" => $endereco,
                    "numeroEnd" => $numeroEnd,
                    "bairro" => $bairro,
                    "cidade" => $cidade,
                    "uf" => $uf,
                    "telefone" => $telefone,
                    "email" => $email
                    //"senha" => $senha
                ];
                $_SESSION["usuario"]=$usuario;
            }
            else {
                $erro = "Senha incorreta!";
            }
        }
        else {
            $erro="CPF não cadastrado!";
        }
    }
    else {
        $erro="Não foi possível estabelecer conexão com o banco de dados!";
    }
}
if (isset($_POST["logout"])){
    session_unset();
    header('Location: index.php');
    //session_destroy();
}
if (isset($_POST["subCadastrar"])){
    include('cadastroGet.php');
}

?>
