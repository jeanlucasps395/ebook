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
                        <img src="<?= base_url(); ?>/style/img/bg-curso.png">
                        <div class="eb-season-one__img--text">
                            <h3>Engenharia da computação</h3>
                            <!-- <button>Ler agora</button> -->
                        </div>
                    </div>
                    <div class="eb-season-one__text col-12 col-md-6">
                        <div class="eb-season-one__text--title">
                            <h2>Descrição do produto</h2>
                            <strong>Tema:</strong><span>Engenharia da computação</span>

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
                            <div class="eb-season-slick__prizeDraw">
                                <p>Sorteio: <span>Moto</span></p>
                            </div>
                            <small>
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididuntad
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in sas
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat d
                                non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                            </small>
                        </div>

                        <div class="eb-season-price">
                            <h1><strong>Preço: R$ 20,<span>90</span></strong></h1>
                            <?php if($this->session->userdata('email') != null){?>
                                <!-- go to checkout, but open de modal now -->
                                <button class="btn-principal" onclick="oepnModalLook()">Comprar</button>
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
