<div class="cms-addProduct"> 
    <div class="handle">
        <form method="post" action="index.php" id="addProdForm" enctype="multipart/form-data">
            <input type="hidden" name="controller" value="cms">
            <input type="hidden" name="action" value="addNewProduct">

            <div class="fieldgroup required">
                <label>Product Name</label>
                <input type="text" name="strProdName" value=""/>
                <div class="attention">
                    <p>You forgot a field!</p>
                </div>
            </div>

            <div class="fieldgroup required">
                <label>Price</label>
                <input type="text" name="fPrice" value=""/>
                <div class="attention">
                    <p>You forgot a field!</p>
                </div>
            </div>

            <div class="fieldgroup">
                <label>Pictures</label>
                <input type="file" name="strFileName">
            </div>

            <div class="fieldgroup required">
                <label>Category</label>
                <select name="intCatID">
                    <option></option>
                <?php foreach($this->oCat as $data)
                {?>
                    <option value="<?=$data->id?>"><?=$data->strCatName?></option>
                <?php } ?>
                </select>
                <div class="attention">
                    <p>You forgot a field!</p>
                </div>
            </div>
            
            <div class="fieldgroup required">
                <label>Description</label>
                <textarea name="strProdDesc"></textarea>
                <div class="attention">
                    <p>You forgot a field!</p>
                </div>
            </div>

            <div class="fieldgroup required groups">

                <div class="subgroup">
                    <label>Color</label>
                    <select name="intColorID">
                        <option></option>
                        <?php foreach($this->oColors as $colorData) { ?>
                            
                        <option value="<?=$colorData->id?>" ><?=$colorData->strColorName?></option>
                        <?php } ?>
                    </select>
                    <div class="attention">
                        <p>You forgot a field!</p>
                    </div>
                </div><!--subgroup--> 

                <div class="subgroup">
                    <label>Size</label>
                    <select name="intSizeID">
                        <option></option>
                        <?php foreach($this->oSizes as $sizeData) { ?>
                        
                        <option value="<?=$sizeData->id?>"><?=$sizeData->strSizeName?></option>
                        <?php } ?>
                    </select>
                    <div class="attention">
                        <p>You forgot a field!</p>
                    </div>
                </div><!--subgroup-->   

                <div class="subgroup">
                    <label>Qty</label>
                    <input type="text" name="intQty" value="">
                    <div class="attention">
                        <p>You forgot a field!</p>
                    </div>
                </div>
            </div> <!--fieldgroup-->

            <div class="fieldgroup" id="optionSetContainer"></div>
            <input type="submit" value="Add" id="addNewProd"/>
        </form>
     </div>
</div>
<script src="js/validator-newproduct.js"></script> 
            
