<!DOCTYPE html>
<html lang="pt">
  <head>
    <title>Project Name</title>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content=""> 

    <!-- Bootstrap core CSS -->
    
    <link href="<?php echo WEB_ROOT_APP ?>/Lib/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo WEB_ROOT_APP ?>/Lib/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="<?php echo WEB_ROOT_APP ?>/Lib/css/local.css" rel="stylesheet">

    <script src="<?php echo WEB_ROOT_APP ?>/Lib/js/jquery.js"></script>
    <script src="<?php echo WEB_ROOT_APP ?>/Lib/js/jquery.tablesorter.min.js"></script>    
    <script src="<?php echo WEB_ROOT_APP ?>/Lib/js/jquery.maskedinput.min.js"></script>    
    <script src="<?php echo WEB_ROOT_APP ?>/Lib/js/jquery.validate.min.js"></script>
    <script src="<?php echo WEB_ROOT_APP ?>/Lib/js/bootstrap.js"></script>    
    <script src="<?php echo WEB_ROOT_APP ?>/Lib/js/local.js"></script>

  </head>
  <body>

    <div id="navbar-example" class="navbar navbar-inverse navbar-fixed-top">
        <div class="container" style="width: auto;">
          <a class="navbar-brand" href="<?php echo WEB_ROOT_APP ?>/Principal/inicio">Project Name</a>

          <?php
                if($this->getSession("S_LOGADO"))
                {
          ?>

          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-js-navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="nav-collapse collapse bs-js-navbar-collapse">
            <ul class="nav navbar-nav" role="navigation">              
              <li class="dropdown">
                <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Cadastros <b class="caret"></b></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo WEB_ROOT_APP ?>/Cliente/listar">Cliente</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">Processos <b class="caret"></b></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">Relatórios <b class="caret"></b></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav pull-right">              
              <li id="fat-menu" class="dropdown">
                <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <b class="caret"></b></a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="glyphicon glyphicon-cog"></i> Configurações</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo WEB_ROOT_APP ?>/Sobre/sobre"><i class="glyphicon glyphicon-info-sign"></i> Sobre</a></li>                  
                  <li role="presentation" class="divider"></li>                  
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo WEB_ROOT_APP ?>/Login/sair"><i class="glyphicon glyphicon-off"></i> Sair</a></li>                  
                </ul>
              </li>
            </ul>
          </div>
          <?php
            }
          ?>
        </div>
      </div>

      <div class="container" style="margin-top:70px">

      <?php
        if(is_object($this))
          if(is_array($this->getMessages()))
            foreach ($this->getMessages() as $message)
              echo $message->getHtml();
      ?>