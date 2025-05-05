<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Apprenant</title>
    <link rel="stylesheet" href="/assets/css/apprenant.css">
    <style>
      .js-loading * {
        visibility: hidden;
      }
    </style>
    <script>
      document.documentElement.classList.add('js-loading');
      window.addEventListener('DOMContentLoaded', function() {
        document.documentElement.classList.remove('js-loading');
      });
    </script>
    <style>/* CSS pour l'en-tête principal */
.main-header {
    background-color: #e85511; /* Couleur orange de Sonatel */
    padding: 15px 0;
    position: sticky;
    top: 0;
    width:100%;
    z-index: 100;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.header-content {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
}

.site-title {
    color: white;
    font-size: 20px;
    font-weight: 600;
    margin: 0;
}

.nav-links {
    display: flex;
    gap: 20px;
}

.nav-link {
    color: white;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    padding: 5px 10px;
    border-radius: 4px;
    transition: background-color 0.2s;
}

.nav-link:hover {
    background-color: rgba(255, 255, 255, 0.2);
}

/* Pour la version mobile */
@media (max-width: 768px) {
    .header-content {
        flex-direction: column;
        gap: 10px;
    }
    
    .nav-links {
        width: 100%;
        justify-content: center;
    }
}</style>
</head>
<body>
    <header class="main-header">
        <div class="header-content">
            <h1 class="site-title">Espace Apprenant</h1>
            <nav class="nav-links">
                <a href="?page=apprenant-profile" class="nav-link">Mon Profil</a>
                <a href="?page=logout" class="nav-link">Déconnexion</a>
            </nav>
        </div>
    </header>

    <main class="container">
        <!-- Carte de profil -->
        <div class="profile-card">
            <div class="profile-banner">
                <img src="<?= $apprenant['photo'] ?? '/assets/images.png' ?>" 
                     alt="Photo de profil" 
                     class="profile-image">
            </div>
            <div class="profile-info">
                <h2 class="profile-name"><?= htmlspecialchars($apprenant['prenom'] . ' ' . $apprenant['nom']) ?></h2>
                <p class="profile-job"><?= htmlspecialchars($referentiel['name'] ?? 'Dev WEB/mobile') ?></p>
                <div class="profile-contact">
                    <div class="contact-info">
                        <span class="contact-icon">✉</span>
                        <span><?= htmlspecialchars($apprenant['email']) ?></span>
                    </div>
                    <div class="contact-info">
                        <span class="contact-icon">🆔</span>
                        <span><?= htmlspecialchars($apprenant['matricule']) ?></span>
                    </div>
                </div>
            </div>
        </div>

        <?= $content ?? '' ?>
    </main>
</body>
</html>