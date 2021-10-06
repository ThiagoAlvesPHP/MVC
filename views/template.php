<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=(new Config())->get()['razao_social']; ?></title>
    <link rel="icon" href="<?=BASE.'assets/img/'.(new Config())->get()['favicon']; ?>" type="image/x-icon"/>
    <link rel="stylesheet" href="<?=BASE; ?>assets/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?=BASE; ?>assets/css/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?=BASE; ?>assets/dataTable/dataTable.css">
    <script type="text/javascript" src="<?=BASE; ?>assets/js/jquery.min.js"></script>
    <link rel="stylesheet/less" type="text/css" href="<?=BASE; ?>assets/css/styles.less" />
</head>
<body>

<nav id="menu" class="navbar navbar-default">
    <div class="container-fluid container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-left">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=BASE; ?>">
                        <i class="fas fa-tachometer-alt"></i>    
                        Dashboard
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <li class="dropdown registros">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                        <b>
                            <i class="far fa-user"></i> 
                            <?=(new Colaborador())->get($_SESSION['cLogin'])['nome']; ?>
                            <span class="caret"></span>
                        </b>
                    </a>
                    <!-- se usuario for master -->
                    <?php if((new Colaborador())->get($_SESSION['cLogin'])['id_definicao'] == 1): ?>
                        <ul class="dropdown-menu">
                            <li class="divider"></li>
                            <li><a href="<?=BASE; ?>colaborador">Meus dados</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=BASE; ?>colaborador/senha">Alterar senha</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=BASE; ?>home/sair">Sair</a></li>
                            <li class="divider"></li>
                        </ul>
                    <?php endif; ?>
                    <!-- se usuario for colaborador -->
                    <?php if((new Colaborador())->get($_SESSION['cLogin'])['id_definicao'] == 2): ?>
                        <ul class="dropdown-menu">
                            <li class="divider"></li>
                            <li><a href="<?=BASE; ?>nf/envio">Envio de notas e recebimento</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=BASE; ?>colaborador">Meus dados</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=BASE; ?>colaborador/senha">Alterar senha</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=BASE; ?>home/sair">Sair</a></li>
                            <li class="divider"></li>
                        </ul>
                    <?php endif; ?>
                </li>

                <!-- se usuario for master -->
                <?php if((new Colaborador())->get($_SESSION['cLogin'])['id_definicao'] == 1): ?>
                    <li class="nav-item menu-admin">
                        <a class="nav-link" href="<?=BASE; ?>colaborador/lista">
                            <i class="fas fa-users">
                                Colaboradores
                            </i>
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item menu-admin">
                        <a class="nav-link" href="<?=BASE; ?>config">
                            <i class="fas fa-cog">
                                Configurações
                            </i>
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>

<!-- Conteudos -->
<div class="container conteudo-centro">
    <?php $this->loadViewInTemplate($viewName, $viewData); ?>   
</div>

<!-- AQUI COLOCAREMOS O FOOTER -->
<script src="<?=BASE; ?>assets/js/bootstrap.min.js"></script>
<script src="<?=BASE; ?>assets/js/jquery.mask.js"></script>
<script src="<?=BASE; ?>assets/dataTable/dataTable.js"></script>
<script src="<?=BASE; ?>assets/js/config.js"></script>
<script src="https://cdn.jsdelivr.net/npm/less@4.1.1" ></script>
<script src="<?=BASE; ?>assets/js/scripts.js"></script>

</body>
</html>
