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

                    <form method="post" action="index.php" id="addProdFormU"> 
                        <input type="hidden" name="controller" value="cart">
                        <input type="hidden" name="action" value="addToCart">
                        <input type="hidden" name="intProductID" value="<?=$this->oProduct->id?>">
                        <input type="hidden" name="fPrice" value="<?=$this->oProduct->fPrice?>">
                        <input type="hidden" name="strImgFile" value="<?=$this->oImg->strImgFile?>">
                        <input type="hidden" name="strProdName" value="<?=$this->oProduct->strProdName?>">

                        <div class="fieldgroup color need">
                            <?php foreach($this->oColors as $data)
                            { ?>
                                <label class="container"><?=$data->strColorName?>
                                    <input type="radio" id="colorChoice" name="intColorID" value="<?=$data->id?>">
                                    <span class="checkmark"></span>
                                </label>
                            <?php } ?>
                            <div class="attention">
                                <p>You forgot a field!</p>
                            </div>
                        </div>

                        <div class="fieldgroup size need" id="sizeContainer">
                            <?php foreach($this->oSizes as $data)
                            { ?>
                                <label class="container">
                                    <?=$data->strSizeName?>
                                    <input type="radio" name="intSizeID" value="<?=$data->id?>">
                                    <span class="checkmark"></span>
                                </label>
                            <?php } ?>
                            <div class="attention">
                                <p>You forgot a field!</p>
                            </div>
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

        <div class="reviews">
            <div class="rev-header web-only">
                <h3>Reviews</h3>
                <div class="line"></div>
            </div>
            <div class="handle">
                <form method="post" action="index.php" id="reviewForm" enctype="multipart/form-data">
                    <input type="hidden" name="controller" value="user">
                    <input type="hidden" name="action" value="addReview">
                    <input type="hidden" name="intUserID" value="<?=$_SESSION['uID']?>">
                    <input type="hidden" name="intProductID" value="<?=$_GET['pID']?>">

                    <h3>Leave a Review</h3>
                    <!-- https://codepen.io/hesguru/pen/BaybqXv -->

                    <div class="fieldgroup required">
                        <div class="rate">
                            <input type="radio" id="star5" name="intRating" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="intRating" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="intRating" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="intRating" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="intRating" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                        <div class="attention">
                            <p>You forgot a field!</p>
                        </div>
                    </div>

                    <div class="fieldgroup required">
                        <label>Your Review*</label>
                        <textarea name="strComment" value=""></textarea>
                        <div class="attention">
                            <p>You forgot a field!</p>
                        </div>
                    </div>

                    <div class="fieldgroup required upload">
                        <label>Upload an Image</labeL>
                        <input type="file" name="strFileName" id="strFileName">
                        <div class="attention">
                            <p>You forgot a field!</p>
                        </div>
                    </div>

                    <input type="submit" id="sbmtBtn" value="Submit">
                </form>
            </div><!--handle-->
        </div><!--reviews-->
    </div>


