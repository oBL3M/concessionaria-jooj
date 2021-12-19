<?php
    require_once ('mvc/DAO/CarrosDAO.php');
  
    $CarrosDAO = new CarrosDAO();
    $lista = $CarrosDAO->getLista(0, 999);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/table.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">

  <title>CONCESSIONÁRIA JOOJ</title>
</head>
<body>
  <header>
    <div class="logo">
      <h2>concessionária</h2>
      <h1>JOOJ</h2>
    </div>
    <div class="logout">
      <a href="index.html">SAIR</a>
    </div>
  </header>
  <div class="sub-nav">
  <div class="sub-nav-off">LISTA DE VEICULOS</div>
  <a href="formulario.php"><div class="sub-nav-on">ADICIONAR/EDITAR VEICULO</div></a>
  </div>
  <main>
    <div class="div-table">
    <div>
      <input type="text" id="sid" onkeyup="idsearch()" placeholder="Procure por ID">
      <input type="text" id="smarca" onkeyup="marcasearch()" placeholder="Procure por CARRO">
      <input type="text" id="scarro" onkeyup="carrosearch()" placeholder="Procure por MARCA">
    </div>
      <table id="lista">
        <tr class="listaheader">
          <th style="width:5%;">ID</th>
          <th style="width:20%;">MARCA</th>
          <th style="width:20%;">CARRO</th>
          <th style="width:15%;">FAB/MOD</th>
          <th style="width:20%;">QUILOMETROS</th>
          <th style="width:15%;">PREÇO</th>
          <th style="width:5%;">AÇÕES</th>
        </tr>
        <?php while ($linha = $lista->fetch(PDO::FETCH_ASSOC)) {
        ?>
       <tr>
          <td><?php echo $linha['id'] ?></td>
          <td><?php echo $linha['marca'] ?></td>
          <td><?php echo $linha['carro'] ?></td>
          <td><?php echo $linha['fab'] ?></td>
          <td><?php echo $linha['quilometros'] ?></td>
          <td><?php echo $linha['preco'] ?></td>
          <td class="actions"> 
          <a id=updbtn class="update" href="formulario.php?id=<?php echo $linha['id'] ?>"><div>EDIT</div></a>
          <button data-id="<?php echo $linha['id'] ?>" class="delete">DEL</button>
        </td>
        </tr>
            <?php } ?>
      </table>
    </div>
  </main>
  <footer class="footer">
    <a href="#">GITHUB</a>
    <a href="#">CODEPEN</a>
  </footer>
</body>
<script src="js/carros.js"></script>
</html>