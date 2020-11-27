<div class="cms-addProduct"> 
    <div class="handle">
        <form method="post" action="index.php" id="addProdForm" enctype="multipart/form-data">
            <input type="hidden" name="controller" value="cms">
            <input type="hidden" name="action" value="updateProd">
            <input type="hidden" name="intProductID" value="">

            <div class="fieldgroup required">
                <label>Product Name</label>
                <input type="text" name="strProdName" value="<?=$this->oProduct->strProdName?>"/>
            </div>

            <div class="fieldgroup required">
                <label>Price</label>
                <input type="text" name="fPrice" value="<?=$this->oProduct->fPrice?>"/>
            </div>

            <div class="fieldgroup">
                <label>Pictures</label>
                <input type="file" id="files" name="files" multiple>
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
                <label>Description</label>
                <textarea name="strProdDesc"><?=$this->oProduct->strProdDesc?></textarea>
            </div>

            <div class="fieldgroup required groups">
                <input type="hidden" name="intSku[]" value="">

                <div class="subgroup">
                    <label>Color</label>
                    <select name="intSku[][intColorID]">
                        <option></option>
                        <?php foreach($this->oColors as $colorData) { ?>
                            
                        <option value="<?=$colorData->id?>" <?=$currentlySelected?>><?=$colorData->strColorName?></option>
                        <?php } ?>
                    </select>
                </div><!--subgroup--> 

                <div class="subgroup">
                    <label>Size</label>
                    <select name="intSku[][intSizeID]">
                        <option></option>
                        <?php foreach($this->oSizes as $sizeData) { ?>
                        
                        <option value=""><?=$sizeData->strSizeName?></option>
                        <?php } ?>
                    </select>
                </div><!--subgroup-->   

                <div class="subgroup">
                    <label>Qty</label>
                    <input type="text" name="intSku[][intQty]" value="<?=$data->intQty?>">
                </div>
            </div> <!--fieldgroup-->

            <div class="fieldgroup" id="optionSetContainer"></div>
            <input type="submit" value="Add"/>
        </form>
     </div>
</div>
            
