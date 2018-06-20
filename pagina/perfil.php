<?php
//session_start();
include_once('conexao/conexao.php');
include_once('estrutura/logica-login.php');
//Carregar lista de contratos do usuário logado
$contratos=array();
if ($con=abreConexao()){
    $res=mysqli_query($con, "SELECT * FROM contrato WHERE CPF_TITULAR='".$_SESSION["usuario"]["cpf"]."'");
    while($linha=mysqli_fetch_assoc($res)){
      array_push($contratos, $linha);
    }
    $ps=mysqli_prepare($con, "SELECT DESCRICAO_TIPO, DESCRICAO_SERVICO, VALOR_ITEM FROM ITEM_CONTRATO INNER JOIN CONTRATO ON CONTRATO.ID_CONTRATO=ITEM_CONTRATO.ID_CONTRATO INNER JOIN SERVICO ON ITEM_CONTRATO.ID_SERVICO=SERVICO.ID_SERVICO INNER JOIN TIPO_SERVICO ON SERVICO.ID_TIPO_SERVICO=TIPO_SERVICO.ID_TIPO_SERVICO WHERE ITEM_CONTRATO.ID_CONTRATO=?");
    //foreach ($contratos as $key => $value) {
    for($i=0;$i<sizeof($contratos);$i++){
      $id=$contratos[$i]["ID_CONTRATO"];
      mysqli_stmt_bind_param($ps, "i", $id);
      mysqli_stmt_execute($ps);
      mysqli_stmt_bind_result($ps, $tipo, $serv, $valor);
      $itensContrato = array();
      while (mysqli_stmt_fetch($ps)){
        array_push($itensContrato, array($tipo, $serv, $valor));
      }
      $contratos[$i]["itens"]=$itensContrato;
    }
    mysqli_close($con);
}

//alteração dos dados do usuário
if (isset($_POST["alterar"])){
  //atualizar banco de dados
  if ($con=abreConexao()){
    $ps=mysqli_prepare($con, "UPDATE usuario SET NOME=?,ENDERECO=?,NUMERO_END=?,BAIRRO=?,CIDADE=?,UF=?,TELEFONE=?,EMAIL=? WHERE CPF=?");
    mysqli_stmt_bind_param($ps, "sssssssss", $_POST["nome"], $_POST["endereco"], $_POST["numeroEnd"], $_POST["bairro"], $_POST["cidade"], $_POST["uf"], $_POST["telefone"], $_POST["email"], $_SESSION["usuario"]["cpf"]);
    mysqli_stmt_execute($ps);

    //atualizar session a partir dos dados do banco
    $ps2=mysqli_prepare($con, "SELECT CPF,NOME,ENDERECO,NUMERO_END,BAIRRO,CIDADE,UF,TELEFONE,EMAIL FROM usuario WHERE cpf=?");
    mysqli_stmt_bind_param($ps2, "s", $_SESSION["usuario"]["cpf"]);
    mysqli_stmt_execute($ps2);
    mysqli_stmt_bind_result($ps2, $cpf, $nome, $endereco, $numeroEnd, $bairro, $cidade, $uf, $telefone, $email);
    if (mysqli_stmt_fetch($ps2)){
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
      ];
        $_SESSION["usuario"]=$usuario;

        $mensagem="Dados atualizados com sucesso!";
        mysqli_close($con);
  }
}
  else{
    $erro="Não foi possível estabelecer conexão com o banco de dados";
  }
}
//alteração de senha
if (isset($_POST["subSenha"])){
  //verificar senha atual e atualizar a senha
  if ($con=abreConexao()){
    $ps=mysqli_prepare($con, "SELECT SENHA FROM USUARIO WHERE CPF=?");
    mysqli_stmt_bind_param($ps, "s", $_SESSION["usuario"]["cpf"]);
    mysqli_stmt_execute($ps);
    mysqli_stmt_bind_result($ps, $senha);
    mysqli_stmt_fetch($ps);
    mysqli_close($con);
  }
  else{
    $erro="Não foi possível estabelecer conexão com o banco de dados";
  }
  if ($con=abreConexao()){
      if ($senha===md5($_POST["senhaAtual"])){
        if ($ps2=mysqli_prepare($con, "UPDATE USUARIO SET SENHA=? WHERE CPF=?")){
          $senhaCript= md5($_POST["senha"]);
          mysqli_stmt_bind_param($ps2, "ss", $senhaCript, $_SESSION["usuario"]["cpf"]);
          mysqli_stmt_execute($ps2);
          mysqli_close($con);
          $mensagem="Senha atualizada com sucesso!";
        }
        else{
          $erro="Erro na consulta (UPDATE)";
        }

      }
      else{
        $erro="Senha atual inválida!";
      }
    mysqli_close($con);
  }
  else{
    $erro="Não foi possível estabelecer conexão com o banco de dados";
  }
}

//Aquisição de um novo contrato de serviços
if (isset($_POST["novoContrato"])){
//Inserir novo CONTRATO
if ($con=abreConexao()){
  $ps = mysqli_prepare($con, "INSERT INTO CONTRATO (CPF_TITULAR,DATA_CONTRATO,VALOR_CONTRATO) VALUES (?,?,?)");
  $hoje=date("Y-m-d");
  $total = doubleval($_POST["valor_total"]);
  mysqli_stmt_bind_param($ps, "ssd", $_SESSION["usuario"]["cpf"], $hoje, $total);
  if (mysqli_stmt_execute($ps)){
    $idContrato = mysqli_insert_id($con);
  }
  else{
    $erro = "Erro ao cadastrar novo contrato";
  }
  mysqli_close($con);
}else {
  $erro="Não foi possível estabelecer conexão com o banco de dados";
}

// Inserir ITEM_CONTRATO
if (isset($idContrato)){
  if ($con=abreConexao()){
    //Usei um select dentro do insert para descobrir o id do servico a partir de seu valor e seu tipo. Funciona porque não há mais de um serviço do mesmo tipo com o mesmo valor.
    //Um jeito melhor seria atribuir aos radios da página formulario_compra os ids dos serviços, mas estragaria a função que o Fábio fez para calcular o total.
    $ps=mysqli_prepare($con, "INSERT INTO ITEM_CONTRATO VALUES (DEFAULT,?,?,(SELECT ID_SERVICO FROM servico WHERE VALOR_SERVICO=? AND ID_TIPO_SERVICO=?))");
    //o customRadio equivale aos serviços de id_tipo_servico=1
    $v = doubleval($_POST["customRadio"]);
    if ($v>0){
        $idTipo=1;
        mysqli_stmt_bind_param($ps, "didi", $v, $idContrato, $v, $idTipo);
        mysqli_stmt_execute($ps);
    }
    //customRadio2 -->id_tipo_servico=2
    $v = doubleval($_POST["customRadio2"]);
    if ($v>0){
        $idTipo=2;
        mysqli_stmt_bind_param($ps, "didi", $v, $idContrato, $v, $idTipo);
        mysqli_stmt_execute($ps);
    }
    //customRadio3 -->id_tipo_servico=3
    $v = doubleval($_POST["customRadio3"]);
    if ($v>0){
        $idTipo=3;
        mysqli_stmt_bind_param($ps, "didi", $v, $idContrato, $v, $idTipo);
        mysqli_stmt_execute($ps);
    }
    mysqli_close($con);
    $mensagem="Parabéns! Você adquiriu um contrato de serviços i9!<br/>Aguarde o contato de nossos consultores para maiores detalhes.";
  }else {
    $erro="Não foi possível estabelecer conexão com o banco de dados";
  }
}
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $("#formAlterar input[type=text], input[type=email]").attr("disabled", true);
      $("#formAlterar input[type=text], input[type=email]").addClass("form-control-plaintext");

      $("#editar").click(function(){
        $("#alterar").attr("type", "submit");
        $("#editar").attr("type", "hidden");
        $("#reset").attr("type", "reset");
        $("#formAlterar input[type=text], input[type=email]").attr("disabled", false);
        $("#formAlterar input[type=text], input[type=email]").removeClass("form-control-plaintext");
      });
    });

      function validar()
      {
        if(document.getElementById("senha").value!==document.getElementById("senhaConf").value)
        {
          alert("Senha inválida!");
          return false;
        }
        return true;
      }
  </script>
</head>
<body>
  <?php include ('estrutura/navbar.php'); ?>
  <?php
    echo (isset($erro)?"<div class='jumbotron'><h4 class='text-danger'>$erro</h4></div>":"");
    echo (isset($mensagem)?"<div class='jumbotron'><h4 class='text-success'>$mensagem</h4></div>":"");
   ?>
   <div class="jumbotron" name="listaContratos">
     <h3>Meus contratos</h3>
     <?php
        if (sizeof($contratos)>0){
          for ($i=0;$i<sizeof($contratos); $i++){
            echo "<h5>Contrato número ".$contratos[$i]["ID_CONTRATO"]."</h5><p>Data do contrato: ".$contratos[$i]["DATA_CONTRATO"]."</p>";
            echo "<ul>";
            $it=$contratos[$i]["itens"];
              for($j=0;$j<sizeof($it); $j++){
                echo "<li>".$it[$j][0]." Plano: ".$it[$j][1]." Valor: R$ ".$it[$j][2]."</li>";
              }
            echo "</ul>";
            echo "Valor total do contrato: R$ ".$contratos[$i]["VALOR_CONTRATO"];
            echo "<hr/>";
          }
        }else {
          echo "<h4 class='text-danger'>Você não possui nenhum contrato cadastrado!</h4>";
        }
     ?>
   </div>
  <div class="jumbotron">
    <h3>Meus dados</h3>
    <form class="form-control" id="formAlterar" action='perfil.php' method="post">
      <h4>CPF: <?php echo (isset($_SESSION)?$_SESSION["usuario"]["cpf"]:""); ?></h4><br/>
      Nome <br/>
      <input type="text" name="nome" id="nome" value='<?php echo (isset($_SESSION)?$_SESSION["usuario"]["nome"]:""); ?>' required/><br/>
      Endereço <br/>
      <input type="text" name="endereco" id="endereco" value='<?php echo (isset($_SESSION)?$_SESSION["usuario"]["endereco"]:""); ?>' required/><br/>
      Número <br/>
      <input type="text" name="numeroEnd" id="numeroEnd" value='<?php echo (isset($_SESSION)?$_SESSION["usuario"]["numeroEnd"]:""); ?>' required/><br/>
      Bairro <br/>
      <input type="text" name="bairro" id="bairro" value='<?php echo (isset($_SESSION)?$_SESSION["usuario"]["bairro"]:""); ?>' required/><br/>
      Cidade <br/>
      <input type="text" name="cidade" id="cidade" value='<?php echo (isset($_SESSION)?$_SESSION["usuario"]["cidade"]:""); ?>' required/><br/>
      UF <br/>
      <input type="text" pattern="[A-Z]{2}" name="uf" id="uf" value='<?php echo (isset($_SESSION)?$_SESSION["usuario"]["uf"]:""); ?>' required/><br/>
      Telefone <br/>
      <input type="text" pattern="\d+" name="telefone" id="telefone" value='<?php echo (isset($_SESSION)?$_SESSION["usuario"]["telefone"]:""); ?>' required/><br/>
      E-mail <br/>
      <input type="email" name="email" id="email" value='<?php echo (isset($_SESSION)?$_SESSION["usuario"]["email"]:""); ?>' required/><br/><br/>
      <input type="hidden" value="Salvar alterações" id="alterar" name="alterar" />
      <input type="button" name="editar" id="editar" value="Editar dados"/><input type="hidden" id="reset" value="Desfazer alterações" />
    </form>
  </div>
    <div class="jumbotron">
      <h3>Alterar senha</h3>
      <form name="formSenha" method="post" onsubmit="return validar();">
        Senha atual <br/>
        <input type="password" name="senhaAtual" id="senhaAtual" required/><br/>
        Nova senha <br/>
        <input type="password" name="senha" id="senha" required/><br/>
        Confirmar nova senha <br/>
        <input type="password" name="senhaConf" id="senhaConf" required/><br/><br/>
        <input type="submit" name="subSenha" id="subSenha" value="Alterar"/> <input type="reset" value="Limpar"/>
      </form>
    </div>
</body>
</html>
