<div class="login primary">
    <form method="post" action="index.php" id="li-form">
        <div class="subhandle">
            <h2>Login</h2>
            <input type="hidden" name="controller" value="login">
            <input type="hidden" name="action" value="processUserLogin">
            <!-- <input type="hidden" name="pID" value="<?=$_GET["pID"]?>"> -->
            <!-- <input type="hidden" name="success" value="<?=$this->success?>">
            <input type="hidden" name="error" value="<?=$this->error?>"> -->
        
            <input type="text" name="strEmail" placeholder="Email"/><br/>
            <input type="password" name="strPassword" placeholder="Password"/><br/>

            <input type="submit" id="liBtn" value="Sign In">
            <p>Don't have an account?</br>Click <a href="index.php?controller=register&action=register">here</a> to register.
        </div>
    </form>
</div>
