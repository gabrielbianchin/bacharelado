<?php

session_start();

unset($_SESSION["nome"]);
unset($_SESSION["senha"]);
unset($_SESSION["email"]);
unset($_SESSION["peso"]);
unset($_SESSION["altura"]);
unset($_SESSION["idUsuario"]);
unset($_SESSION["qtde_dieta"]);
unset($_SESSION["cal_diaria"]);

header('Location: login.php');
?>