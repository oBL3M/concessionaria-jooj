<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/form.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">

  <title>JOOJ SOLUTIONS</title>
</head>

<?php
    require_once ('mvc/model/Carros.php');
    require_once ('mvc/DAO/CarrosDAO.php');

    $CarrosDAO = new CarrosDAO();

        if(!empty($_GET['id'])) {
            $obj = $CarrosDAO->getById($_GET['id']);
        } else {
            $obj = new Carros();
        }
?>

<body>
  <header>
    <div class="logo">
      <h2>concessionária</h2>
      <h1>JOOJ</h1>
    </div>
    <div class="logout">
      <a href="index.html">SAIR</a>
    </div>
  </header>
  <div class="sub-nav">
  <a href="lista.php"><div class="sub-nav-on">LISTA DE VEICULOS</div></a>
  <div class="sub-nav-off">ADICIONAR/EDITAR VEICULO</div>
  </div>
  <main>
    <div class="div-form">
      <form action="">
        <div class="supform">
          <input type="hidden" name="id" id="id" value="<?php echo $obj->id ?>">
        <div class="fl">
          <input type="text" name="marca" id="marca" placeholder="MARCA" require value="<?php echo $obj->marca ?>">
          <input type="text" name="carro" id="carro" placeholder="CARRO" require  value="<?php echo $obj->carro ?>">
        </div>
        <div class="fr">
          <input type="text" name="fab" id="fab" placeholder="FAB/MOD"  value="<?php echo $obj->fab ?>">
          <input type="text" name="quilometros" id="quilometros" placeholder="QUILOMETROS"  value="<?php echo $obj->quilometros ?>">
          <input type="text" name="preco" id="preco" placeholder="PREÇO"  value="<?php echo $obj->preco ?>">
        </div>
        </div>
          <button id="btnEnviar" type="button">SALVAR</button>
      </form>
    </div>
  </main>
  <footer class="footer">
    <a href="#">GITHUB</a>
    <a href="#">CODEPEN</a>
  </footer>
</body>
<script src="js/carros.js"></script>
</html>