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
    height: 60vh;
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

  


.services_section {
    padding: 60px 20px;
    background-color: #f9f9f9;
    font-family: "Roboto", sans-serif;
  }
  
  .section_title {
    font-size: 36px;
    color: #2c7be5;
    text-align: center;
    margin-bottom: 20px;
  }
  
  .section_description {
    text-align: center;
    font-size: 18px;
    margin-bottom: 40px;
    color: #555;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
  }
  
  .services_list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
  }
  
  .service_item {
    background-color: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  
  .service_item h3 {
    font-size: 22px;
    color: #333;
    margin-bottom: 10px;
  }
  
  .service_item p {
    font-size: 16px;
    color: #666;
  }
  
</style>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Services Municipaux — IDOCS MALI</title>
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
            <a href="index.html" class="nav_btn">Accueil</a>
            <a href="solutions.html" class="nav_btn">Nos Solutions</a>
            <a href="login.html" class="nav_btn">Se connecter</a>
          </div>
        </div>
      </div>
    </div>
  </header>

  <section class="services_section">
    <div class="container">
      <h2 class="section_title">Services Municipaux Offerts</h2>
      <p class="section_description">
        Grâce à IDOCS MALI, les citoyens peuvent accéder facilement à plusieurs services municipaux numérisés, sans déplacement ni files d’attente.
      </p>

      <div class="services_list">
        <div class="service_item">
          <h3>Acte de Naissance</h3>
          <p>Demandez, suivez et recevez votre acte de naissance entièrement en ligne.</p>
        </div>

        <div class="service_item">
          <h3>Acte de Mariage</h3>
          <p>Enregistrez ou obtenez une copie certifiée de votre acte de mariage.</p>
        </div>

        <div class="service_item">
          <h3>Acte de Décès</h3>
          <p>Effectuez les démarches pour un acte de décès rapidement via notre portail sécurisé.</p>
        </div>

        <div class="service_item">
          <h3>Certificat de Nationalité</h3>
          <p>Une procédure simplifiée pour faire la demande et obtenir votre certificat de nationalité.</p>
        </div>
      </div>
    </div>
  </section>
  <footer style="text-align: center; padding: 20px; background: #f8f8f8; margin-top: 40px;">
    <p>&copy; 2025 IDOCS MALI — Tous droits réservés</p>
  </footer>
</body>
</html>
