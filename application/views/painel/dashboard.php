<style type="text/css">
	#bg-dashboard{
		width: 100%;
		height: 100%;
		background: url('<?= base_url('style/img'); ?>/bg-dash.jpeg');
		position: absolute;
	}
	.widhtPadrao h1{
		margin-top: 30px;
		color: #fff;
		font-weight: bolder;
	}
</style>

<div id="bg-dashboard">
	<div class="widhtPadrao">	
		<h1>Acesso rápido</h1>
		<div class="blocoDashboard">
			<div class="row">
				<div class="col-sm-6 col-12 p0">
					<a href="<?php echo base_url('painel/editar_curso_list'); ?>">
						<div class="blocoDash b1">
							<i class="fad fa-chalkboard"></i>
							<p>Ver e editar Crusos</p>
						</div>
					</a>
				</div>
				<div class="col-sm-3 col-12 p0">
					<a href="<?php echo base_url('painel/cadastrar_curso'); ?>">
						<div class="blocoDash b2">
							<i class="fad fa-chalkboard"></i>
							<p>adicionar Curso</p>
						</div>
					</a>
				</div>
				<div class="col-sm-3 col-12 p0">
					<a href="<?php echo base_url('painel/apagar_curso'); ?>">
						<div class="blocoDash b3">
							<i class="fad fa-times"></i>
							<p>Apagar Curso</p>
						</div>
					</a>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-3 col-12 p0">
					<a href="<?= base_url().'painel/' ?>editarNoticiaList">
						<div class="blocoDash b4">
							<i class="fad fa-check-circle"></i>
							<p>Aprovar Curso</p>
						</div>
					</a>
				</div>
				<div class="col-sm-6 col-12 p0">
					<a href="<?= base_url().'painel/' ?>adicionarNoticias">
						<div class="blocoDash b5">
							<i class="fad fa-user-circle"></i>
							<p>Ver e editar Usuário</p>
						</div>
					</a>
				</div>
				<div class="col-sm-3 col-12 p0">
					<a href="<?= base_url().'painel/' ?>apagarNoticiaList">
						<div class="blocoDash b6">
							<i class="fad fa-times"></i>
							<p>Apagar Usuário</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>