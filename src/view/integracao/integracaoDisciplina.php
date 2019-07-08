<html>

<head>

    <?php
        include("../layouts/head.php");
        require_once 'functions/FuncoesIntegracao.php';
        require_once("../../dbconf/db.php");//Contiene las variables de configuracion para conectar a la base de datos
        require_once("../../dbconf/conexion.php");//Contiene funcion que conecta a la base de datos
    ?>

    <title>Recebendo dados do esira</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <!--   <link href="css/estilo.css" rel="stylesheet" type="text/css"/> -->
    <script src="js/jquery.js" type="text/javascript"></script>

    <script src="js/pace.min.js" type="text/javascript"></script>

    <script src="js/jquery.tablesorter.js" type="text/javascript"></script>
    <script type="text/javascript" src="../libs/jQuery/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../libs/jQuery/js/jquery-1.11.3.js"></script>
    <script src="../_assets/js/jquery-1.8.3.min.js"></script>
    <script src="../libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="../_assets/js/jquery.mobile-1.4.3.min.js"></script>

    <link href="../libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../_assets/css/jquery.mobile-1.4.3.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="../css/estudante_style.css" type="text/css">
    <link href="header/css/templatemo_style.css"  rel='stylesheet' type='text/css'>
    <link href="header/css/css_mystyle.css"  rel='stylesheet' type='text/css'>
    <script type="text/javascript">

        //Chama a função tablesorter, plugin do jQuery
        $(function() {
            $("#clientes").tablesorter({
                debug: true
            });
        });


    </script>

    <style>p.alinha{padding-left: 8.0em}</style>

</head>

<body>
<?php

    $funcoes = new FuncoesIntegracao();
    $data = $funcoes->buscarDadosNoEsiraDisciplina();

    $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    if($action == 'ajax') {

    ?>
    <div class="table-responsive container">

        <div class="row">
            <div class="col-md-6 pull-left">
                LISTA DE DISCIPLINAS
            </div>

            <div class="col-md-4 pull-right">
                <button data-toggle='tab' title="GUARDAR LISTA" class='btn btn-warning'
                        onclick="botaoDisciplinas(1)" value="">
                    <span class='glyphicon glyphicon-save'>INTEGRAR</span>
                </button>
            </div>

        </div>
    <table class="table">


    <tr>
        <th><p class="alinha">Codigo</p></th>
        <th><p class="alinha">Nome da Disciplina</p></th>
        <th><p class="alinh">Ano Academico</p></th>
        <th><p class="alinha">Creditos</p></th>
    </tr>

<?php

    foreach ($data as $c) {//cria a classe de tratamento

        //Define as arrays

        $id = $c->codigo;
        $nome = $c->nome;
        $nivel = $c->nivel;
        $vlr = $c->credito;
        $idcurso = $c->curso;

        $valor = number_format($vlr, 2, ',', '');
        ?>

        <tr id="<?php echo $id; /*pubica as informações na tabela>*/?>">
            <td width="200px"><?php echo $id; ?></td>
            <td width="200px"><?php echo $nome; ?></td>
            <td width="200px"><?php echo $nivel; ?></td>
            <td align="right" width="180px"><?php echo $valor; ?>
        </tr>

        <?php
    }
    ?>

    </table>
    </div>
<?php }else{
        $funcoes->listaDeDisciplinas();
    }?>
</body>
</html>