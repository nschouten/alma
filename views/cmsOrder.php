<div class="cms-order">
    <div class="handle">
        <h3>Order #<?=$this->oOrder->id?></h3>

        <div class="subhandle">
            <div class="group">
                <label>Order Date:</label>
                <span><?=$this->oOrder->intOrderDate?></span>
            </div>

            <div class="group">
                <label>Order Placed By:</label>
                <span><?=$this->oOrder->strFullName?></span>
            </div>

            <div class="group">
                <label>Order Total:</label>
                <span><?=$this->oOrder->fTotal?></span>
            </div>
            <div class="line"></div>
        </div>
            
        <div class="subhandle">
            <div class="group">
                <h4>Billing & Shipping Information</h4>
            </div>

            <div class="group">
                <label>Address:</label>
                <span><?=$this->oBilling->strAddress?></span>
                <span><?=$this->oBilling->strCity?> <?=$this->oBilling->strProvince?></span>
                <span><?=$this->oBilling->strZIP?></span>
            </div>
            <div class="line"></div>
        </div>

        <div class="subhandle">
            <div class="group">
                <h4>Payment Information</h4>
            </div>

            <div class="group">
                <label>Credit Card Number:</label>
                <span><?=$this->oPayment->intCCNumber?></span>
            </div>

            <div class="group">
                <label>Expiration & CVV:</label>
                <span><?=$this->oPayment->strExp?> | <?=$this->oPayment->intCVV?></span>
            </div>
        </div>
    </div>
</div>