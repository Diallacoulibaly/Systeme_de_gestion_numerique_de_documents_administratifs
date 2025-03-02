<style>
   .animate.form.login_form{
    border: 1px solid black;
    border-radius: 8px;
    border-color: transparent;
    backdrop-filter: blur(20px);
   }
</style>
<body>
    <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="index.php?action=login" method="post">
                    <h1>Formulaire de connexion</h1>
                    <div>
                        <input type="email" name="email" class="form-control" placeholder="Votre email" required="" />
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
                        <input type="text" class="form-control" placeholder="Telephone" name="telephone" required="" />
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
</body>