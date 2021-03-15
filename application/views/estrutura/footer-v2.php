<footer id="Contatos">
    <!-- Formulario  -->
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

                            <div class="footerContact-form__marg margCenter">
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
                <div class="col-md-6 col-sm-12 p0SM d-none d-md-block">
                    <div class="footerContact__espacemento">
                        <h2 class="footerContact__titulo">Cadastre-se</h2>
                        <h2 class="footerContact__titulo footerContact__titulo--V2">Faça o seu cadastro, compre e aprenda, concorra a <span>prêmios</span>.</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Formulario  -->

    <div class="footer-social-media">
        <i class="fab fa-instagram"></i>
        <i class="fab fa-facebook-f"></i>
        <i class="fab fa-twitter"></i>
    </div>

    <div class="footerMenu">
        <div class="widthPadrao">
            <div class="row">
                <div class="col-12 col-md-5">
                    <ul>
                        <li class="footerMenu__img"><img class="img-fluid" src="<?= base_url('style/'); ?>img/logo-footer.png" alt="logo"></li>
                        <div class="footerMenu__block">
                            <li class="footerMenu__block--btn">
                                <input placeholder="Digite seu email aqui" type="email" name="" id="">
                                <button>ok</button>
                            </li>
                        </div>
                    </ul>
                </div>
                <div class="col-12 col-md">
                    <ul class="footerMenu__block-two">
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
                    <ul class="footerMenu__block--info">
                        <li>Rua para testes 123, Arujá - São Paulo 07425-000</li>
                        <li>(11) 90000 - 0000</li>
                        <li>cartorio@gmail.com.br</li>
                        <li>Segunda a sexta das 10h00 as 19h00</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="footerDireitos">
        <p>Todos os direitos reservados</p>
    </div>


</footer>

</body>

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