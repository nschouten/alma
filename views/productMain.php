<div class="product-main">
    <div class="pmh">
        <div class="images">
            <div class="handle">
                <div class="active main">
                    <img src="imgs/<?=$this->oImg->strImgFile?>" alt="mainpic"/>
                </div> <!--active-->

                <div class="subactive">
                    <?php foreach($this->oImgs as $data)
                    { ?>
                    <div class="image">
                        <img src="imgs/<?=$data->strImgFile?>" alt="dress"/>
                    </div> <!--image-->
                    <?php } ?>
                </div> <!--subactive-->
            </div> <!--handle-->
        </div> <!--images-->

        <div class="details">
            <div class="handle">
                <h3><?=$this->oProduct->strProdName?></h3>
                <span><?=$this->oProduct->fPrice?></span>
                <p><?=$this->oProduct->strProdDesc?><p>

                <form method="post" action="index.php"> 
                    <input type="hidden" name="controller" value="cart">
                    <input type="hidden" name="action" value="addToCart">
                    <input type="hidden" name="pID" value="<?=$this->oProduct->id?>">
                    <input type="hidden" name="fPrice" value="<?=$this->oProduct->fPrice?>">
                    
                    <div class="fieldgroup size">
                            <?php foreach($this->oSizes as $data)
                            { ?>
                                <label class="container"><?=$data->strVariantTypeName?>
                                    <input type="radio" name="intSizeTypeID" value="<?=$data->id?>">
                                    <span class="checkmark"></span>
                                </label>
                            <?php } ?>
                        </div>

                        <div class="fieldgroup color">
                            <?php foreach($this->oColors as $data)
                            { ?>
                                <label class="container"><?=$data->strVariantTypeName?>
                                    <input type="radio" id="prodColor" name="intVariantTypeID" value="<?=$data->intVariantTypeID?>">
                                    <span class="checkmark"></span>
                                </label>
                            <?php } ?>
                        </div>

                    <div class="fieldgroup qty">
                        <span>Qty</span>
                        <input type="number" name="intQty" value="1" min="1" />
                    </div>
                    <input type="submit" id="addCartBtn" value="Add to Cart">
                </form>
            </div> <!--handle-->
        </div><!--details-->
    </div>

    <div class="reviews-login">
        <div class="handle">
         <p><a href="index.php?controller=login&action=userLogin&pID=<?=$this->oProduct->id?>">Log In</a> or <a href="index.php?controller=register&action=register&pID=<?=$this->oProduct->id?>">Register</a> to leave a review</p>
        </div><!--handle-->
    </div><!--reviews-->

</div>


