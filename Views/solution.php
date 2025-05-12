<!---->
<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
* {
    padding: 0;
    margin: 0;
}
body {
    font-family: "Roboto", sans-serif;
}
header {
    width: 100%;
    height: 80vh;
    background-image: url(../public/assets/images/freepik__the-style-is-candid-image-photography-with-natural__76361.jpeg);
    backdrop-filter: blur(8px) !important;
    background-size: cover;
    background-repeat: no-repeat;
}
.container {
    max-width: 1340px;
    margin: 0 auto;
}
/* navbar */
.header_nav {
    width: 100%;
    height: 80px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.nav_link {
    text-decoration: none;
    color: #fff;
    font-weight: 300;
    margin-left: 20px;
    font-size: 14px;
}
/* header content */
.header_content {
    width: 100%;
    height: calc(100vh - 80px);
    display: flex;
    flex-direction: column;
    justify-content: space-around;
}
.header_main_title {
    font-size: 72px;
    font-weight: 300;
    color: #fff;
    width: 70%;
}
.header_main_title > span {
    font-weight: 700;

}
.header_p {
    margin: 20px 0px 45px 0px;
    color: #fff;
}.header_btn_bg {
    padding: 15px 25px;
    background-color: #fff;
    text-decoration: none;
    color: #333;
    border: 1px solid #fff;
}
.header_btn_outline {
    padding: 15px 25px;
    border: 1px solid #fff;
    text-decoration: none;
    color: #fff;
    margin-left: 15px;
}
.header_links {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.header_link_name {
    font-size: 32px;
    color: #fff;
    font-weight: 500;
}
.header_link_number {
    color: #a8a8a8;
}
.header_link_number > b {
    font-size: 32px;
}
.social_icon {
    margin-left: 20px;
}
.nav_btn {
    background-color: #fff;
    color: #333;
    text-decoration: none;
    padding: 10px 20px;
    margin-left: 10px;
    
    font-weight: bold;
    display: inline-block;
    transition: background-color 0.3s ease;
}

.nav_btn:hover {
    background-color: transparent !important;
}

  


/* Section solutions */
.solutions_section {
    padding: 60px 20px;
    background-color: #f9f9f9;
}

.section_title {
    font-size: 32px;
    color: #2c7be5;
    margin-bottom: 20px;
    text-align: center;
}

.section_description {
    font-size: 18px;
    color: #333;
    margin-bottom: 40px;
    text-align: center;
}

.solutions_list {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
}

.solution_item {
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.solution_item h3 {
    font-size: 24px;
    color: #333;
    margin-bottom: 15px;
}

.solution_item p {
    font-size: 16px;
    color: #666;
}

@media (max-width: 768px) {
    .solutions_list {
        grid-template-columns: 1fr 1fr;
    }
}

@media (max-width: 480px) {
    .solutions_list {
        grid-template-columns: 1fr;
    }
}

</style>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Solutions — IDOCS MALI</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="header_wrapper">
                <div class="header_nav">
                    <a href="#" class="nav_logo">
                        <img src="../public/assets/images/logo.png" alt="Logo IDOCS MALI" class="logo">
                    </a>
                    <div class="nav_items">
                        <a href="presentation.php" class="nav_btn">Accueil</a>
                        <a href="solution.php" class="nav_btn">Nos Solutions</a>
                        <a href="login.html" class="nav_btn">Se connecter</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="solutions_section">
        <div class="container">
            <h2 class="section_title">Nos Solutions Numériques</h2>
            <p class="section_description">
                Découvrez nos solutions innovantes pour faciliter la gestion des documents administratifs dans les mairies du Mali.
                Nous vous proposons des outils pour digitaliser, sécuriser et optimiser les démarches administratives.
            </p>
            <div class="solutions_list">
                <div class="solution_item">
                    <h3>Gestion des Actes Civils</h3>
                    <p>Numérisation des actes de naissance, mariage, décès et certificats pour une gestion plus rapide et sécurisée.</p>
                </div>
                <div class="solution_item">
                    <h3>Plateforme de Demandes en Ligne</h3>
                    <p>Permet aux citoyens de faire leurs demandes d’actes en ligne, de suivre leur statut et d’obtenir leurs documents sans se déplacer.</p>
                </div>
                <div class="solution_item">
                    <h3>Système de Paiement Intégré</h3>
                    <p>Intégration d’un système de paiement mobile pour simplifier les démarches de paiement des actes administratifs.</p>
                </div>
                <div class="solution_item">
                    <h3>Archivage Sécurisé</h3>
                    <p>Une solution d’archivage électronique pour une conservation longue durée des documents administratifs, accessible en tout temps.</p>
                </div>
            </div>
        </div>
    </section>

   
        <footer style="text-align: center; padding: 20px; background: #f8f8f8; margin-top: 40px;">
            <p>&copy; 2025 IDOCS MALI — Tous droits réservés</p>
          </footer>

</body>
</html>