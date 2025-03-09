<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>


<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="index.php?action=login" method="post">
                    <h1>Formulaire de connexion</h1>
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                    <div>
                        <input type="email" name="email" class="form-control" placeholder="Votre email" required=""
                            value="" />
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Password"
                            required="" />
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default submit">Se connecter</button>
                        <a class="reset_pass" href="index.php?action=emailVerifyForm">Mot de passe oublier?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Vous-etes nouveau ?
                            <a href="#signup" class="to_register"> Creeer un compte </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-edit"></i> IDocsMali!</h1>
                            <p>©2025 All Rights Reserved. IDocsMali
                            </p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <form action="index.php?action=register" method="post">
                    <h1>Creer un compte</h1>
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                    <div>
                        <input type="text" class="form-control" placeholder="Nom" name="nom" required=""
                            value="<?php echo isset($_SESSION['nom']) ? $_SESSION['nom'] : ''; ?>" />
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Prenom" name="prenom" required=""
                            value="<?php echo isset($_SESSION['prenom']) ? $_SESSION['prenom'] : ''; ?>" />
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Adresse" name="adresse" required=""
                            value="<?php echo isset($_SESSION['adresse']) ? $_SESSION['adresse'] : ''; ?>" />
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Telephone" name="telephone" required=""
                            value="<?php echo isset($_SESSION['telephone']) ? $_SESSION['telephone'] : ''; ?>" />
                    </div>
                    <div>
                        <input type="email" class="form-control" placeholder="Email" name="email" required=""
                            value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password"
                            required="" />
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default submit">S'inscrire</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Vous avez un deja un compte?
                            <a href="#signin" class="to_register"> Connectez-vous </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-edit"></i> IDocsMali!</h1>
                            <p>©2025 All Rights Reserved. IDocsMali
                            </p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>



<?php if (isset($_SESSION['error'])): ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: '<?php echo $_SESSION['error']; ?>'
});
</script>
<?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['success'])): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Succès !',
    text: '<?php echo $_SESSION['success']; ?>'
});
</script>
<?php unset($_SESSION['success']); ?>
<?php endif; ?>






<!-- <body>
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="index.php?action=login" method="post">
                        <h1>Formulaire de connexion</h1>
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="Votre email"
                                required="" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password"
                                required="" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit">Se connecter</button>
                            <a class="reset_pass" href="#">Mot de passe oublier?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Vous-etes nouveau ?
                                <a href="#signup" class="to_register"> Creer un compte </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-edit"></i> IDocsMali!</h1>
                                <p>©2025 All Rights Reserved. IDocsMali
                                </p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form action="index.php?action=register" method="post">
                        <h1>Creer un compte</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Nom" name="nom" required="" />
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Prenom" name="prenom" required="" />
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Adrese" name="adresse" required="" />
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Telephone" name="telephone"
                                required="" />
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="Email" name="email" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" name="password"
                                required="" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit">S'inscrire</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Vous avez un deja un compte?
                                <a href="#signin" class="to_register"> Connectez-vous </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-edit"></i> IDocsMali!</h1>
                                <p>©2025 All Rights Reserved. IDocsMali
                                </p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body> -->