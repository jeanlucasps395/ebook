<footer id="Contatos">
    <div class="footerContact">
        <div class="widthPadrao">
            <div class="row">
                <div class="col-md-6 col-sm-12 p0SM">
                    <div class="footerContact-form">                        
                        <div id="formRodape">
                            <div class="footerContact-form__marg">
                                <label class="footerContact-form__label">Nome</label>
                                <input class="footerContact-form__input" type="text" name="" placeholder="nome" id="nomelCliente">
                            </div>

                            <div class=" footerContact-form__marg">
                                <label class="footerContact-form__label">Email</label>
                                <input class="footerContact-form__input" type="email" name="" placeholder="email" id="emailCliente">
                            </div>

                            <div class=" footerContact-form__marg">
                                <label class="footerContact-form__label">CPF</label>
                                <input class="footerContact-form__input" type="text" name="" placeholder="cpf" id="cpfCliente">
                            </div>

                            <div class=" footerContact-form__marg">
                                <label class="footerContact-form__label">Telefone</label>
                                <input class="footerContact-form__input" type="text" name="" placeholder="tel" id="telCliente">
                            </div>

                            <div class=" footerContact-form__marg">
                                <label class="footerContact-form__label">Senha</label>
                                <input class="footerContact-form__input" type="password" name="" placeholder="Senha" id="SenhaCliente">
                            </div>

                            <div class="footerContact-form__marg">
                                <label class="footerContact-form__label">Mensagem</label>
                                <textarea class="footerContact-form__input footerContact-form__input--textarea" id="mensagem"></textarea>
                            </div>

                            <div class="footerContact-form__marg">
                                <button class="footerContact-form__button" onclick="enviarEmailRodape()">Enviar</button>
                            </div>
                        </div>
                        <div class="emailEnviado" id="emailEnviado">
                            <h2 class="footerContact__titulo">
                                <i class="fad fa-badge-check"></i>
                            </h2>
                            <p class="footerContact__subtitulo--footer">Email enviado com sucesso.</p>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 col-sm-12 p0SM">
                    <div class="footerContact__espacemento">
                        <h2 class="footerContact__titulo">Escreva uma mensagem para nós, retornaremos o contato o mais rápido possível.</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="footerMenu">
        <div class="widthPadrao">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <h4 class="footerMenu__titulo">Telefone</h4>
                    <p class="footerMenu__item">(11) 2229-8984</p>
                    <p class="footerMenu__item">(11) 2891-1953</p>
                </div>
                <div class="col-md-4 col-sm-12">
                    <h4 class="footerMenu__titulo">Email</h4>
                    <p class="footerMenu__item">atendimento@ebook.com.br</p>
                </div>
                <div class="col-md-4 col-sm-12">
                    <h4 class="footerMenu__titulo">Lojas</h4>
                    <p class="footerMenu__item">Arujá</p>
                    <p class="footerMenu__item">Guarulhos</p>
                </div>
            </div>
        </div>
        <div class="">
            <h2 class="footerMenu__titulo footerMenu__titulo--icons">Redes sociais</h2>
            <h2 class="footerMenu__titulo ">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
            </h2>
        </div>
    </div>


    <div class="footerDireitos">
        <p>Todos os direitos reservados</p>
    </div>


</footer>

</body>

<!-- <section>
    <div class="mm-background">
        <div class="container">
            <div class="row">
                <div class="mm-background__block">
                    <div class="mm-background__form">
                        <form action="#">
                            <label for="" class="name">
                                Nome
                            </label>
                            <input type="text" name="" id="" placeholder="Quem devemos procurar?">
                            <label for="" class="email">
                                Email
                            </label>
                            <input type="email" name="" id="" placeholder="nos diga seu melhor email">
                            <label for="" class="tel">
                                Telefone
                            </label>
                            <input type="tel" name="" id="" placeholder="Nos diga seu telefone">
                            <label for="">Mensagem</label>
                            <textarea style="resize: none" name="" id="" cols="30" rows="10" placeholder="Fale um pouco mais aqui..."></textarea>
                            <div class="mm-background__form-block">
                                <button class="mm-background__form-block--btn" type="submit">Enviar
                                    Mensagem</button>
                            </div>
                        </form>
                    </div>
                    <div class="mm-background__content">
                        <div class="mm-background__line">
                        </div>
                        <div class="mm-background__text">
                            <h1>
                                Diga<br>
                                <strong>Olá!</strong>
                                <p>Entre em contato para<br>
                                    mais informações</p>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="mm-social-media">
        <i class="fab fa-instagram"></i>
        <i class="fab fa-facebook-f"></i>
        <i class="fab fa-twitter"></i>
    </div>
</section>
</main> -->


<!-- <div class="overlay"></div> -->


<!-- <footer>
    <div class="container">
        <div class="mm-footer">
            <div class="col-12 col-md-5">
                <ul>

                    <li><img class="img-fluid" src="<?= base_url('style/'); ?>img/logo.png" alt="logo"></li>

                    <div class="mm-footer__block">
                        <li class="mm-footer__block--title">Receber notícias por email</li>
                        <li class="mm-footer__block--btn">
                            <input placeholder="Digite seu email aqui" type="email" name="" id="">
                            <button>ok</button>
                        </li>
                    </div>
                </ul>
            </div>
            <div class="col-12 col-md">
                <ul class="mm-footer__block-two">
                    <li>
                        <a href="">
                            Artigos
                    </li>
                    </a>
                    <li>
                        <a href="">
                            Marcas
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Contato
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Precisa de ajuda?
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Veículos
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-5">
                <ul class="mm-footer__block--info">
                    <li>Rua para testes 123, Arujá - São Paulo 07425-000</li>
                    <li>(11) 90000 - 0000</li>
                    <li>m3motors@m3otors.com.br</li>
                    <li>Segunda a sexta das 10h00 as 19h00</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mm-block-end">
        © 2020 Todos os direitos reservados.
    </div>

</footer> -->



<script type="text/javascript">
    var erro = false;

    function enviarEmailRodape() {
        var nomelCliente = $('#nomelCliente').val();
        var emailCliente = $('#emailCliente').val();
        var mensagem = $('#mensagem').val();

        if (nomelCliente.length == 0) {
            $('#nomelCliente').css('border-color', '#f3a800');
            return false;
        } else {
            $('#nomelCliente').css('border-color', '#fff');
        }
        if (emailCliente == 0) {
            $('#emailCliente').css('border-color', '#f3a800');
            return false;
        } else {
            $('#emailCliente').css('border-color', '#fff');
        }
        if (mensagem == 0) {
            $('#mensagem').css('border-color', '#f3a800');
            return false;
        } else {
            $('#mensagem').css('border-color', '#fff');
        }


        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "<?= base_url(); ?>home/emailrodape",
            "method": "POST",
            "data": {
                'nomelCliente': nomelCliente,
                'emailCliente': emailCliente,
                'mensagem': mensagem
            }
        }
        $.ajax(settings).done(function(response) {
            $('#formRodape').css('display', 'none');
            $('#emailEnviado').css('display', 'block');
        });

    }
</script>

</html>