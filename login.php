<?php
        session_start();
      include("conexaoMySQL.php");
      include("crud-usuario.php");


      $usuario = buscaUsuario($conexao,$_POST["username"],$_POST["pwd"]);

    if(mysqli_connect_error()):
        echo "Falha na conexão: ".mysqli_connect_error();
    endif;

     if ($usuario == null)
      {
          echo "Usuário e/ou Senha estão incorreto(s).";
      }
      else{
          setcookie("lembrarUsuario","$usuario", (time() + (3 * 24 * 3600)));
          header("Location: index.php");
          if(isset($_COOKIE['lembrarUsuario'])){
              $conteudoCookie = $_COOKIE['lembrarUsuario'];
              echo "Conteúdo Cookie".$conteudoCookie;
          }
          else{
              echo "Cookie não configurado.";
          }
      }
?>