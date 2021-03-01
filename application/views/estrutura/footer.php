<footer id="Contatos">
    <div class="footerContact">
        <div class="widthPadrao">
            <div class="row">
                <div class="col-md-7 col-sm-12 p0SM">
                    <div class="footerContact__espacemento">
                        <h2 class="footerContact__titulo">Escreva uma mensagem para nós, retornaremos o contato o mais rápido possível.</h2>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 p0SM">
                    <div class="footerContact-form">
                        <h3 class="footerContact-form__titulo">Diga olá.</h3>
                        <p>Digite sua mensagem logo a baixo.</p>
                        <div id="formRodape">
                            <div class="footerContact-form__marg">
                                <label class="footerContact-form__label">Nome</label>
                                <input class="footerContact-form__input" type="" name="" placeholder="nome" id="nomelCliente">
                            </div>

                            <div class=" footerContact-form__marg">
                                <label class="footerContact-form__label">Email</label>
                                <input class="footerContact-form__input" type="" name="" placeholder="email" id="emailCliente">
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



<script type="text/javascript">

    var erro = false;

    function enviarEmailRodape(){
        var nomelCliente = $('#nomelCliente').val();
        var emailCliente = $('#emailCliente').val();
        var mensagem = $('#mensagem').val();

        if(nomelCliente.length == 0){
            $('#nomelCliente').css('border-color','#f3a800');
            return false;
        } 
        else{
            $('#nomelCliente').css('border-color','#fff');
        }
        if(emailCliente == 0 ){
            $('#emailCliente').css('border-color','#f3a800');
            return false;
        }
        else{
            $('#emailCliente').css('border-color','#fff');
        }
        if( mensagem == 0){
            $('#mensagem').css('border-color','#f3a800');
            return false;
        }
        else{
            $('#mensagem').css('border-color','#fff');
        }


        var settings = {
            "async": true,
            "crossDomain": true,
            "url" : "<?= base_url(); ?>home/emailrodape",
            "method": "POST",
            "data" :{
                'nomelCliente' : nomelCliente,
                'emailCliente' : emailCliente,
                'mensagem' : mensagem
            }
          }
        $.ajax(settings).done(function (response) {
            $('#formRodape').css('display','none');
            $('#emailEnviado').css('display','block');
        });
            
    }
    





</script>


  