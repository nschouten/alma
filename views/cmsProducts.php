<a href="index.php?controller=cms&action=addProduct">add product</a>

<?php
foreach($this->oProducts as $data)
{
    ?>
    <a href="index.php?controller=Cms&action=cmsProduct&pID=<?=$data->id?>">
    <h1><?=$data->strProdName?></h1>
    <img src="imgs/<?=$data->strImgFile?>" alt="dress"/>
    </a>
<?php
}
?>
