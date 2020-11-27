<div class="cart-main">
    <div class="handle">
        <div class="row cart-primary">
            <h2>Your Cart</h2>
        </div><!--row cart-primary-->

        <div class="row cart-secondary">
            <div class="items">
                
                <?php $CartItems = $this->CartContents;
                if($CartItems){
                   
                foreach($CartItems as $key => $data)
                { ?> 
                    <div class="item">
                        <div class="col dltBtn">
                            <a href="index.php?controller=cart&action=remove"><img src="imgs/xx.png" alt="delete"/></a>
                        </div>

                        <div class="col cartImg web-only">
                            <img src="imgs/<?=$data["strImgFile"]?>" alt="itemPicture"/>
                        </div>

                        <div class="col prodName">
                            <span><?=$data["strProdName"]?></span>
                        </div>

                        <div class="col">
                            <span>$<?=$data["fPrice"]?></span>
                        </div>

                        <div class="col">
                            <span>x <?=$data["intQty"]?></span>
                        </div>
                    </div><!--item-->
                <?php } 
                } else {
                    ?> <h3 id="notcart">There is nothing in your cart</h3>
                <?php } ?>
    

                <div class="line cart"></div>
                <a href="index.php?controller=cart&action=empty" id="empBtn">Empty Cart</a>
            </div><!--items-->

            <div class="totals">
                <h3>Cart total</h3>
                <div class="subtotal">
                    <div class="label">
                        <span>Subtotal</span>
                        <span class="secondary">$<?=Cart::showSubTotal();?></span>
                    </div>
                    <div class="line"></div>
                </div>

                <div class="shipping">
                    <div class="label">
                        <span>Shipping</span>
                        <span class="secondary">Flat Rate $10</span>
                    </div>
                    <div class="line"></div>
                </div>

                <div class="total">
                    <div class="label">
                        <span>Total</span>
                        <span class="secondary">$<?=Cart::showTotal();?></span>
                    </div>
                    <div class="line"></div>
                </div>

                <div class="checkout">
                    <?php if($_SESSION['uID']=="")
                    { ?>
                        <a href="index.php?controller=register&action=register">Proceed to Checkout</a>
                    <?php
                    } else { ?>
                        <a href="index.php?controller=user&action=checkout">Proceed to Checkout</a>
                    <?php
                    } ?>
                    
                </div>
            </div><!--totals-->
        </div> <!--row cart-secondary-->
    </div>
</div><!--cart-main-->