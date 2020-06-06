<html>

<head>
    <title>ProAsilo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../icones/icone1.png">
    <link rel="stylesheet" href="../libs/materialDesignIcons.css">
    <link rel="stylesheet" href="../libs/bootstrap.min.css">
    <link rel="stylesheet" href="../libs/nav.css">
    <link rel="stylesheet" href="../libs/toastr.min.css">
    <link rel="stylesheet" href="./css.css">
    <script src="../libs/jquery.min.js"></script>
    <script src="../libs/bootstrap.min.js"></script>
    <script src="../libs/jquery.mask.min.js"></script>
    <script src="../libs/toastr.min.js"></script>
    <script src="../libs/nav.js"></script>
    <script src="./javascript.js"></script>
    <script src="../../controller/controller-cadastro.js"></script>
</head>

<body>
    <header>
        <div class="topBackground">
            <div class="mainNav">
                <div class="esquerdaNav">
                    <img src="../../view/icones/icone1-aparado.png" width="71" height="50">
                    <a class="navItens home" href="../../">
                        <div class="divNavItens">
                            <i class="material-icons iconsNav">home</i>
                            <div class="textNav">Início</div>
                        </div>
                    </a>
                    <a class="navItens doeja" href="../../view/doeja">
                        <div class="divNavItens">
                            <i class="material-icons iconsNav">monetization_on</i>
                            <div class="textNav">Doe já</div>
                        </div>
                    </a>
                </div>
                <div class="direitaNav">
                    <a class="navItens chat" href="../../view/chat">
                        <div class="divNavItens">
                            <i class="material-icons iconsNav">message</i>
                            <div class="textNav">Chat</div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="divIcone">
                <div class="tituloTela">TELA DE REGISTRO</div>
            </div>
        </div>
        </div>
    </header>
    <main>
        <div class="parte parte1">
            <div class="vcE">Você é?</div>
            <div class="conjunto">
                <div id="q1" onclick="irParte2('voluntario')" class="quadrado">VOLUNTÁRIO</div>
                <div id="q2" onclick="irParte2('instituicao')" class="quadrado">INSTITUIÇÃO</div>
                <div id="q3" onclick="irParte2('parceiro')" class="quadrado">PARCEIRO</div>
            </div>
        </div>
        <div class="parte parte2">
            <div class="voltar" onclick="irParte1()">Voltar</div>
            <div class="mainForm">
                <div voluntario instituicao parceiro class="form nome">
                    <div class="tdText">Nome completo:</div>
                    <input id="nome" class="campo" type="text" placeholder="Máximo de 50 caracteres">
                </div>
                <div voluntario instituicao parceiro class="form email">
                    <div class="tdText">Endereço de email:</div>
                    <input id="email" class="campo" type="email" placeholder="Email">
                </div>
                <div voluntario instituicao parceiro class="form">
                    <div class="tdText">Senha:</div>
                    <input id="senha" class="campo" type="password" placeholder="Digite sua senha">
                </div>
                <div voluntario instituicao parceiro class="form">
                    <div class="tdText">Confirmar senha:</div>
                    <input id="ConfirmarSenha" class="campo" type="password" placeholder="Confirme sua senha">
                </div>
                <div voluntario instituicao parceiro class="form email">
                    <div class="tdText">Unidade da federação:</div>
                    <select class="campo" id="uf">
                        <option>Acre</option>
                        <option>Amazonas</option>
                        <option>Roraima</option>
                        <option>Pará</option>
                        <option>Amapá</option>
                        <option>Tocantins</option>
                        <option>Maranhão</option>
                        <option>Piauí</option>
                        <option>Ceará</option>
                        <option>Rio Grande do Norte</option>
                        <option>Paraíba</option>
                        <option>Pernambuco</option>
                        <option>Alagoas</option>
                        <option>Sergipe</option>
                        <option>Bahia</option>
                        <option>Minas Gerais</option>
                        <option>Espírito Santo</option>
                        <option>Rio de Janeiro</option>
                        <option>São Paulo</option>
                        <option>Paraná</option>
                        <option>Santa Catarina</option>
                        <option>Rio Grande do Sul</option>
                        <option>Mato Grosso do Sul</option>
                        <option>Mato Grosso</option>
                        <option>Goiás</option>
                        <option>Distrito Federal</option>
                    </select>
                </div>
                <div voluntario instituicao parceiro class="form cidade">
                    <div class="tdText">Cidade:</div>
                    <input id="cidade" class="campo" type="text" placeholder="Cidade">
                </div>
                <div voluntario instituicao parceiro class="form bairro">
                    <div class="tdText">Bairro:</div>
                    <input id="bairro" class="campo" type="text" placeholder="Bairro">
                </div>
                <div voluntario instituicao parceiro class="form rua">
                    <div class="tdText">Rua:</div>
                    <input id="rua" class="campo" type="text" placeholder="Rua">
                </div>
                <div voluntario instituicao parceiro class="form numero">
                    <div class="tdText">Número:</div>
                    <input id="numero" class="campo" type="text" placeholder="Número">
                </div>
                <div voluntario class="form cpf">
                    <div class="tdText">CPF:</div>
                    <input id="cpf" class="campo" type="text" placeholder="Formato: xxx.xxx.xxx-xx">
                </div>
                <div voluntario class="form nascimento">
                    <div class="tdText">Data de nascimento:</div>
                    <input id="nascimento" class="campo" type="text" placeholder="Formato: xx/xx/xxxx">
                </div>
                <div voluntario class="form instituicaoEnsino">
                    <div class="tdText">Instituição de ensino:</div>
                    <input id="instituicaoEnsino" class="campo" type="text" placeholder="Máximo de 50 caracteres">
                </div>
                <div voluntario class="form escolaridade">
                    <div class="tdText">Escolaridade:</div>
                    <select class="campo" id="escolaridade">
                        <option>Sem escolaridade</option>
                        <option>Ensino fundamental incompleto</option>
                        <option>Ensino fundamental completo</option>
                        <option>Ensino médio incompleto</option>
                        <option>Ensino médio completo</option>
                        <option>Ensino superior incompleto</option>
                        <option>Ensino superior completo</option>
                    </select>
                </div>
                <div voluntario class="form semestre">
                    <div class="tdText">Semestre (caso em superior):</div>
                    <input id="semestre" class="campo" type="text" placeholder="Digite seu semestre, apenas números">
                </div>
                <div voluntario class="form graduacao">
                    <div class="tdText">Área de graduação:</div>
                    <select class="campo" id="graduacao">
                        <option>NENHUMA DAS OPÇÕES</option>
                        <option>Administração</option>
                        <option>Agronomia</option>
                        <option>Arqueologia</option>
                        <option>Arquitetura e Urbanismo</option>
                        <option>Arquivologia</option>
                        <option>Artes Visuais</option>
                        <option>Biblioteconomia</option>
                        <option>Biomedicina</option>
                        <option>Ciência da Computação</option>
                        <option>Ciências Atuariais</option>
                        <option>Ciências Biológicas</option>
                        <option>Ciências Contábeis</option>
                        <option>Ciências Econômicas</option>
                        <option>Ciências Naturais</option>
                        <option>Ciências Sociais</option>
                        <option>Cinema e Audiovisual</option>
                        <option>Dança</option>
                        <option>Design</option>
                        <option>Direito</option>
                        <option>Educação Física</option>
                        <option>Enfermagem</option>
                        <option>Engenharia Aeronáutica</option>
                        <option>Engenharia Agrícola</option>
                        <option>Engenharia Ambiental e Sanitária</option>
                        <option>Engenharia Cartográfica e de Agrimensura</option>
                        <option>Engenharia Civil</option>
                        <option>Engenharia de Alimentos</option>
                        <option>Engenharia de Bioprocessos</option>
                        <option>Engenharia de Computação</option>
                        <option>Engenharia de Controle e Automação</option>
                        <option>Engenharia de Materiais</option>
                        <option>Engenharia de Minas</option>
                        <option>Engenharia de Pesca</option>
                        <option>Engenharia de Petróleo</option>
                        <option>Engenharia de Produção</option>
                        <option>Engenharia de Telecomunicações</option>
                        <option>Engenharia Elétrica</option>
                        <option>Engenharia Eletrônica</option>
                        <option>Engenharia Florestal</option>
                        <option>Engenharia Mecânica</option>
                        <option>Engenharia Metalúrgica</option>
                        <option>Engenharia Naval</option>
                        <option>Engenharia Nuclear</option>
                        <option>Engenharia Química</option>
                        <option>Engenharia Têxtil</option>
                        <option>Estatística</option>
                        <option>Farmácia</option>
                        <option>Filosofia</option>
                        <option>Física</option>
                        <option>Fisioterapia</option>
                        <option>Fonoaudiologia</option>
                        <option>Geografia</option>
                        <option>Geologia</option>
                        <option>Gestão de Cooperativas</option>
                        <option>História</option>
                        <option>Informática</option>
                        <option>Jornalismo</option>
                        <option>LetrasLíngua Estrangeira</option>
                        <option>LetrasLíngua Portuguesa</option>
                        <option>Matemática</option>
                        <option>Medicina</option>
                        <option>Medicina Veterinária</option>
                        <option>Meteorologia</option>
                        <option>Museologia</option>
                        <option>Música</option>
                        <option>Nutrição</option>
                        <option>Odontologia</option>
                        <option>Pedagogia</option>
                        <option>Psicologia</option>
                        <option>Publicidade e Propaganda</option>
                        <option>Química</option>
                        <option>Radio</option>
                        <option>Relações Internacionais</option>
                        <option>Relações Públicas</option>
                        <option>Secretariado Executivo</option>
                        <option>Serviço Social</option>
                        <option>Sistemas da Informação</option>
                        <option>Teatro</option>
                        <option>Teologia</option>
                        <option>Terapia Ocupacional</option>
                        <option>Turismo</option>
                        <option>Zootecnia</option>
                    </select>
                </div>
                <div voluntario instituicao parceiro class="form objetivo">
                    <div class="tdText">Objetivo na plataforma:</div>
                    <input id="objetivo" class="campo" type="text" placeholder="Digite seu objetivo na plataforma">
                </div>
                <div voluntario class="form comentario">
                    <div class="tdText">Motivos que o levaram a ser um voluntário:</div>
                    <input id="comentario" class="campo" type="text" placeholder="Digite o(s) motivo(s)">
                </div>
                <div instituicao parceiro class="form cnpj">
                    <div class="tdText">CNPJ:</div>
                    <input id="cnpj" class="campo" type="text" placeholder="Digite seu CNPJ">
                </div>
                <div instituicao class="form fundacao">
                    <div class="tdText">Data de fundação da instituição:</div>
                    <input id="fundacao" class="campo" type="text" placeholder="Digite a data de fundação da instituição">
                </div>
                <div instituicao class="form idosos">
                    <div class="tdText">Número de idosos:</div>
                    <input id="idosos" class="campo" type="text" placeholder="Digite o número de idosos">
                </div>
                <div instituicao parceiro class="form funcionario">
                    <div class="tdText">Número de funcionários:</div>
                    <input id="funcionarios" class="campo" type="text" placeholder="Digite o número de funcionários">
                </div>
                <div instituicao class="form projetos">
                    <div class="tdText">Projetos em andamento:</div>
                    <input id="projetos" class="campo" type="text" placeholder="Quantidade de projetos em andamento">
                </div>
                <div instituicao class="form faixa">
                    <div class="tdText">Faixa etária atendida:</div>
                    <input id="faixa" class="campo" type="text" placeholder="Formato: xx-xx">
                </div>
                <div instituicao parceiro class="form">
                    <div class="tdText">Descreva sua instituição ou empresa:</div>
                    <input id="descricao" class="campo" type="text" placeholder="Descreva sua instituição ou empresa">
                </div>
                <div instituicao class="form">
                    <div class="tdText">Agência:</div>
                    <input id="agencia" class="campo" type="text" placeholder="Digite sua agência">
                </div>
                <div instituicao class="form">
                    <div class="tdText">Conta corrente:</div>
                    <input id="cc" class="campo" type="text" placeholder="Digite sua conta corrente">
                </div>
                <h2 class="erro"></h2>
                <button class="botao btn btn-success" onclick="cadastrarUsuario();">Finalizar registro</button>
            </div>
        </div>
    </main>
    <footer>
        <h6 class="copyright">Copyright © - ProAsilo</h6>
        <h6 class="contato">contato@proasilo.com.br</h6>
    </footer>
</body>

</html>