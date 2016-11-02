<?php

define(TITLE,'Post Único');

include('includes/navbar.php');

if(isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  echo "<script>location.href='index.php'</script>";
}

$sql = "SELECT * FROM tb_postagens WHERE id=:id";

try {
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id',$id, PDO::PARAM_INT);
$stmt->execute();
} catch(PDOException $erro) {
    echo $erro;
}

while ($postagem = $stmt->fetch(PDO::FETCH_ASSOC)) {
       $id = $postagem["id"];
       $titulo = $postagem["titulo"];
       $imagem = $postagem["imagem"];
       $conteudo = $postagem["conteudo"];
    }

?>

<div class="row">
  <div class="col-md-12">
    <div class="thumbnail">
      <img src="upload/postagens/<?php echo $imagem; ?>" alt="">
      <div class="caption">
        <h3><?php echo $titulo; ?></h3>
        <p><?php echo $conteudo; ?></p>
      </div>
    </div>
  </div>
</div>

<div class="container"></div>

<!-- footer admin -->
