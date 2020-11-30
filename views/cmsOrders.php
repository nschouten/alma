<div class="cms-orders">
    <div class="handle">
        <h3>Orders Placed</h3>
        <div class="orders">
        <?php foreach($this->oOrders as $data)
        { ?>    
            <div class="order">
                <a href="index.php?controller=cms&action=order&oID=<?=$data->id?>"> 
                <div class="group">
                    <label>Order Number:</label>
                    <span><?=$data->id?></span>
                </div>
                <div class="group">
                    <label>Date:</label>
                    <span><?=$data->intOrderDate?></span>
                </div>
                <div class="group">
                    <label>User:</label>
                    <span><?=$data->strFullName?></span>
                </div>
                <div class="group">
                    <label>Total:</label>
                    <span><?=$data->fTotal?></span>
                </div>
                </a>
            </div><!--order-->
        <?php } ?>
        </div>
    </div>
</div>