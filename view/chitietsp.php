<?php 
  extract($sp);
  $luotxem++;
  update_luotxem($id,$luotxem);
?>
<div class="border container-fluid py-3">
  <div class="container-fluid d-flex justify-content-center">
    <img height="450px" src="../admin/image/<?= $img ?>" class="text-align-center" alt="...">
  </div>
  <div class="card-body mt-3">
    <ul class="ps-5">
      <li><span class="card-title">MÃ SẢN PHẨM: <?= $id ?></span></li>
      <li><span class="card-title">TÊN HÀNG HÓA: <?= $name ?></span></li>
      <li><span class="card-title">ĐƠN GIÁ: <?= $price ?></span></li>
      <li><span class="card-title">LƯỢT XEM: <?= $luotxem ?></span></li>
    </ul>
    <p class="px-4 card-text"><?= $mota ?></p>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $("#binhluan").load("../view/binhluan/binhluanform.php", {
      idpro: <?=$id?>
    });
  });
</script>
<div id="binhluan"></div>
<div class="card">
  <div class="card-header">
    HÀNG CÙNG LOẠI
  </div>
  <ul class="py-2 px-5">
    <?php foreach ($spcl as $cl) : ?>
      <li><a href="index.php?act=ctsp&id=<?= $cl['id'] ?>" class="text-decoration-none"><?= $cl['name'] ?></a></li>
    <?php endforeach ?>
  </ul>
</div>