<section class="home">
    <div class="container">
        <div class="row">
            <div class="eb-season-one d-md-flex d-block">
                <div class="eb-season-one__img col-12 col-md-6">
                    <img src="<?= base_url(); ?>/style/img/bg-curso.png">
                    <!-- <img src="https://via.placeholder.com/485x642/243e66"> -->
                    <div class="eb-season-one__img--text">
                        <h3>Promoções Comerciais em Andamento e sorteios</h3>
                        <a href="<?= base_url('home/search'); ?>"><button>Ver agora</button></a>
                    </div>
                    <!-- <h6>Sorteio ou E-book destaque</h6> -->
                </div>
                <div class="eb-season-one__text col-12 col-md-6">
                    <div class="eb-season-one__text--title">
                        <h2>Lorem ipsum dolor site sit amet, consectetur adipiscin ag elit, sebde</h2>
                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, seb do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim vem"</p>
                    </div>
                    <a href="<?= base_url('home/search'); ?>"><button class="btn-principal">Promoção Comercial</button></a>
                    <div class="eb-season-one__text--input">
                        <p>O que você gostaria de ler hoje?</p>
                        <input type="text" name="" onkeyup="searchEbooks()" id="searchCompnent" placeholder="Marketin Digital"><span><i class="fas fa-search"></i></span>
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
                    <div id="FieldsSearchsContent">
                        <div class="eb-season-one__seach" >
                            <ul id="searchFields">
                               <!--  <li>
                                    <h1>Engenharia da computação</h1>
                                    <div class="eb-season-slick__avaliation">
                                        <ul class="d-flex">
                                            <span><strong>Nota: </strong></span>
                                            <li><i class="yellow fas fa-star"></i></li>
                                            <li><i class="yellow fas fa-star"></i></li>
                                            <li><i class="yellow fas fa-star"></i></li>
                                            <li><i class="yellow fas fa-star"></i></li>
                                            <li><i class="yellow-v2 fas fa-star"></i></li>
                                        </ul>
                                    </div>
                                </li> -->
                            </ul>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="eb-button-scroll">
                    <i class="fas fa-angle-down"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="eb-season-emphasis">
                    <h1>Promoções Comerciais em Andamento</h1>
                </div>

                <!-- Slick jobson -->
                <ul class="eb-season-slick">

                    <?php foreach ($cursos_destaque as $cursos) { ?>
                        <li class="eb-season-slick__block">
                            <div class="eb-season-slick__img">
                                <!-- <img src="https://via.placeholder.com/50/243e66" alt=""> -->
                                <div style="background: url(<?php echo base_url('upload/cursos/curso_') . $cursos['id_curso'] . '/capa.png'; ?>) center center no-repeat;background-size: cover;width: 50px;height: 50px;border-radius: 50%; margin-right: 20px;"></div>
                                <span><?= $cursos['titulo']; ?></span>
                            </div>
                            <div class="eb-season-slick__avaliation">
                                <ul class="d-flex">
                                    <span>Nota: </span>
                                    <?php for ($cont = 0; $cont < $cursos['avaliacao']; $cont++) { ?>
                                        <li><i class="yellow fas fa-star"></i></li>
                                    <?php } ?>

                                    <!-- <li><i class="yellow-v2 fas fa-star"></i></li> -->
                                </ul>
                            </div>
                            <div class="eb-season-slick__prizeDraw">
                                <p>Sorteio: <span><?= $cursos['sorteio']; ?></span></p>
                            </div>
                            <div class="eb-season-slick__background" style="background: url(<?php echo base_url('upload/cursos/curso_') . $cursos['id_curso'] . '/capa.png'; ?>) center center no-repeat;background-size: cover; ">
                                <p class="eb-season-slick__background--text">
                                    <a href="<?php echo base_url('home/pgCursos?id=') . $cursos['id_curso']; ?>">Ver agora mesmo</a>
                                </p>
                            </div>
                            <div class="eb-season-slick__footer d-flex">
                                <div class="col-10">
                                    <h6><a href="<?php echo base_url('home/pgCursos?id=') . $cursos['id_curso']; ?>">Ver um pouco mais</a></h6>
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

<section>
    <div class="container-fluid eb-season-think">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>O que nossos parceiros pensam?</h1>
                    <ul class="d-md-flex d-block">
                        <li class="eb-season-think__block">
                            <div class="eb-season-think__img">
                                <img src="https://via.placeholder.com/50/243e66" alt=""><span>Ana Clara</span>
                            </div>
                            <div class="eb-season-think__avaliation">
                                <ul class="d-flex">
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                            <div class="eb-season-think__comment">
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim vem"
                            </div>
                        </li>
                        <li class="eb-season-think__block">
                            <div class="eb-season-think__img">
                                <img src="https://via.placeholder.com/50/243e66" alt=""><span>Ana Clara</span>
                            </div>
                            <div class="eb-season-think__avaliation">
                                <ul class="d-flex">
                                    <li><i class="yellow fas fa-star"></i></li>
                                    <li><i class="yellow fas fa-star"></i></li>
                                    <li><i class="yellow fas fa-star"></i></li>
                                    <li><i class="yellow fas fa-star"></i></li>
                                    <li><i class="yellow-v2 fas fa-star"></i></li>
                                </ul>
                            </div>
                            <div class="eb-season-think__comment">
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim vem"
                            </div>
                        </li>
                        <li class="eb-season-think__block">
                            <div class="eb-season-think__img">
                                <img src="https://via.placeholder.com/50/243e66" alt=""><span>Ana Clara</span>
                            </div>
                            <div class="eb-season-think__avaliation">
                                <ul class="d-flex">
                                    <li><i class="yellow fas fa-star"></i></li>
                                    <li><i class="yellow fas fa-star"></i></li>
                                    <li><i class="yellow fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                </ul>
                            </div>
                            <div class="eb-season-think__comment">
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim vem"
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container-fluid eb-season-fluxograma">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <img src="<?= base_url(); ?>/style/img/INFLUENCERS.png">
                </div>
                <div class="col-6">
                    <div class="container-fluid eb-season-think" style="background: #fff">
                        <div class="container">
                            <div class="row">
                            <div class="col-12">
                                <h1>Como funciona a RAGA?</h1>
                            </div>
                        </div>
                    </div>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>