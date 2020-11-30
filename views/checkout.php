<div class="checkout-main">
    <div class="handle">
        <form method="post" action="index.php" id="checkoutForm">
            <input type="hidden" name="controller" value="cart">
            <input type="hidden" name="action" value="placeOrder">
            <input type="hidden" name="intUserID" value="<?=$_SESSION['uID']?>">
            <input type="hidden" name="intOrderDate" value="<?=date("Y/m/d")?>">
        
            <div class="handle">
                <div class="billing-shipping">
                    <div class="billing">
                        <h3>Billing details</h3>

                        <div class="fieldgroup required">
                            <label>First Name*</label>
                            <input type="text" name="strFirstName" value="">
                            <div class="attention">
                                <p>You forgot a field!</p>
                            </div>
                        </div>
                        
                        <div class="fieldgroup required">
                            <label>Last Name*</label>
                            <input type="text" name="strLastName" value="">
                            <div class="attention">
                                <p>You forgot a field!</p>
                            </div>
                        </div>

                        <div class="fieldgroup required">
                            <label>Address*</label>
                            <input type="text" name="strAddress" value="">
                            <div class="attention">
                                <p>You forgot a field!</p>
                            </div>
                        </div>

                        <div class="fieldgroup required">
                            <label>City*</label>
                            <input type="text" name="strCity" value="">
                            <div class="attention">
                                <p>You forgot a field!</p>
                            </div>
                        </div>

                        <div class="fieldgroup required">
                            <label>Province*</label>
                            <input type="text" name="strProvince" value="">
                            <div class="attention">
                                <p>You forgot a field!</p>
                            </div>
                        </div>

                        <div class="fieldgroup required">
                            <label>ZIP*</label>
                            <input type="text" name="strZIP" value="">
                            <div class="attention">
                                <p>You forgot a field!</p>
                            </div>
                        </div>

                        <div class="fieldgroup required">
                            <label>Phone*</label>
                            <input type="text" name="strPhone" value="">
                            <div class="attention">
                                <p>You forgot a field!</p>
                            </div>
                        </div>

                    </div>

                    <div class="shipping">
                    <h3>Shipping details</h3>
                        <div class="fieldgroup required">
                            <label>First Name*</label>
                            <input type="text" name="strFirstNameS" value="">
                            <div class="attention">
                                <p>You forgot a field!</p>
                            </div>
                        </div>
                        
                        <div class="fieldgroup required">
                            <label>Last Name*</label>
                            <input type="text" name="strLastNameS" value="">
                            <div class="attention">
                                <p>You forgot a field!</p>
                            </div>
                        </div>

                        <div class="fieldgroup required">
                            <label>Address*</label>
                            <input type="text" name="strAddressS" value="">
                            <div class="attention">
                                <p>You forgot a field!</p>
                            </div>
                        </div>

                        <div class="fieldgroup required">
                            <label>City*</label>
                            <input type="text" name="strCityS" value="">
                            <div class="attention">
                                <p>You forgot a field!</p>
                            </div>
                        </div>

                        <div class="fieldgroup required">
                            <label>Province*</label>
                            <input type="text" name="strProvinceS" value="">
                            <div class="attention">
                                <p>You forgot a field!</p>
                            </div>
                        </div>

                        <div class="fieldgroup required">
                            <label>ZIP*</label>
                            <input type="text" name="strZIPS" value="">
                            <div class="attention">
                                <p>You forgot a field!</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="payment-review">
                    <div class="review">
                        <h3>Order details</h3>
                        <div class="line"></div>
                        <?php if(isset($_SESSION["arrCart"])) {
                        $CartItems = $this->CartContents;
                            foreach($CartItems as $data)
                            { ?> 
                            
                            <div class="item">
                                    
                                <div class="col prodName">
                                    <span><?=$data["strProdName"]?></span>

                                </div>

                                <div class="col">
                                    <span>x <?=$data["intQty"]?></span>
                                </div>

                                <div class="col">
                                    <span>$<?=$data["fPrice"]?></span>
                                </div>
                            </div><!--item-->
                            <?php } ?>

                            <div class="line cart"></div>

                            <div class="subtotal">
                                    <div class="label">
                                        <span>Subtotal</span>
                                        <span class="secondary">$<?=Cart::showSubTotal();?></span>

                                    </div>
                                    <div class="line"></div>
                                </div><!--stubtotal-->

                                <div class="shipping group">
                                    <div class="label">
                                        <span>Shipping</span>
                                        <span class="secondary">Flat Rate $10</span>
                                    </div>
                                    <div class="line"></div>
                                </div><!--shipping-->

                                <div class="total">
                                    <div class="label">
                                        <span>Total</span>
                                        <span class="secondary">$<?=Cart::showTotal();?></span>
                                        <input type="hidden" name="fTotal" value="<?=Cart::showTotal();?>">
                                    </div>
                                    <div class="line"></div>
                                </div><!--total-->
                            </div> <?php }?>
                    </div><!--review-->

                    <div class="payment">
                        <h3>Payment</h3>
                        <div class="fieldgroup required">
                            <label>Name on card*</label>
                            <input type="text" name="strCCName" value="">
                            <div class="attention">
                                <p>You forgot a field!</p>
                            </div>
                        </div>

                        <div class="fieldgroup required">
                            <label>Card number*</label>
                            <input type="text" name="intCCNumber" value="">
                            <div class="attention">
                                <p>You forgot a field!</p>
                            </div>
                        </div>

                        <div class="fieldgroup required">
                            <label>Exp. Date*</label>
                            <input type="text" name="strExp" value="">
                            <div class="attention">
                                <p>You forgot a field!</p>
                            </div>
                        </div>

                        <div class="fieldgroup required">
                            <label>CVV*</label>
                            <input type="text" name="intCVV" value="">
                            <div class="attention">
                                <p>You forgot a field!</p>
                            </div>
                        </div>

                        <input type="submit" value="Place order" id="plcOrder">
                    </div> <!--payment-->
                </div><!--payment-review-->
            </div><!--handle-->
        </form>
    </div> <!--handle-->
</div>
<script src="js/validator-checkout.js"></script> 