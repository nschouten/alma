<div class="header main">
    <div class="col primary">
    <a href="index.php?controller=admin&action=mainAdmin"><?=$this->logo?></a>
    </div>

    <div class="col secondary">
        <div class="nav">
            <a class="web-only" href="index.php?controller=admin&action=mainAdmin" id="homeBtn">Home</a>
            <a class="web-only" href="index.php?controller=cms&action=cmsProducts" id="prodBtn">Products</a>
            <a class="web-only" href="index.php?controller=cms&action=customers" id="custBtn">Customers</a>
            <a class="web-only" href="index.php?controller=cms&action=orders" id="ordBtn">Orders</a>
            <a class="web-only" href="index.php" id="cartBtn">Shop</a>
        </div>
        <div class="mobile-nav mobile-only">
            
            <div class="burger mobile-only">
                <input type="checkbox" class="cb">
                <div class="bars">
                    <span></span>
                    <span></span>
                    <span></span>
                </div><!--.bars-->

                <div class="flyout">
                    <a class="mobile-only" href="index.php?controller=admin&action=mainAdmin" id="homeBtn">Home</a>
                    <a class="mobile-only" href="index.php?controller=cms&action=cmsProducts" id="prodBtn">Products</a>
                    <a class="mobile-only" href="index.php?controller=cms&action=customers" id="custBtn">Customers</a>
                    <a class="mobile-only" href="index.php?controller=cms&action=orders" id="ordBtn">Orders</a>
                    <a class="mobile-only" href="index.php" id="cartBtn">Shop</a>
                </div><!--.flyout-->
            </div> <!--.buger-->
        </div> <!--mobilenav-->
    </div><!--.col-->
</div><!--.header mobile-->