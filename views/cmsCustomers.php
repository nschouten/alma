<div class="cms-customers">
    <div class="handle">
        <h3>Current Customers</h3>
        <div class="people">
        <?php
        foreach($this->oCustomers as $data)
        {
            ?> 
            <div class="person">
                <a href="index.php?controller=cms&action=customer&uID=<?=$data->id?>"><?=$data->strFullName?></a>
            </div> <!--.person-->
        <?php 
        } 
        ?>
        </div> <!--.people-->
    </div> <!--.handle-->
</div>