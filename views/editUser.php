<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style-card.css">
    <link rel="stylesheet" href="../assets/css/style-information.css">
</head>

<body>
    <section class="information">
        <nav>
            <h1>Edit Profile</h1>
            <ul>
                <li>User info</li>
                <li>Billing Information</li>
            </ul>
        </nav>
        <div class="edit-user">
            <form id="update-form">
                <input style="display:none" type="text" name="id" id="id">

                <div class="row">
                    <div class="column">
                        <label for="full-name">Full Name</label>
                        <input class="controls" type="text" name="full-name" id="full-name">
                    </div>
                    <div class="column">
                        <label for="user-name">Username</label>
                        <input class="controls" type="text" name="user-name" id="user-name">
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <label for="password">Password</label>
                        <input class="controls" type="password" name="password" id="password">
                    </div>
                    <div class="column">
                        <label for="confirm-password">Confirm Password</label>
                        <input class="controls" type="password" name="confirm-password" id="confirm-password">
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <label for="email-address">Email Address</label>
                        <input class="controls" type="email" name="" id="email-address">
                    </div>
                    <div class="column">
                        <label for="confirt-email-address">Confirm Email Address</label>
                        <input class="controls" type="email" name="confirt-email-address" id="confirt-email-address">
                    </div>
                </div>
                <h4>Social Profile</h4>
                <div class="row">
                    <div class="column"> <input class="controls" type="text" name="facebook" id="facebook">
                    </div>
                    <div class="column"> <input class="controls" type="text" name="x" id="x">
                    </div>
                </div>
                <input class="button-update" type="submit" value="Update info">
            </form>
        </div>
    </section>
    <section class="card">
        <div>
            <div class="data-information">
                <h4 id="full-name-information"></h4>
                <p id="nickname"></p>
            </div>
            <div class="image-perfil">
                <img id="image">
            </div>
            <div class="form-image">
                <form id="formulario" enctype="multipart/form-data">
                    <input class="button" type="button" value="Upload New Photo" onclick="subirImagen()">
                    <br>
                    <div class="button-image">
                        <label for="imagen">Upload a new avatar. Larger image will be resized automatically. <p>Maximum
                                upload size is <span>1 MB</span></p></label>
                        <input class="imagen" type="file" name="imagen" id="imagen" accept="image/*" required>
                    </div>
                </form>
                <div class="date">Member Since: <strong id="currenDate"></strong></div>
            </div>
        </div>
    </section>
    <script src="../assets/js/editUser.js"></script>
    <script src="../assets/js/general/currentDate.js"></script>
</body>

</html>