<div class="productsMain">
    <div class="row primary">
        <div class="web-only row">
            
        </div>

        <div class="cat-nav mobile-only">
        <?php
        foreach($this->oCat as $data)
        {
            ?>
            <a href="index.php?controller=public&action=products&pID=<?=$data->id?>"><?=$data->strCatName?></a>
        <?php } ?>
        </div>
    </div><!--row primary -->
        
    <div class="row secondary">
        <div class="left-nav web-only">
            <div class="categories">
                <h3>Product Categories</h3>
                <?php
                foreach($this->oCat as $data)
                {
                ?>
                <a href="index.php?controller=public&action=productsMain&cID=<?=$data->id?>"><?=$data->strCatName?></a>
                <?php } ?>
            </div> <!--cat-nav-->
            <div class="color-nav">
                
            </div> <!--color-nav-->
        </div><!--left nav -->

        <div class="products"> 
            <div class="handle">
                <?php
                foreach($this->oProducts as $data)
                {
                    ?>
                <div class="product">
                    <a href="index.php?controller=public&action=productMain&pID=<?=$data->id?>">
                    <img src="imgs/<?=$data->strImgFile?>" alt="dress"/>
                    <h2><?=$data->strProdName?></h2>
                    <p><?=$data->fPrice?></p>
                    </a>
                </div> <!--product-->
                <?php } ?>
            </div> <!--handle-->
        </div> <!--products -->
    </div> <!--row secondary -->
</div>
