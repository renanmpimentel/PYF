<?php
  include_once("./View/Header.php");
?>	
    <form method="POST" action="<?php echo WEB_ROOT_APP ?>/Login/validar" class="form-horizontal">

      	<fieldset>
		    <legend>Acesso</legend>

			<div class="row">
			    <div class="col-lg-4 col-offset-4">
					<div class="form-group">
					  <label for="usuario">Usu�rio</label>			      
						<div class="input-group">						
							<input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usu�rio">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						</div>
					</div>			
				
					<div class="form-group">
					  <label for="exampleInputEmail">Senha</label>
					  <div class="input-group">						
							<input type="password" name="senha" id="senha" class="form-control" placeholder="Senha">
							<span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
						</div>
					</div>			    		   

					<div class="form-group">
						<button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-ok"></i> Entrar</button>
					</div>					
				 </div>
			</div>

		</fieldset>
	</form>		
	
  
<?php
  include_once("./View/Footer.php");
?>  