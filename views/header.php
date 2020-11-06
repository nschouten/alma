<div class="header main">
    <div class="col primary">
    <a href="index.php"><?=$this->logo?></a>
    </div>

    <div class="col secondary">
        <a href="index.php?controller=public&action=cartMain" id="crt">Cart(0)</a>
        <div class="burger mobile-only">
            <input type="checkbox" class="cb">
            <div class="bars">
                <span></span>
                <span></span>
                <span></span>
            </div><!--.bars-->

            <div class="flyout">
                <a href="index.php"><h3>Home</h3></a>
                <a href="index.php?controller=public&action=shopMain"><h3>Shop</h3></a>
                    <ul>
                        <li><a href="#">Dress</a></li>
                        <li><a href="#">Shoes</a></li>
                        <li><a href="#">Accessories</a></li>
                    </ul>
            </div><!--.flyout-->
        </div> <!--.buger-->
    </div><!--.col-->
</div><!--.header mobile-->

</div>