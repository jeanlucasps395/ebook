<section class="search">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="eb-season-one d-md-flex d-block">
                    <div class="eb-season-one__text--input">
                        <p>O que você gostaria de ler hoje?</p>
                        <input type="text" name="" id="searchCompnent" onkeyup="searchEbooks()" placeholder="Marketin Digital"><span><i class="fas fa-search"></i></span>
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

            <div class="col-12">
                <div class="eb-season-emphasis">
                    <h1>Promoções Comerciais em Andamento</h1>
                </div>

                 <!-- Slick jobson -->
                <ul class="eb-season-slick">

                    <?php foreach($cursos_destaque as $cursos){ ?> 
                    <li class="eb-season-slick__block">
                        <div class="eb-season-slick__img">
                            <!-- <img src="https://via.placeholder.com/50/243e66" alt=""> -->
                            <div style="background: url(<?php echo base_url('upload/cursos/curso_').$cursos['id_curso'].'/capa.png'; ?>) center center no-repeat;background-size: cover;width: 50px;height: 50px;border-radius: 50%; margin-right: 20px;"></div>
                            <span><?= $cursos['titulo']; ?></span>
                        </div>
                        <div class="eb-season-slick__avaliation">
                            <ul class="d-flex">
                                <span>Nota: </span>
                                <?php for($cont = 0; $cont < $cursos['avaliacao'] ; $cont++){ ?>
                                    <li><i class="yellow fas fa-star"></i></li>    
                                <?php } ?>
                                <!-- <li><i class="yellow-v2 fas fa-star"></i></li> -->
                            </ul>
                        </div>
                        <div class="eb-season-slick__prizeDraw">
                            <p>Sorteio: <span><?= $cursos['sorteio']; ?></span></p>
                        </div>
                        <div class="eb-season-slick__background" 
                             style="background: url(<?php echo base_url('upload/cursos/curso_').$cursos['id_curso'].'/capa.png'; ?>) center center no-repeat;background-size: cover; ">
                            <p class="eb-season-slick__background--text"> 
                                <a href="<?php echo base_url('home/pgCursos?id=').$cursos['id_curso']; ?>">Ler agora mesmo</a>
                            </p>
                        </div>
                        <div class="eb-season-slick__footer d-flex">
                            <div class="col-10">
                                <h6><a href="<?php echo base_url('home/pgCursos?id=').$cursos['id_curso']; ?>">Ver um pouco mais</a></h6>
                            </div>
                            <div class="col-2">
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </div>
                        </div>
                    </li>

                    <?php } ?>


                </ul>
                <!-- Slick jobson -->
            </div>

            <div class="col-12">
                <div class="eb-season-emphasis">
                    <h1>Outras Promoções comerciais</h1>
                </div>

                <!-- Slick jobson -->
                <ul class="eb-season-search">

                    <?php foreach($cursos_search_pag as $cursos_outros){ ?> 
                    <li class="eb-season-search__block">
                        <div class="eb-season-search__img">
                            <div style="background: url(<?php echo base_url('upload/cursos/curso_').$cursos_outros['id_curso'].'/capa.png'; ?>) center center no-repeat;background-size: cover;width: 50px;height: 50px;border-radius: 50%; margin-right: 20px;"></div>
                            <span><?= $cursos_outros['titulo']; ?></span>
                        </div>
                        <div class="eb-season-search__avaliation">
                            <ul class="d-flex">
                                <span>Nota: </span>
                                <?php for($cont = 0; $cont < $cursos_outros['avaliacao'] ; $cont++){ ?>
                                    <li><i class="yellow fas fa-star"></i></li>    
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="eb-season-search__prizeDraw">
                            <p>Sorteio: <span>Moto</span></p>
                        </div>
                        <div class="eb-season-slick__background" 
                        style="background: url(<?php echo base_url('upload/cursos/curso_').$cursos_outros['id_curso'].'/capa.png'; ?>) center center no-repeat;background-size: cover; ">
                            <p class="eb-season-search__background--text"> 
                                <a href="<?php echo base_url('home/pgCursos?id=').$cursos_outros['id_curso']; ?>">Ler agora mesmo</a>
                            </p>
                        </div>
                        <div class="eb-season-search__footer d-flex">
                            <div class="col-10">
                                <h6><a href="<?php echo base_url('home/pgCursos?id=').$cursos_outros['id_curso']; ?>">Ver um pouco mais</a></h6>
                            </div>
                            <div class="col-2">
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </div>
                        </div>
                    </li>

                    <?php } ?>

                </ul>
                <!-- Slick jobson -->
            </div>

        </div>
    </div>
</section>