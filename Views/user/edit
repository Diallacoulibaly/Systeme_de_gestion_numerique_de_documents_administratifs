<form action="index.php?action=updateProfile" method="POST" enctype="multipart/form-data">
    <label>Nom :</label>
    <input type="text" name="nom" value="<?= $_SESSION['user']['nom'] ?>" required>

    <label>Prénom :</label>
    <input type="text" name="prenom" value="<?= $_SESSION['user']['prenom'] ?>" required>

    <label>Email :</label>
    <input type="email" name="email" value="<?= $_SESSION['user']['email'] ?>" required>

    <label>Téléphone :</label>
    <input type="text" name="telephone" value="<?= $_SESSION['user']['telephone'] ?>">

    <label>Photo de profil :</label>
    <input type="file" name="photo_profil">

    <button type="submit">Mettre à jour</button>
</form>

<!-- Affichage de la photo actuelle -->
<?php if (!empty($_SESSION['user']['photo_profil'])): ?>
    <img src="<?= $_SESSION['user']['photo_profil'] ?>" alt="Photo de profil" width="100">
<?php endif; ?>