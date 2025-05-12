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
    height: 100vh;
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
</style>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil — IDOCS MALI</title>
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
                        <a href="" class="nav_btn" >Se connecter</a>
                    </div>
                    
                    
                </div>
                <div class="header_content">
                    <div class="header_empty_wrapper"></div>
                    <div class="header_content_wrapper">
                        <h1 class="header_main_title">Une nouvelle approche numérique pour moderniser la gestion des documents administratifs <span>IDOCS MALI</span></h1>
                        <p class="header_p">Facilitez l'accès, la demande et la délivrance des actes de naissance, mariage, décès et certificats via une plateforme digitale dédiée aux mairies du Mali.</p>
                        
                        <div class="header_btns">
                            <a href="about.php" class="header_btn_bg">EN SAVOIR PLUS</a>
                            <a href="service.php" class="header_btn_outline">Voir nos services</a>
                        </div>
                    </div>
                    <div class="header_links">

                        <div class="header_social">
                            <img src="../public/assets/images/twitter.png" alt="Twitter" class="social_icon" href="www.twitter.com">
                            <img src="../public/assets/images/facebook.png" alt="Facebook" class="social_icon" href="www.facebook.com">
                            <img src="../public/assets/images/linkedin.png" alt="LinkedIn" class="social_icon" href="www.linkedin.com">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>
</html>