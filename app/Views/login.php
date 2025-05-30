<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('theme'); ?>/assets/login.css" />
    <title>Login </title>
</head>

<body>
    <div class="container" id="container">

        <div class="form-container sign-in-container">
            <form action="<?= site_url('login/authenticate') ?>" method="POST">
                <?= csrf_field() ?>
                <h1>Sign In</h1>
                <div class="social-container"></div>
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert" style="color: red;">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                <input type="text" name="username" placeholder="Username" id="user" class="input" value="<?= old('username') ?>" required />
                <input type="password" name="password" placeholder="Password" id="pass" class="input" data-type="password" required />
                <a href="#"></a>
                <button type="submit" id="btn-submit">Sign In</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <br>
                    <img src="https://png.pngtree.com/png-clipart/20220604/original/pngtree-food-logo-png-image_7932067.png" style="width: 90%; left: 20px; position: relative;" alt="...">
                    <p>If you don't have an account yet, let's register now!</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>

</html>