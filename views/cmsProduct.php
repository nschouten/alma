<div class="cms-product">
    <div class="handle">
        <form method="post" action="index.php" id="editProdForm">
            <h2><?=$this->oProduct->strProdName?></h2>
            <input type="hidden" name="controller" value="cms"/>
            <input type="hidden" name="action" value="updateProd"/>
            <input type="hidden" name="intProductID" value="<?=$this->oProduct->id?>"/>

            <div class="fieldgroup required">
                <label>Product Name</label>
                <input type="text" name="strProdName" value="<?=$this->oProduct->strProdName?>"/>
            </div>

            <div class="fieldgroup required">
                <label>Category</label>
                <select name="intCatID">
                    <option></option>
                <?php foreach($this->oCat as $data)
                {
                    $currentlySelected = ($this->oProduct->intCatID == $data->id) ? "SELECTED" : ""; ?>
                    <option value="<?=$data->id?>" <?=$currentlySelected?>><?=$data->strCatName?></option>
                <?php } ?>
                </select>
            </div>

            <div class="fieldgroup required">
                <label>Price</label>
                <input type="text" name="fPrice" value="<?=$this->oProduct->fPrice?>"/>
            </div>

            <div class="fieldgroup required">
                <label>Description</label>
                <textarea name="strProdDesc"><?=$this->oProduct->strProdDesc?></textarea>
            </div>

            <div class="fieldgroup required groups">
                <?php foreach($this->oInven as $data) { ?>
                <input type="hidden" name="intSku[<?=$data->id?>]" value="<?=$data->id?>">

                    <div class="subgroup">
                        <label>Color</label>
                        <select name="intSku[<?=$data->id?>][intColorID]">
                            <option></option>
                            <?php foreach($this->oColors as $colorData) {
                                
                            $currentlySelected = ($data->intColorID == $colorData->id) ? "SELECTED" : ""; ?>
                            <option value="<?=$colorData->id?>" <?=$currentlySelected?>><?=$colorData->strColorName?></option>
                            <?php } ?>
                        </select>
                    </div><!--subgroup--> 
                    <div class="subgroup">
                        <label>Size</label>
                        <select name="intSku[<?=$data->id?>][intSizeID]">
                            <option></option>
                            <?php foreach($this->oSizes as $sizeData) {
                                
                            $currentlySelected = ($data->intSizeID == $sizeData->id) ? "SELECTED" : ""; ?>
                            
                            <option value="<?=$sizeData->id?>" <?=$currentlySelected?>><?=$sizeData->strSizeName?></option>
                            <?php } ?>
                        </select>
                    </div><!--subgroup-->    
                    <div class="subgroup">
                        <label>Qty</label>
                        <input type="text" name="intSku[<?=$data->id?>][intQty]" value="<?=$data->intQty?>">
                    </div>
                <?php } ?>
            </div> <!--fieldgroup-->
            <input type="submit" value="Update"/>
        </form>
    </div>
</div>