<?php
  	include_once("./View/Header.php");

  	$REG_PG 	= 5;
	$NUM_PG 	= defined("HTA_PARAM3") && is_numeric(HTA_PARAM3)? HTA_PARAM3-1 : 0;
	$FIL_NOME 	= isset($_POST["filNome"]) ? $_POST["filNome"] : "";

?>

	
	<script >
		$(function() {
			$("table#tableList").tablesorter({ sortList: [[1,0]] });
		});

		/*$(function () {
            $('#tableList tr').click(function () {                
                $(this).addClass('lineDiff').siblings().removeClass('lineDiff');
            });
        });*/

	</script>		
      
		  <fieldset>
		    <legend>Lista de Cliente(s)</legend>

		    <form action="<?php echo WEB_ROOT_APP ?>/Cliente/listar" method="POST">
			    <div class="row">
			    	<div class="col-9">
			    		<div class="row">
				    		<div class="input-group col-8">						
				    			<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
								<input name="filNome" type="text" class="form-control" placeholder="Nome do Cliente" value="<?php echo $FIL_NOME?>">
							</div>
							<div class="input-group col-4">						
								<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"></i> Buscar</button>
							</div>
						</div>
			    	</div>		    	
			    	<div class="col-3">
			    		<a href="<?php echo WEB_ROOT_APP ?>/Cliente/cadastrar" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Novo Cliente</a>
			    	</div>
			    </div>
		    </form>

		    <hr>

			<div>      
			 <table class="table table-hover table-striped" id="tableList">
		        <thead>
		          <tr>
		            <th class="col-lg-1 text-center">Código</th>
		            <th class="col-lg-4">Nome</th>
		            <th class="col-lg-1">Estado</th>
		            <th class="col-lg-2">Cidade</th>		            
		            <th class="col-lg-2">CPF</th>
		            <th class="col-lg-2">&nbsp;</th>
		          </tr>
		        </thead>
		        <tbody>
		        	<?php

		        		$clientes = $this->clientes;

		        		for($i=($NUM_PG * $REG_PG);$i<($REG_PG * ($NUM_PG+1)) && $i<count($clientes);$i++)
		        		{
		        			$cliente = $clientes[$i];

		        			$urlAlterar = WEB_ROOT_APP . "/Cliente/alterar/" . $cliente->getIdCliente();
		        			$urlExcluir = WEB_ROOT_APP . "/Cliente/excluir/" . $cliente->getIdCliente();
		        	?>
				          <tr class="<?php echo $cliente->getStatus()=="I" ? "danger" : "" ?>">
				            <td class="text-center"><?php echo $cliente->getIdCliente() ?></td>
				            <td><?php echo $cliente->getNome() ?></td>
				            <td><?php echo $cliente->getEstado() ?></td>
				            <td><?php echo $cliente->getCidade() ?></td>
				            <td><?php echo $cliente->getCpf() ?></td>				            
				            <td class="text-right">
				            	<a href="<?php echo $urlAlterar?>" class="btn btn-warning btn-mini"><i class="glyphicon glyphicon-edit"></i> Alterar</a>
				            	<!--<button type="button" class="btn btn-warning btn-mini"><i class="glyphicon glyphicon-edit"></i> Alterar</button>-->		            	
								<button type="button" class="btn btn-danger btn-mini" onclick="if(confirm('Deseja remover o cliente?')) { document.location.href='<?php echo $urlExcluir?>' }"><i class="glyphicon glyphicon-trash"></i> Excluir</button>								
				            </td>
				          </tr>
		          <?php
		          		}
		          ?>
		          
		        </tbody>
		      </table>		      
		      </div>

		      <?php
					if(count($clientes) == 0)
	          		{
	          			$message = new Message();
						$message->setTitle("ATENÇÃO:");
						$message->setText("Nenhum registro encontrado!");			
						$message->setType(Message::$INFO);
						echo $message->getHtml();
	          		}
		      ?>

		      <hr>

		      <div class="text-center">
	      		<ul class="pagination pagination">
					<?php

						$PAG_INI = 0;
						$PAG_FIM = ceil(count($clientes) / $REG_PG);

						if($NUM_PG == 0){
							echo "<li class='disabled'><a >&laquo;</a></li>";
							echo "<li class='disabled'><a>&lsaquo;</a></li>";
						}
						else{
							echo "<li><a href='".WEB_ROOT_APP."/Cliente/listar/1'>&laquo;</a></li>";
							echo "<li><a href='".WEB_ROOT_APP."/Cliente/listar/".($NUM_PG - 1)."'>&lsaquo;</a></li>";
						}

						for($i=$PAG_INI;$i<$PAG_FIM;$i++)
	        			{
	        				if($i == $NUM_PG)
	        					echo "<li class='disabled'><a>".($i+1)."</a></li>";
	        				else
	        					echo "<li><a href='".WEB_ROOT_APP."/Cliente/listar/".($i+1)."'>".($i+1)."</a></li>";
	        			}

	        			if($NUM_PG == $PAG_FIM-1){
							echo "<li class='disabled'><a>&rsaquo;</a></li>";		        		
							echo "<li class='disabled'><a>&raquo;</a></li>";
	        			}
						else{
							echo "<li><a href='".WEB_ROOT_APP."/Cliente/listar/".($NUM_PG + 2)."'>&rsaquo;</a></li>";
							echo "<li><a href='".WEB_ROOT_APP."/Cliente/listar/".($PAG_FIM)."'>&raquo;</a></li>";
						}						
					?>						
				</ul>				    
			</div>
		</fieldset>
		
	
  
<?php
  include_once("./View/Footer.php");
?>  