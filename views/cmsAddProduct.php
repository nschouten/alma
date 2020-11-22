<div class="addProduct"> 
    <div class="handle">

        <input type="text" class="perm" id="productName" name="strProdName" placeholder="Product Name"/>
        <input type="text" class="perm" id="productPrice" name="fPrice" placeholder="Price"/>
        <div class="category">
            <label>Category<label>
                <?php
                foreach($this->oCat as $data)
                {
                    ?> 
                    <input type="checkbox" id="strCatName" name="strCatName"><label><?=$data->strCatName?></label>
                <?php
                }
                ?>
            
        </div>
        <textarea id="productDesc" class="perm" name="strProdDesc" placeholder="Product Description"></textarea>

            <div class="variantTypes">
                <label>Variants</label>
                <?php
                foreach($this->oCat as $data)
                {
                    ?> 
                    <input type="checkbox" id="strCatName" name="strCatName"><label><?=$data->strCatName?></label>
                <?php
                }
                ?>
                <a href="#" id="addVariantOption">Add Variant</a>

                <div class="variantsList"> </div>

                <label>Option Groups</label>
                <a href="#" id="addOptionSet">Add Group</a>

                <div id="optionSetContainer"></div>

            </div> <!--variantTypes -->

        <button id="saveBtn">Save Product</button>
        <button id="load">Load from DB</button>

        <form method="post" action="index.php" id="newProd">
            <input type="hidden" name="controller" value="admin">
            <input type="hidden" name="action" value="saveProduct">
           <textarea id="productJSON" name="strJSONData"></textarea>
        </form>
    </div> 
</div>

