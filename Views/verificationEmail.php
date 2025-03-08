<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">
            <form method="POST" action="index.php?action=emailVerify">
                <h1>Mot de passe oublié ?</h1>
                <div>
                    <input type="email" name="email" class="form-control" placeholder="Entrez votre email :"
                        required="" />
                </div>
                <div>
                    <button type="submit" class="btn btn-default submit">Envoyer le lien de réinitialisation</button>
                </div>
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