<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
        <section class="information">
            <nav>
                <ul>
                    <li>User info</li>
                    <li>Billing Information</li>
                </ul>
            </nav>
            <div class="edit-user">
                <form id="update-form">
                    <input style="display:none"type="text" name="id" id="id">
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
                    <input type="submit" value="Update info">
                </form>
            </div>
        </section>
        <section class="card">
            <div>
                <div class="data-information">
                    <h4 id="full-name-information">nmbmnb mn</h4>
                    <p id="nickname">.,mn ,mb</p>
                </div>
                <div class="image-perfil">
                    <img id="image">
                </div>
                <div class="form-image">
                        <form id="formulario" enctype="multipart/form-data">
                            <label for="imagen">Upload a new avatar. Larger image will be resized automatically. <p>Maximum upload size is <span>1 MB</span></p></label>
                            <input class="imagen" type="file" name="imagen" id="imagen"  accept="image/*" required>
                            <input type="button" value="Upload New Photo" onclick="subirImagen()">
                        </form>
                    <div>Member Since: <p id="currenDate"></p></div>
                </div>
            </div>
        </section>
        <script src="../assets/js/editUser.js"></script>
</body>
</html>