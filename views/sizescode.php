<?php 
foreach($this->oSizes as $data)
    { ?>
        <label class="container">
            <?=$data->strSizeName?>
            <input type="radio" name="intSizeTypeID" value="<?=$data->id?>">
            <span class="checkmark"></span>
        </label>
<?php } ?>