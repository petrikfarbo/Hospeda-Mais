<?php
session_start();
require_once 'models/Funcionario.php';
require_once 'db/FuncionarioDAOMysql.php';

require_once 'models/Quarto.php';
require_once 'db/QuartoDAOMysql.php';

if (isset($_SESSION['id_fun']) && !empty($_SESSION['id_fun'])) {
   $id = $_SESSION['id_fun'];

   $f = new FuncionarioDAOMysql();
   $f = $f->findById($id);

   $q = new QuartoDAOMysql();
   $q = $q->findAll();

}else {   
   header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Quartos</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item">
                                 <a class="nav-link" href=" ">Bem vindo, <?=$f->getFun_nome();?></a>
                              </li>
                           </ul>
                           <div class="sign_btn"><a href="index.html">Sair</a></div>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <section class="banner_main">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="text-bg">
                     <div class="padding_lert">

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  
                  <form class="form_gerenciar">
                     
                     <div class="row">
                        <a class="nav-link" href="adicionarquartos.php">Adicionar Quarto</a>

                        
                           <div class="col-md-12">
                              <table class="table table-striped">
                                 <thead>
                                    <tr>
                                       <th>Número do Quarto</th>
                                       <th>Capacidade</th>
                                       <th>Tipo de Cama</th>
                                       <th>Disponibilidade</th>
                                       <th>Ações</th>
                                    </tr>
                       
                                 </thead>
                                 <tbody>
                                 <!-- Aqui serão exibidos os quartos adicionados dinamicamente -->
                                 <!-- Para cada quarto adicionado, adicione uma nova linha na tabela -->
                                 <?php foreach ($q as $value): ?>
                                 <tr>
                                    <td><?=$value->getId_quarto();?></td>
                                    <td><?=$value->getQrt_capacidade();?> Pessoas</td>
                                    <td>Cama <?=$value->getQrt_tipo_cama();?></td>
                                    <td><?php $value->getQrt_disponivel() === 1 ? 'Disponível' : 'Indisponível' ;?></td>
                                    <td>
                                       <a href="alterarquarto.php?id=<?=$value->getId_quarto();?>" >Editar</a> |
                                       <a href="excluirquarto.php?id=<?=$value->getId_quarto();?>" >Excluir</a>
                                    </td>
                                 </tr>
                                 <?php endforeach;?>
                                 
                       <!-- Adicione mais linhas para cada quarto adicionado -->
                                 </tbody>
                              </table>
               <!-- final tabela -->
                           </div>
   </div>
</form>
                 
<a class="nav-link" href="telaprincipalfuncionario.html">Voltar</a>

              </div>

           </div>
        </div>
        
     </section>

     <!-- end room_list -->
      <footer>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <p>Copyright 2023 All Right Reserved By
                     <a href=" "> i6 - Tech </a>
                  </p>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script src="js/script.js"></script>
   </body>
</html>
