

<div class="modalApagar">
	
	<!-- Modal -->
	<div class="modal-apagar" id="modal-name">
	  <div class="modal-sandbox"></div>
	  <div class="modal-box">
	    <div class="modal-header">
	      <h1>Apagar Curso</h1>
	    </div>
	    <div class="modal-body txC">
	    	
	      <button class="close-modal button-modal button-modal--cancelar" onclick="closeApagarProduto()">Cancelar</button>
	      <a href="" id="apagarLink"><button class="close-modal button-modal">Apagar</button></a>
	    </div>
	  </div>
	</div>

</div>

<script type="text/javascript">
	function apagarProduto(id){
		$('.modal-apagar').css("display","block");
		$('#apagarLink').attr("href", "<?= base_url(); ?>painel/apagar_carro_form?id_curso="+id);
	}
	function closeApagarProduto(){
		$('.modal-apagar').css("display","none");
	}
</script>





<div class="widhtPadrao">	
	<div class="bg-painel">
		<h1>Apagar Promoções Comerciais em Andamento</h1>
	</div>
	<div class="blocoDashboard">
		<div class="listOptions">
			<div class="headerT">
				<div class="row">
					<div class="col-2 tH">Titulo</div>
					<div class="col-2 tH">Data</div>
					<div class="col-2 tH">Valor</div>
					<div class="col-2 tH">Postador</div>
					<div class="col-2 tH">Sorteio</div>
					<div class="col-2 tH">Editar</div>
				</div>
			</div>
			<?php
				foreach ($cursos as $item) {
					?>

					<div class="row linhaTR">
						<div class="col-2"><p><?= $item['titulo'] ;?></p></div>
						<div class="col-2"><p><?= $item['data_postagem'] ;?></p></div>
						<div class="col-2"><p><?= $item['valor'] ;?></p></div>
						<div class="col-2"><p>R$ <?= $item['postador'] ;?></p></div>
						<div class="col-2"><p><?= $item['sorteio'] ;?></p></div>
						<div class="col-2 txC"><a onclick="apagarProduto(<?= $item['id_curso'] ?>)"><button class="buttonApagar btn btn-primary">Apagar</button></a></div>
					</div>

					<?php
				}
			 ?>

		</div>
	</div>
</div>


