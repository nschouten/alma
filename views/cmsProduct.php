<?=$this->oProduct->strProdName?>
<div class="cms-product">
    <div class="handle">
        <form method="post" action="index.php" id="editProdForm">
            <input type="hidden" name="controller" value="cms"/>
            <input type="hidden" name="action" value="updateProd"/>
            <input type="hidden" name="pID" value="<?=$this->oProduct->id?>"/>

            <div class="fieldgroup required">
                <label>Product Name</label>
                <input type="text" name="strProdName" value="<?=$this->oProduct->strProdName?>"/>
            </div>

            <div class="fieldgroup required">
                <label>Category</label>
                <input type="text" name="strCatName" value="<?=$this->oProduct->strCatName?>"/>
            </div>

            <div class="fieldgroup required">
                <label>Price</label>
                <input type="text" name="fPrice" value="<?=$this->oProduct->fPrice?>"/>
            </div>

            <div class="fieldgroup required">
                <label>Description</label>
                <textarea name="strProdDesc"><?=$this->oProduct->strProdDesc?></textarea>
            </div>

            <div class="fieldgroup required">
                <?php foreach($this->oInven as $data)
                { ?>
                        <label>Color</label>
                        <input type="text" name="strColorName" value="<?=$data->strColorName?>">
                        <label>Size</label>
                        <input type="text" name="strSizeName" value="<?=$data->strSizeName?>">
                        <label>Qty</label>
                        <input type="text" name="intQty" value="<?=$data->intQty?>">
                        
                    </label>
                <?php } ?>
            </div>
            <input type="submit" value="Update"/>
        </div>
    </div>
</div>