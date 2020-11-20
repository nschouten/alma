<div class="register primary">
    <form method="post" action="index.php" id="reg-form">
        <div class="subhandle">
            <h2>Please Fill Out</h2>
            <input type="hidden" name="controller" value="public">
            <input type="hidden" name="action" value="addUser">
            <input type="hidden" name="success" value="<?=$this->success?>">
            <input type="hidden" name="error" value="<?=$this->error?>">

            <input type="text" name="strFirstName" placeholder="First Name"/><br/>
            <input type="text" name="strLastName" placeholder="Last Name"/><br/>
            <input type="text" name="strEmail" placeholder="Email"/><br/>
            <input type="password" name="strPassword" placeholder="Password"/><br/>

            <input type="submit" id="liBtn" value="Register">
            <p>Already have an account?</br>Click <a href="index.php?controller=public&action=userLogin">here</a> to log in.

        </div>
    </form>
</div>
