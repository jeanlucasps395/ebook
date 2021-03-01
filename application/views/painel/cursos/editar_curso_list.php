<div class="widhtPadrao">	
	<div class="bg-painel">
		<h1>Lista de cursos</h1>
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
						<div class="col-2 txC"><a href="<?= base_url().'painel/editar_curso_form?id='?><?= $item['id_curso'] ?>"><button class="buttonEditar btn btn-primary">Editar</button></a></div>
					</div>

					<?php
				}
			 ?>

		</div>
	</div>
</div>
