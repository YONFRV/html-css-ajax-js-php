<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php
        include('../sections/menu.php'); 
    ?>
    <section>
        <div class="create-user">
            <form id="create-form" enctype="multipart/form-data">
                <label for="nickname">Nickname</label>
                <input class="controls" type="text" name="nicknamee" id="nickname">
                <label for="full-name">Full Name</label>
                <input class="controls" type="text" name="full-name" id="full-name">
                <label for="user-name">Username</label>
                <input class="controls" type="text" name="user-name" id="user-name">
                <label for="password">Password</label>
                <input class="controls" type="password" name="password" id="password">
                <label for="confirm-password">Confirm Password</label>
                <input class="controls" type="password" name="confirm-password" id="confirm-password">
                <label for="email-address">Email Address</label>
                <input class="controls" type="email" name="" id="email-address">
                <label for="confirt-email-address">Confirm Email Address</label>
                <input class="controls" type="email" name="confirt-email-address" id="confirt-email-address">
                <h4>Social Profile</h4>
                <input class="controls" type="text" name="facebook" id="facebook">
                <input class="controls" type="text" name="x" id="x">
                <label for="imagen">Upload a new avatar. Larger image will be resized automatically. <p>Maximum upload size is <span>1 MB</span></p></label>
                <input type="file" name="imagen" id="imagen" accept="image/*" required>
                <input type="submit" value="Register info">
            </form>
        </div>
    </section>
    <script src="../js/user/createUser.js"></script>
</body>
</html>