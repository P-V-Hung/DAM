    <h5 class="alert alert-success">Danh mục: 
        <?php
            if(isset($dmhientai)&&(!empty($dmhientai))){
                echo $dmhientai['name'];
            }else{
                echo "";
            }
        ?>
    </h5>
    <div class="boxspindex mt-4">
        <?php
        foreach ($listsp as $sp) :
            extract($sp);
        ?>
                <a href="index.php?act=ctsp&id=<?= $id ?>" class="text-decoration-none text-dark border py-3 px-3">
                    <img src="../admin/image/<?= $img ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="mt-3">$<?= $price ?></h3>
                        <p class="card-text"><?= $name ?></p>
                    </div>
                    <form action="index.php?act=addtocart" method="post">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="hidden" name="name" value="<?=$name?>">
                        <input type="hidden" name="img" value="<?=$img?>">
                        <input type="hidden" name="price" value="<?=$price?>">
                        <input type="submit" name="btn_addcard" class="btn btn-outline-dark p-1 mt-2" value="Thêm vào giỏ hàng">
                    </form>
                </a>
        <?php
        endforeach;
        ?>
    </div>