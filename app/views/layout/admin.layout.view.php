<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Apprenants ODC</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="/assets/css/promo.css?v=<?= time() ?>">
    <link rel="stylesheet" href="assets/css/add-referentiel.css">
    <link rel="stylesheet" href="/assets/css/apprenants.css">
    <link rel="stylesheet" href="assets/css/student-details.css">
    <link rel="stylesheet" href="assets/css/fill-template.css">
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <?php
    // Chargement conditionnel des CSS
    $page = $_GET['page'] ?? 'dashboard';
    switch($page) {
        case 'add_promotion_form':
            echo '<link rel="stylesheet" href="assets/css/add-promotion.css">';
            break;
        case 'promotions':
            echo '<link rel="stylesheet" href="assets/css/promo.css">';
            break;
        // ...autres cas...
    }
    ?>

<style>
    .sidebar {
    position: fixed;
    width: 280px;
    height: 100vh;
    left: 0;
    top: 0;
    background: #FFFFFF;
    color: #333;
    padding: 1rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 4px 0 25px rgba(0, 0, 0, 0.05);
    z-index: 1000;
    overflow-y: auto;
    overflow-x: hidden;
    /* Ajout du trait vertical orange */
    border-right: 4px solid #ff7900;
}

/* Amélioration du style des éléments du menu pour mieux fonctionner avec le trait orange */
.main-nav li {
    margin-bottom: 0.5rem;
    position: relative;
}

.main-nav a {
    display: flex;
    align-items: center;
    padding: 0.8rem 1rem;
    color: #64748b;
    text-decoration: none;
    border-radius: 12px;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

/* Style amélioré pour l'élément actif avec un rappel du orange */
.main-nav li.active a {
    background: rgba(255, 121, 0, 0.1);
    color: #ff7900;
    font-weight: 500;
}

/* Style au survol qui s'harmonise avec le trait orange */
.main-nav a:hover {
    color: #ff7900;
    background: rgba(255, 121, 0, 0.05);
}

/* Logo Sonatel avec bordure orange en bas pour plus de cohérence */
.logo-container {
    padding: 0.5rem 0;
    margin-bottom: 1rem;
    border-bottom: 2px solid #ff7900;
}

/* Style amélioré pour le bouton de déconnexion */
.logout-btn {
    background: rgba(255, 115, 0, 0.938);
    color: white;
    border: none;
    border-radius: 12px;
    padding: 0.8rem;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.logout-btn:hover {
    background: rgba(255, 90, 0, 1);
}
/* Styles pour le profil admin avec encadrement orange */
.admin-profile {
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    transition: transform 0.2s ease;
}

.admin-profile:hover {
    transform: translateY(-2px);
}

.avatar-frame {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    overflow: hidden;
    border: 2px solid #ff7900;
    box-shadow: 0 2px 10px rgba(255, 121, 0, 0.3);
    position: relative;
    transition: all 0.3s ease;
}

.avatar-frame img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.admin-profile:hover .avatar-frame {
    box-shadow: 0 4px 15px rgba(255, 121, 0, 0.5);
}

.admin-name {
    font-weight: 600;
    font-size: 15px;
    color: #333;
}

/* Pour que le bouton de notification soit aligné avec le nouveau design */
.notifications {
    margin-right: 8px;
}
</style>
    
</head>
<body>
    <div class="app-container">
        <div class="sidebar">
            <div class="logo-container">
                <div class="logo">
                    <img style="width: 100px; display: block; margin: auto;" src="assets/images/sonatel-logo.png" alt="Sonatel Academy">
                    <div class="logo-text"></div>
                </div>
                <!-- Afficher la promotion active -->
                <p class="promotion">
                    <?php if (isset($active_promotion) && $active_promotion): ?>
                        <?= htmlspecialchars($active_promotion['name']) ?>
                    <?php else: ?>
                        promo 2007
                    <?php endif; ?>
                </p>
            </div>
            
            <!-- Menu de navigation avec icônes -->
            <nav class="main-nav">
                <ul>
                    <li class="<?= isset($active_menu) && $active_menu === 'dashboard' ? 'active' : '' ?>">
                        <a href="?page=dashboard">
                            <span class="icon"><i class="fas fa-chart-pie"></i></span>
                            <span>Tableau de bord</span>
                        </a>
                    </li>
                    <li class="<?= isset($active_menu) && $active_menu === 'promotions' ? 'active' : '' ?>">
                        <a href="?page=promotions">
                            <span class="icon"><i class="fas fa-graduation-cap"></i></span>
                            <span>Promotions</span>
                        </a>
                    </li>
                    <li class="<?= isset($active_menu) && $active_menu === 'referentiels' ? 'active' : '' ?>">
                        <a href="?page=referentiels">
                            <span class="icon"><i class="fas fa-folder"></i></span>
                            <span>Référentiels</span>
                        </a>
                    </li>
                    <li class="<?= isset($active_menu) && $active_menu === 'apprenants' ? 'active' : '' ?>">
                        <a href="?page=apprenants">
                            <span class="icon"><i class="fas fa-users"></i></span>
                            <span>Apprenants</span>
                        </a>
                    </li>
                    <li class="<?= isset($active_menu) && $active_menu === 'presences' ? 'active' : '' ?>">
                        <a href="?page=presences">
                            <span class="icon"><i class="fas fa-clipboard-check"></i></span>
                            <span>Gestion des présences</span>
                        </a>
                    </li>
                    <li class="<?= isset($active_menu) && $active_menu === 'kits' ? 'active' : '' ?>">
                        <a href="?page=kits">
                            <span class="icon"><i class="fas fa-laptop"></i></span>
                            <span>Kits & Laptops</span>
                        </a>
                    </li>
                    <li class="<?= isset($active_menu) && $active_menu === 'rapports' ? 'active' : '' ?>">
                        <a href="?page=rapports">
                            <span class="icon"><i class="fas fa-chart-bar"></i></span>
                            <span>Rapports & Stats</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div id="bouton">
                <a href="?page=logout" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Déconnexion</span>
                </a>
            </div>
        </div>
        
        <div class="main-content">
            <header class="top-header">
                <div class="search-bar">
                    <i id="icon" class="fa-solid fa-magnifying-glass"></i>
                    <input id="inp" type="text" placeholder="Rechercher...">
                </div>
                
                    <div class="user-menu">
                            <div class="notifications">
                                <i class="fa-regular fa-bell"></i>
                            </div>
                            <div class="admin-profile">
                                <div class="avatar-frame">
                                    <img src="<?= $_SESSION['user']['image'] ?? 'assets/images/maman.jpeg' ?>" 
                                        alt="Photo de profil"
                                        onerror="this.src='assets/images/mama.jpeg'">
                                </div>
                                <div class="admin-name">Madié Admin</div>
                            </div>
                    </div>
                </header>
            
            <!-- Messages flash -->
            <?php if (isset($flash) && $flash): ?>
                <div class="alert alert-<?= $flash['type'] ?>">
                    <?= $flash['message'] ?>
                </div>
            <?php endif; ?>
            
            <!-- Contenu de la page -->
            <div class="page-content">
                <?= $content ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>