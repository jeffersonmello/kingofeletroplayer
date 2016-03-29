<?php
ob_start();
ini_set( 'display_errors', true );
error_reporting( E_ALL );



$pagina     = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
$pc = $pagina;
$guidEdit;
$guidDelete;
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <!-- Basic Page Needs
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Admin King of Eletro | Cadastro de Playlist</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- Scripts Data Tables
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" media="screen" charset="utf-8">
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Email: </strong>
                    &nbsp;&nbsp;
                    <strong>Support: </strong>
                </div>

            </div>
        </div>
    </header>
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                </a>

            </div>



            <?php
              include('config.php');
              $userlogadon = ($_COOKIE['usuariologado']);
              $senhalogadon = ($_COOKIE['senhalogado']);


            //  $userlogadon = decryptIt($userlogadon);
            // $senhalogadon = decryptIt($senhalogadon);

              mysql_select_db($bd, $conexao);
              $sql = mysql_query("select * from usuario where usuario='$userlogadon' AND senha='$senhalogadon'");
              while($linha = mysql_fetch_array($sql)){
              $nomeLog= $linha["nome"];
              $tipoLog= $linha["tipo"];
              $jobLog= $linha["job"];
              $nivelLog= $linha["nivel"];
            }
            ?>

                        <div class="left-div">
                            <div class="user-settings-wrapper">
                                <ul class="nav">

                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                            <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-settings">
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="assets/img/user.png" alt="" class="img-rounded" />
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><?php echo $nomeLog?></h4>
                                                    <h5><?php echo $jobLog?></h5>

                                                </div>
                                            </div>
                                            <hr />
                                            <h5><strong>Nivel : </strong></h5>
                                            <?php echo $nivelLog?>
                                            <hr />
                                            <a href="#" class="btn btn-info btn-sm">Perfil</a>&nbsp; <a href="logout.php" class="btn btn-danger btn-sm">Sair</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a  href="index.php">Dashboard</a></li>
                            <li class="dropdown">
                              <a class="dropdown-toggle menu-top-active" data-toggle="dropdown" href="#">Cadastros
                              <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a class="menu-section" href="cad_musicahome.php">Cadastro de Música Home</a></li>
                                <li><a class="menu-section menu-top-active" href="cad_playlist.php">Cadastro de PlayList</a></li>
                                <li><a class="menu-section" href="cad_download.php">Cadastro de Downloads</a></li>
                                <li><a class="menu-section" href="cad_usuarios.php">Cadastro de Usuários</a></li>
                                <li><a class="menu-section" href="#">Cadastro de Noticias</a></li>
                              </ul>
                            </li>
                            <li><a href="ligaradio.php">Ligar Radio</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Playlist</h4>
                </div>

            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                  <div class="panel-body">
                    <div id="main" class="container-fluid">
                        <div id="top" class="row">
                          <div class="col-md-3">
                                 <h2>Playlists</h2>
                             </div>


                    <form name="pesquisa" id="pesquisa" method="post" action="">
                             <div class="col-md-6">
                                 <div class="input-group h2">
                                     <input name="search" class="form-control" id="search" type="text" placeholder="Pesquisar" onchange="mainInfo(this.value);">
                                     <span class="input-group-btn">
                                         <button class="btn btn-primary" type="submit">
                                             <span class="glyphicon glyphicon-search"></span>
                                         </button>
                                     </span>
                                 </div>
                             </div>
                    </form>

                             <div class="col-md-3">
                              <a href="add.html" class="btn btn-primary pull-right h2" data-toggle="modal" data-target="#myModal" >Nova Música</a>
                             </div>
                        </div> <!-- /#top -->

                        <hr />

                        <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
                        <script type="text/javascript" src="DataTables/datatables.min.js"></script>

        <script type="text/javascript">
        jQuery(document).ready( function ()
        {
            var table = $('#reg').DataTable();

        });
    </script>
                              <div class="table-responsive col-md-12">
                                  <table id="reg" class="table table-hover table-bordered" cellspacing="0" cellpadding="0">
                                      <thead>
                                          <tr>
                                              <th>#</th>
                                              <th>Titulo</th>
                                              <th>Artista</th>
                                              <th>Album </th>
                                              <th>Link Play</th>
                                              <th>Link Download</th>
                                              <th class="actions">Ações</th>
                                           </tr>
                                      </thead>
                                      <tbody>
<?
                    include "config.php";
                    $total_reg = "30";

                    $guidEdit = "0";
                    $guidDelete = "0";

                    $inicio = $pc - 1;
                    $inicio = $inicio * $total_reg;

                    $sql = mysql_query("SELECT * FROM musicas_playlist LIMIT $inicio,$total_reg");
                    $tr = mysql_num_rows($sql); // verifica o número total de registros
                    $tp = $tr / $total_reg; // verifica o número total de páginas


                    while($linha = mysql_fetch_array($sql)){
                    $guid1= $linha["guid"];
                    $arte1= $linha["arte_album"];
                    $titulo1= $linha["titulo"];
                    $artista1= $linha["artista"];
                    $album1 = $linha["album"];
                    $linkplay1= $linha["linkplay"];
                    $linkdownload1 = $linha["linkdownload"];

                    $guidEdit = ($guid1 +50);
                    $guidDelete = ($guid1 +100);

// Tabela
                    echo  "<tr>";
                    echo  "<td>$guid1</td>";
                    echo  "<td>$titulo1</td>";
                    echo  "<td>$artista1</td>";
                    echo  "<td>$album1</td>";
                    echo  "<td>$linkplay1</td>";
                    echo  "<td>$linkdownload1</td>";
                    echo  "<td class='actions'>";
                    echo  "<a class='btn btn-success btn-xs glyphicon glyphicon-eye-open' href='view.html' data-toggle='modal' data-target='#$guid1'></a>";
                    echo  "<a> </a>";
                    echo  "<a class='btn btn-warning btn-xs glyphicon glyphicon-pencil' href='edit.html' data-toggle='modal' data-target='#$guidEdit'></a>";
                    echo  "<a> </a>";
                    echo  "<a class='btn btn-danger btn-xs glyphicon glyphicon-minus'  href='#' data-toggle='modal' data-target='#$guidDelete'></a>";
                    echo  "</td>";
                    echo  "</tr>";


// Modal View
echo "<div class='modal fade' id='$guid1' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>";
echo    "<div class='modal-dialog'>";
echo        "<div class='modal-content'>";
echo            "<div class='modal-header'>";
echo                "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>";
echo                "<h4 class='modal-title' id='myModalLabel'>Visualizar Musica</h4>";
echo            "</div>";
echo            "<div class='modal-body'>";
echo              "<form name='inserir' id='inserir' method='post' action=''>";
echo                "<fieldset disabled>";

echo                "<div class='form-group'>";
echo                  "<label for='exampleInputEmail1'>Titulo</label>";
echo                  "<input name='titulo' type='text' class='form-control' id='titulo' value='$titulo1' placeholder='Titulo da Música' />";
echo                "</div>";

echo                "<div class='form-group'>";
echo                  "<label for='exampleInputEmail1'>Arte do Album</label>";
echo                  "<input name='texto' type='text' class='form-control' id='texto' value='$arte1' placeholder='Faça o download ou ouça esta música' />";
echo                "</div>";

echo                "<div class='form-group'>";
echo                  "<label for='exampleInputEmail1'>Artista</label>";
echo                  "<input name='downloadlink' type='text' class='form-control' id='downloadlink' value='$artista1' placeholder='Link de download' />";
echo                "</div>";

echo                "<div class='form-group'>";
echo                  "<label for='exampleInputEmail1'>Album</label>";
echo                  "<input name='nomearquivo' type='text' class='form-control' id='nomearquivo' value='$album1' placeholder='Ex: avicii.mp3' />";
echo                "</div>";

echo                "<div class='form-group'>";
echo                  "<label for='exampleInputEmail1'>Link da musica</label>";
echo                  "<input name='musicalink' type='text' class='form-control' id='musicalink' value='$linkplay1' placeholder='Link ou diretorio aonde a musica está' />";
echo                "</div>";

echo                "<div class='form-group'>";
echo                  "<label for='exampleInputEmail1'>Link download</label>";
echo                  "<input name='musicalink' type='text' class='form-control' id='musicalink' value='$linkdownload1' placeholder='Link ou diretorio aonde a musica está' />";
echo                "</div>";

echo                  "</fieldset>";
echo                   "<button type='button'  class='btn btn-default glyphicon glyphicon-remove-circle' data-dismiss='modal'  > Fechar</button>";
echo                  "</form>";
echo            "</div>";
echo            "<div class='modal-footer'>";
echo            "</div>";
echo        "</div>";
echo   "</div>";
echo "</div>";

// Modal edit
echo "<div class='modal fade' id='$guidEdit' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>";
echo    "<div class='modal-dialog'>";
echo        "<div class='modal-content'>";
echo            "<div class='modal-header'>";
echo                "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>";
echo                "<h4 class='modal-title' id='myModalLabel'>Editar Musica</h4>";
echo            "</div>";
echo            "<div class='modal-body'>";
echo              "<form name='inserir' id='inserir' method='post' action='edit-playlist.php'>";

echo                "<div style='display:none' class='form-group'>";
echo                  "<label for='inputError1'>guid</label>";
echo                  "<input name='guid' type='text' class='form-control' id='guid' value='$guid1' placeholder='Titulo da Música'/>";
echo                "</div>";

echo                "<div class='form-group'>";
echo                  "<label for='exampleInputEmail1'>Titulo</label>";
echo                  "<input name='titulo' type='text' class='form-control' id='titulo' value='$titulo1' placeholder='Titulo da Música' />";
echo                "</div>";

echo                "<div class='form-group'>";
echo                  "<label for='exampleInputEmail1'>Arte do Album</label>";
echo                  "<input name='arte' type='text' class='form-control' id='arte' value='$arte1' placeholder='Faça o download ou ouça esta música' />";
echo                "</div>";

echo                "<div class='form-group'>";
echo                  "<label for='exampleInputEmail1'>Artista</label>";
echo                  "<input name='artista' type='text' class='form-control' id='artista' value='$artista1' placeholder='Link de download' />";
echo                "</div>";

echo                "<div class='form-group'>";
echo                  "<label for='exampleInputEmail1'>Album</label>";
echo                  "<input name='album' type='text' class='form-control' id='album' value='$album1' placeholder='Ex: avicii.mp3' />";
echo                "</div>";

echo                "<div class='form-group'>";
echo                  "<label for='exampleInputEmail1'>Link da musica</label>";
echo                  "<input name='musicalink' type='text' class='form-control' id='musicalink' value='$linkplay1' placeholder='Link ou diretorio aonde a musica está' />";
echo                "</div>";

echo                "<div class='form-group'>";
echo                  "<label for='exampleInputEmail1'>Link download</label>";
echo                  "<input name='download' type='text' class='form-control' id='download' value='$linkdownload1' placeholder='Link ou diretorio aonde a musica está' />";
echo                "</div>";

echo                   "<button type='submit' name='Submit' id='button' class='btn btn-default glyphicon glyphicon-ok-sign'  data-toggle='modal' data-target='#$guidEdit' > Salvar</button>";
echo                   "<a> </a>";
echo                   "<button type='button'  class='btn btn-default glyphicon glyphicon-remove-circle' data-dismiss='modal'  > Cancelar</button>";
echo                  "</form>";
echo            "</div>";
echo            "<div class='modal-footer'>";
echo            "</div>";
echo        "</div>";
echo   "</div>";
echo "</div>";

// Modal delete

echo "<div class='modal fade' id='$guidDelete' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>";
echo    "<div class='modal-dialog'>";
echo        "<div class='modal-content'>";
echo            "<div class='modal-header'>";
echo                "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>";
echo                "<h4 class='modal-title' id='myModalLabel'>Deletar esta música ?</h4>";
echo            "</div>";
echo            "<div class='modal-body'>";
echo              "<form name='inserir' id='inserir' method='post' action='delete-playlist.php'>";
echo                "<div style='display:none' class='form-group'>";
echo                  "<label for='exampleInputEmail1'>guid</label>";
echo                  "<input name='guid' type='text' class='form-control' id='guid' value='$guid1' placeholder='Titulo da Música' />";
echo                "</div>";
echo                   "<button type='submit' name='Submit' id='button' class='btn btn-default glyphicon glyphicon-ok-sign'  data-toggle='modal' data-target='#$guidDelete' > Deletar</button>";
echo                   "<a> </a>";
echo                   "<button type='button'  class='btn btn-default glyphicon glyphicon-remove-circle' data-dismiss='modal'  > Cancelar</button>";
echo                  "</form>";
echo            "</div>";
echo            "<div class='modal-footer'>";
echo            "</div>";
echo        "</div>";
echo   "</div>";
echo "</div>";

}
mysql_close($conexao);
?>

</tbody>
</table>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" charset="utf-8" src="assets/js/dataTables.editor.min.js"></script>
<script type="text/javascript" charset="utf-8" src="assets/js/editor.bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
      $('#reg').DataTable();
    } );
</script>


<?
                	   $anterior = $pc -1;
                	   $proximo = $pc +1;


                   if ($pc>1) {
                   echo  "<li<a><a href='?pagina=$anterior'>&lt; Anterior</a></li>";
                      }
                  if ($pc<$tp) {
                  echo  "<ul class='pagination'>";
                  echo  "<li <a class='next'><a href='?pagina=$proximo'  rel='next'>Próximo &gt;</a></li>";
                      }
                  if ($pc=$tp) {
                  echo  "<ul class='pagination'>";
                  echo  "<li <a class='next'><a  href='?pagina=$proximo' rel='next'>Próximo &gt;</a></li>";
                          }

?>
                    </ul><!-- /.pagination -->

                     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                         <div class="modal-dialog">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                     <h4 class="modal-title" id="myModalLabel">Cadastro de Musica Playlist</h4>
                                 </div>
                                 <div class="modal-body">
                                   <form name="inserir" id="inserir" method="post" action="inserir-playlist.php">
                                     <div class="form-group">
                                       <label for="exampleInputEmail1">Titulo</label>
                                       <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Titulo da Música" />
                                     </div>

                                     <div class="form-group">
                                       <label for="exampleInputEmail1">Arte do Album</label>
                                       <input name="arte" type="text" class="form-control" id="arte" placeholder="diretorio da imagem do album" />
                                     </div>

                                     <div class="form-group">
                                       <label for="exampleInputEmail1">Artista</label>
                                       <input name="artista" type="text" class="form-control" id="artista" placeholder="artista da música" />
                                     </div>

                                     <div class="form-group">
                                       <label for="exampleInputEmail1">Album</label>
                                       <input name="album" type="text" class="form-control" id="album" placeholder="album desta música" />
                                     </div>

                                     <div class="form-group">
                                       <label for="exampleInputEmail1">Link Play</label>
                                       <input name="linkplay" type="text" class="form-control" id="linkplay" placeholder="link da musica" />
                                     </div>

                                     <div class="form-group">
                                       <label for="exampleInputEmail1">Link download</label>
                                       <input name="downloadlink" type="text" class="form-control" id="downloadlink" placeholder="Link de download" />
                                     </div>
                                        <button type="submit" name="Submit" id="button" class="btn btn-default glyphicon glyphicon-ok-sign"  data-toggle="modal" data-target="#myModal" > Salvar</button>
                                        <a> </a>
                                        <button type="button"  class="btn btn-default glyphicon glyphicon-remove-circle" data-dismiss="modal"  > Cancelar</button>
                                       </form>
                                 </div>
                                 <div class="modal-footer">
                                 </div>
                             </div>
                         </div>
                     </div>





                   </div>
               </div>

           </div>
       </div>
   </div>
</div>
</div>

    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2016 King of Eletro | Framework : <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap</a>
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>