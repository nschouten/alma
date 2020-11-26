<div class="register primary">
    <form method="post" action="index.php" id="reg-form">
        <div class="subhandle">
            <h2>Please Fill Out</h2>
            <input type="hidden" name="controller" value="register">
            <input type="hidden" name="action" value="registerUser">
            <!-- <input type="hidden" name="pID" value="<?=$_GET["pID"]?>"> -->

            <div class="fieldgroup required">
                <input type="text" name="strFirstName" placeholder="First Name"/><br/>

            </div>

            <div class="fieldgroup required">
                <input type="text" name="strLastName" placeholder="Last Name"/><br/>

            </div>

            <div class="fieldgroup required">
                <input type="text" name="strEmail" placeholder="Email"/><br/>

            </div>

            <div class="fieldgroup required">
                <input type="password" name="strPassword" placeholder="Password"/><br/>

            </div>
            
            <input type="submit" id="liBtn" value="Register">
            <p>Already have an account?</br>Click <a href="index.php?controller=login&action=userLogin">here</a> to log in.

        </div>
    </form>
</div>
