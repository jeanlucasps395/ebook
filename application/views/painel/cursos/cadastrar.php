<style type="text/css">
	#form_cadastro_curso{
		width: 700px;
		padding: 30px 20px;
		margin: 0 auto;
		margin-top: 80px;
		border-radius: 10px; 
		box-shadow: 0px 0px 4px rgb(0,0,0,0.5);
	}
	#form_cadastro_curso label{
		width: 100%;
		font-weight: bolder;
		text-transform: capitalize;
	}
	#form_cadastro_curso input, textarea{
		width: 100%;
		margin-bottom: 20px;
		border-radius: 20px;
		border: 1px solid #666;
		padding: 5px 20px;
	}
	#form_cadastro_curso input[type='submit']{
		width: 250px;
		padding: 15px 5px;
		border-radius: 40px;
		border: none;
		/*box-shadow: 0px 0px 4px rgb(0,0,0,0.5);*/
		color-profile: box-shadow: 0px 0px 4px rgb(0,0,0,0.5);
		color: #000;
		background: #0DFF90;
		font-weight: bolder;
		margin: 0 auto;
		margin-top: 30px;
		cursor: pointer;
	}
	#form_cadastro_curso textarea{
		height: 90px;
	}
	.row{
		padding: 0 !important;
		margin: 0 !important;
	}
</style>

<div id="form_cadastro_curso">
	<form class="row" action="<?php echo base_url('painel/cadastrar_curso_form'); ?>" method="POST" enctype="multipart/form-data">
		<div class="col-md-12">
			<label>titulo </label>
			<input type="" name="titulo" placeholder="titulo" required="">
		</div>

		<div class="col-md-12">
		<label>descricao </label>
		<textarea type="" name="descricao" placeholder="descricao" required=""></textarea>
		</div>

		<div class="col-md-6">
		<label>capa </label>
		<input  type="file" id="files" name="capa">
		</div>

		<div class="col-md-6">
		<label>arquivo </label>
		<input type="file" name="ebook">
		</div>
		
		<!-- 
		<div class="col-md-12">
			<div>Espaço para previu</div>
		</div> -->

		<div class="col-md-6">
		<label>valor </label>
		<input type="" name="valor" placeholder="R$ 00,00">
		</div>

		<div class="col-md-6">
		<label>postador </label>
		<input type="" name="postador" placeholder="postador">
		</div>

		<div class="col-md-6">
		<label>sorteio </label>
		<input type="" name="sorteio" placeholder="sorteio">
		</div>

		<div class="col-md-6">
		<label>n_sorteio </label>
		<input type="" name="n_sorteio" placeholder="n_sorteio">
		</div>

		<input type="submit" name="" value="Cadastrar curso">
		

	</form>
</div>