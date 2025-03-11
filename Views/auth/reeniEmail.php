<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">
            <form method="POST" action="index.php?action=reset_password">
                <h1>Réinitialiser votre mot de passe</h1>
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
                <div>
                    <input type="password" name="password" class="form-control" placeholder="Nouveau mot de passe"
                        required="" />
                </div>
                <div>
                    <input type="password" name="confirmPassword" class="form-control"
                        placeholder="Confirmer le mot de passe" required="" />
                </div>
                <div>
                    <button type="submit" class="btn btn-default submit">Réinitialiser le mot de passe</button>
                </div>

                <div class="clearfix"></div>
                <br />

                <div>
                    <h1><i class="fa fa-edit"></i> IDocsMali!</h1>
                    <p>©2025 All Rights Reserved. IDocsMali
                    </p>
                </div>
            </form>
        </section>
    </div>