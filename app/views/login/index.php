<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $data['judul'] ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/css/style.css">
</head>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form>
                <h1>Hallo, Admin!</h1>
            </form>
        </div>
        <div class="form-container sign-in">
            <form class="form" id="b-form" method="post" action="<?= BASEURL; ?>/login/cek_login">
                <h1>Sign In</h1>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <a href="">Forget Your Password?</a>
                <button>Sign In</button>
            </form>
        </div>
        <div class="toogle-container">
            <div class="toogle">
                <div class="toogle-panel toogle-left">
                    <h1>Welcome!</h1>
                    <p>Our aim is to create this website as a requirement for the third semester final assignment</p>
                    <button class="hidden" id="login">Back To Page</button>
                </div>
                <div class="toogle-panel toogle-right">
                    <img src="<?= BASEURL ?>/img/logo_jti_baru.png" width="50" height="50">
                    <h1>Inventory JTI</h1>
                    <p>A website for processing goods loans at JTI Polinema</p>
                    <button class="hidden" id="register">Lihat Selengkapnya</button>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= BASEURL ?>/js/script.js"></script>
</body>
</html>