<!---->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
* {
    padding: 0;
    margin: 0;
    
}
html,body {
    height: 100%;
    font-family: "Roboto", sans-serif;
}
header {
    width: 100%;
    height: 20vh;
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
/* about */
.about_section {
    padding: 60px 20px;
    max-width: 1200px;
    margin: auto;
    font-family: Arial, sans-serif;
    line-height: 1.8;
  }

  .about_section h2 {
    font-size: 32px;
    margin-bottom: 20px;
    color: #2c7be5;
  }

  .about_section p {
    font-size: 18px;
    margin-bottom: 15px;
  }

  .about_highlight {
    background-color: #f1f1f1;
    padding: 20px;
    border-left: 5px solid #2c7be5;
    margin-top: 30px;
  }

  .about_team {
    margin-top: 40px;
  }

  .about_team h3 {
    font-size: 24px;
    margin-bottom: 10px;
  }

  .about_team ul {
    list-style: none;
    padding: 0;
  }

  .about_team ul li {
    padding: 8px 0;
  }
  
</style>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>À propos — IDOCS MALI</title>

</head>
<body>
  <header>
    <div class="container">
      <div class="header_wrapper">
        <div class="header_nav">
          <a href="index.html" class="nav_logo">
            <img src="../public/assets/images/logo.png" alt="Logo IDOCS MALI" class="logo" />
          </a>
          <div class="nav_items">
            <a href="presentation.php" class="nav_btn">Accueil</a>
            <a href="solution.php" class="nav_btn">Nos Solutions</a>
            <a href="#" class="nav_btn">Se connecter</a>
          </div>
        </div>
      </div>
    </div>
  </header>

  <main class="about_section">
    <h2>À propos de IDOCS MALI</h2>
    <p>
      IDOCS MALI est une initiative numérique innovante conçue pour répondre aux
      défis liés à la gestion des documents administratifs dans les mairies du Mali.
      Notre objectif est de simplifier, sécuriser et accélérer les procédures
      d’établissement et de délivrance d’actes civils (naissance, mariage, décès,
      certificats, etc.).
    </p>

    <p>
      Grâce à une plateforme intuitive et accessible, IDOCS MALI permet aux citoyens
      de faire leurs demandes en ligne, de suivre l’avancement du traitement et de
      recevoir leurs documents sans encombre.
    </p>

    <div class="about_highlight">
      <strong>Notre mission :</strong> Digitaliser l’administration locale pour
      améliorer la transparence, l’efficacité et la satisfaction des citoyens.
    </div>

    <div class="about_team">
      <h3>Notre Équipe</h3>
      <ul>
        <li>Mahamadou Diarra — Chef de projet</li>
        <li>Fatoumata Koné — Développeuse full-stack</li>
        <li>Souleymane Traoré — Spécialiste UX/UI</li>
        <li>Fanta Coulibaly — Chargée de communication</li>
      </ul>
    </div>
  </main>

  <footer style="text-align: center; padding: 20px; background: #f8f8f8; margin-top: 40px;">
    <p>&copy; 2025 IDOCS MALI — Tous droits réservés</p>
  </footer>
</body>
</html>
