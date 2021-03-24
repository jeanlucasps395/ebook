<section class="pgCursos">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="eb-season-one d-md-flex d-block">
                    <div class="eb-season-one__text--input">
                        <p>O que você gostaria de ler hoje?</p>
                        <input type="text" name="" id="" placeholder="Marketin Digital"><span><i class="fas fa-search"></i></span>
                    </div>
                    <div class="eb-season-one__seach">
                        <ul>
                            <li>
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
                            </li>
                            <li>
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
                            </li>
                            <li>
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
                            </li>
                        </ul>
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
                        <div style="background: url(<?php echo base_url('upload/cursos/curso_').$curso['id_curso'].'/capa.png'; ?>) center center no-repeat;background-size: cover;
                              width: 485px;height: 642px; margin-right: 20px;"></div>
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
                                    <?php for($cont = 0; $cont < $curso['avaliacao'] ; $cont++){ ?>
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
                            <?php if($this->session->userdata('email') != null){?>
                                <!-- go to checkout, but open de modal now -->
                                <!-- <button class="btn-principal" onclick="oepnModalLook()">Comprar</button> -->
                                <a href="<?= base_url(); ?>home/checkout?id=<?= $curso['id_curso']; ?>"><button class="btn-principal" type="button">Comprar</button></a>
                            <?php }else{ ?>
                                <button class="btn-principal" onclick="requestLogin()">Comprar</button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</section>
