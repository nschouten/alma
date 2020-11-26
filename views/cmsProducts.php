<div class="cms-products">    
    <div class="handle">
        <div class="addButton">
            <a href="index.php?controller=cms&action=addProduct">&#43;Add Product</a>
        </div>
        <div class="products">
        <?php foreach($this->oProducts as $data)
        { ?>
            <div class="product">
                <a href="index.php?controller=Cms&action=cmsProduct&pID=<?=$data->id?>"><img src="imgs/<?=$data->strImgFile?>" alt="dress"/></a>
                <a href="index.php?controller=Cms&action=cmsProduct&pID=<?=$data->id?>"><h2><?=$data->strProdName?></h2></a>
                
                <div class="deleteBtn">
                        <a href="index.php?controller=cms&action=delete&pID=<?=$data->id?>>"><img src="imgs/xx.png" alt="xbutton"/></a>
                </div> <!--deleteBtn-->
            </div><!--product-->
        <?php } ?>
        </div><!--products-->
    </div> <!--handle-->
</div> <!--cmsproducts-->
