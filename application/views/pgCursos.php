<section class="pgCursos">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="eb-season-one d-md-flex d-block">
                    <div class="eb-season-one__text--input">
                        <p>O que você gostaria de ler hoje?</p>
                        <input type="text" name="" id="searchCompnent" onkeyup="searchEbooks()" placeholder="Marketin Digital"><span><i class="fas fa-search"></i></span></span>
                    </div>
                    

                     <!-- Search cursos -->
                      <script type="text/javascript">
                        function searchEbooks() {
                          let search = document.getElementById('searchCompnent').value;
                          if(search.length > 2){
                              var settings = {
                                "async": true,
                                "crossDomain": true,
                                "url": "<?php echo base_url('home/buscarCursos'); ?>",
                                "method": "POST",
                                "headers": {
                                  "cache-control": "no-cache",
                                },
                                "data": {
                                  "search": search
                                }
                              }
                              $.ajax(settings).done(function(response) {
                                    // console.log(JSON.parse(response));
                                    response = JSON.parse(response);
                                    $('#searchFields').html(' ');
                                    response.forEach(populationList);
                                    $('#FieldsSearchsContent').css('display','block');
                              });
                          }else{
                            $('#FieldsSearchsContent').css('display','none');
                          }
                        }

                        function populationList(item){
                            console.log(item);
                            
                            var curso = '<li onclick="redirectEbook('+item.id_curso+')">'+
                                '<h1>'+item.titulo+'</h1>'+
                                '<div class="eb-season-slick__avaliation">'+'<ul class="d-flex">'+'<span><strong>Nota: </strong></span>';

                            
                           if(item.avaliacao > 4) var curso_avaliacao = '<li><i class="yellow fas fa-star"></i></li><li><i class="yellow fas fa-star"></i></li><li><i class="yellow fas fa-star"></i></li><li><i class="yellow fas fa-star"></i></li><li><i class="yellow fas fa-star"></i></li>';
                           else if(item.avaliacao == 4) var curso_avaliacao = '<li><i class="yellow fas fa-star"></i></li><li><i class="yellow fas fa-star"></i></li><li><i class="yellow fas fa-star"></i></li><li><i class="yellow fas fa-star"></i></li>';
                           else if(item.avaliacao == 3) var curso_avaliacao = '<li><i class="yellow fas fa-star"></i></li><li><i class="yellow fas fa-star"></i></li><li><i class="yellow fas fa-star"></i></li>';
                           else if(item.avaliacao == 2) var curso_avaliacao = '<li><i class="yellow fas fa-star"></i></li><li><i class="yellow fas fa-star"></i></li>';
                           else var curso_avaliacao = '<li><i class="yellow fas fa-star"></i></li>';
                           var curso_end = '</ul>'+'</div>'+'</li>';

                           $('#searchFields').append(curso+curso_avaliacao+curso_end);
                        }
                        function redirectEbook(id){
                            var url = "<?php echo base_url('home/pgCursos'); ?>" + "?id=" + id;
                            window.location.href = url;
                        }
                    </script>
                   

                   <div id="FieldsSearchsContent" >
                        <div class="eb-season-one__seach" >
                            <ul id="searchFields">
                            
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="eb-season-emphasis">
                        <h1>Engenharia da computação</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="description">
        <div class="container">
            <div class="row">
                <div id="season" class="eb-season-one d-md-flex d-block">
                    <div class="eb-season-one__img col-12 col-md-6">
                        <!-- <img src="https://via.placeholder.com/485x642/243e66"> -->
                        <!-- <img src="<?= base_url(); ?>/style/img/bg-curso.png"> -->
                        <div class="eb-season-one__img-block" style="background: url(<?php echo base_url('upload/cursos/curso_') . $curso['id_curso'] . '/capa.png'; ?>) center center no-repeat;background-size: cover;"></div>
                        <div class="eb-season-one__img--text">
                            <h3><?= $curso['titulo']; ?></h3>
                            <!-- <button>Ler agora</button> -->
                        </div>
                    </div>
                    <div class="eb-season-one__text col-12 col-md-6">
                        <div class="eb-season-one__text--title">
                            <h2>Descrição do produto</h2>
                            <strong>Tema:</strong><span><?= $curso['titulo']; ?></span>

                            <div class="eb-season-slick__avaliation">
                                <ul class="d-flex">
                                    <span><strong>Nota: </strong></span>
                                    <?php for ($cont = 0; $cont < $curso['avaliacao']; $cont++) { ?>
                                        <li><i class="yellow fas fa-star"></i></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="eb-season-slick__prizeDraw">
                                <p>Sorteio: <span><?= $curso['sorteio']; ?></span></p>
                            </div>
                            <small>
                                <?= $curso['descricao']; ?>
                            </small>
                        </div>

                        <div class="eb-season-price">
                            <h1><strong>Preço: R$ <?= $curso['valor']; ?>,<span>00</span></strong></h1>
                            <?php if ($this->session->userdata('email') != null) { ?>
                                <!-- go to checkout, but open de modal now -->
                                <!-- <button class="btn-principal" onclick="oepnModalLook()">Comprar</button> -->
                                <a href="<?= base_url(); ?>home/checkout?id=<?= $curso['id_curso']; ?>"><button class="btn-principal" type="button">Comprar</button></a>
                            <?php } else { ?>
                                <button class="btn-principal" onclick="requestLogin()">Comprar</button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</section>