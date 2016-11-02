<?php

@define(TITLE, "Programeiros");

include('includes/navbar.php');

$sql = 'SELECT * FROM tb_postagens ORDER BY id DESC LIMIT 6';

$stmt = $PDO->prepare($sql);
$stmt->execute();

?>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<section id="blog" class="container posts">
<div class="col col-md-12">
      <h1 class="title-main">Área de Postagens</h1>
      <?php

      while ($posts = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
  
      <div class="row" style="float:left;">
        <div class="col-md-12">
          <div class="thumbnail">
            <img src="upload/postagens/<?= $posts['imagem']; ?>" style="width:300px;" alt="...">
            <div class="caption">
              <h3><?= date('d/m/Y', strtotime($posts["data"])); ?>: <?= $posts["titulo"]; ?></h3>
              <p><a href="post.php?id=<?= $posts['id']; ?>" class="btn btn-primary" role="button">Ler Mais</a></p>
            </div>
          </div>
        </div>
      </div>
</div>
</div>
      <?php endwhile; ?>

</section>

<?php include ("includes/footer.php"); ?>
