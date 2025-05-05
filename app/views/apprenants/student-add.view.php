<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un apprenant</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        /* Variables de couleurs */
        :root {
          --orange-primary: #ff7900;
          --orange-secondary: #ff9248;
          --orange-light: rgba(255, 121, 0, 0.1);
          --orange-hover: #e56a00;
          --green-primary: #22c55e;
          --green-hover: #16a34a;
          --text-dark: #333333;
          --text-muted: #64748b;
          --border-light: #e2e8f0;
          --bg-light: #f8f9fa;
          --white: #ffffff;
          --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
          --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
          --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
          --radius-sm: 6px;
          --radius-md: 10px;
          --radius-lg: 20px;
          --transition: all 0.3s ease;
          --section-gap: 2rem;
          --input-height: 48px;
        }

        /* Reset et styles de base */
        * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }

        body {
          font-family: 'Poppins', sans-serif;
          background-color: #f9fafb;
          color: var(--text-dark);
          line-height: 1.6;
        }

        .container {
          max-width: 1000px;
          margin: 2rem auto;
          padding: 0;
        }

        /* Formulaire principal */
        .card {
          background-color: var(--white);
          border-radius: var(--radius-md);
          box-shadow: var(--shadow-md);
          overflow: hidden;
          border: none;
          margin-bottom: 2rem;
        }

        .card-header {
          background: linear-gradient(135deg, var(--orange-primary), var(--orange-secondary));
          color: var(--white);
          padding: 1.25rem 2rem;
          border: none;
          position: relative;
        }

        .card-header h3 {
          font-size: 1.5rem;
          font-weight: 600;
          margin: 0;
          text-align: center;
        }

        .card-header::after {
          content: '';
          position: absolute;
          bottom: 0;
          left: 0;
          width: 100%;
          height: 5px;
          background: linear-gradient(90deg, transparent, var(--white), transparent);
          opacity: 0.3;
        }

        .card-body {
          padding: 2rem;
        }

        /* Titres des sections */
        .section-title {
          margin-bottom: 1.5rem;
          position: relative;
          padding-left: 1rem;
          border-left: 4px solid var(--orange-primary);
        }

        .section-title h4 {
          font-size: 1.2rem;
          font-weight: 600;
          color: var(--text-dark);
          display: flex;
          align-items: center;
          gap: 0.75rem;
        }

        .section-title i {
          color: var(--orange-primary);
          font-size: 1.25rem;
        }

        /* Grille du formulaire */
        .row {
          display: flex;
          flex-wrap: wrap;
          margin: 0 -1rem;
        }

        .col-md-6 {
          flex: 0 0 50%;
          max-width: 50%;
          padding: 0 1rem;
        }

        /* Groupes de formulaires */
        .form-group {
          margin-bottom: 1.5rem;
          position: relative;
        }

        label {
          display: block;
          margin-bottom: 0.5rem;
          font-weight: 500;
          color: var(--text-dark);
          font-size: 0.95rem;
        }

        .form-control {
          width: 100%;
          height: var(--input-height);
          padding: 0.75rem 1rem;
          font-size: 1rem;
          border: 1px solid var(--border-light);
          border-radius: var(--radius-sm);
          background-color: var(--white);
          transition: var(--transition);
        }

        .form-control:focus {
          border-color: var(--orange-primary);
          box-shadow: 0 0 0 4px var(--orange-light);
          outline: none;
        }

        .form-control::placeholder {
          color: #a0aec0;
        }

        /* Zone de téléchargement de photo */
        .upload-photo-container {
          position: relative;
          margin-bottom: 1.5rem;
        }

        .photo-input {
          display: none;
        }

        .upload-photo-content {
          border: 2px dashed var(--border-light);
          border-radius: var(--radius-md);
          padding: 2rem;
          text-align: center;
          background-color: var(--bg-light);
          transition: var(--transition);
          cursor: pointer;
          height: 220px;
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
        }

        .upload-photo-content:hover {
          border-color: var(--orange-primary);
          background-color: var(--orange-light);
        }

        .upload-icon {
          margin-bottom: 1rem;
          width: 60px;
          height: 60px;
          background-color: var(--orange-primary);
          border-radius: 50%;
          display: flex;
          align-items: center;
          justify-content: center;
          box-shadow: 0 8px 16px rgba(255, 121, 0, 0.3);
        }

        .upload-icon i {
          font-size: 24px;
          color: var(--white);
        }

        .upload-text {
          display: flex;
          flex-direction: column;
          align-items: center;
          gap: 0.75rem;
        }

        .main-text {
          font-size: 1rem;
          color: var(--text-dark);
          font-weight: 500;
        }

        .sub-text {
          font-size: 0.9rem;
          color: var(--text-muted);
        }

        .btn-browse {
          background-color: var(--orange-primary);
          color: var(--white);
          border: none;
          padding: 0.75rem 1.5rem;
          border-radius: var(--radius-sm);
          font-size: 0.95rem;
          font-weight: 500;
          cursor: pointer;
          transition: var(--transition);
          margin-top: 0.5rem;
        }

        .btn-browse:hover {
          background-color: var(--orange-hover);
          transform: translateY(-2px);
          box-shadow: 0 4px 12px rgba(255, 121, 0, 0.3);
        }

        .file-info {
          margin-top: 0.75rem;
          font-size: 0.85rem;
          color: var(--text-muted);
        }

        /* Sélecteur */
        select.form-control {
          appearance: none;
          background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23333' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
          background-repeat: no-repeat;
          background-position: calc(100% - 15px) center;
          padding-right: 40px;
        }

        /* Boutons d'action */
        .action-buttons {
          display: flex;
          justify-content: flex-end;
          gap: 1rem;
          margin-top: 2rem;
        }

        .btn {
          padding: 0.75rem 1.5rem;
          border-radius: var(--radius-sm);
          font-weight: 500;
          font-size: 1rem;
          transition: var(--transition);
          border: none;
          cursor: pointer;
          display: inline-flex;
          align-items: center;
          justify-content: center;
          gap: 0.5rem;
          min-width: 120px;
          text-decoration: none;
        }

        .btn-success {
          background-color: var(--green-primary);
          color: var(--white);
        }

        .btn-success:hover {
          background-color: var(--green-hover);
          transform: translateY(-2px);
          box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
        }

        .btn-warning {
          background-color: var(--orange-primary);
          color: var(--white);
        }

        .btn-warning:hover {
          background-color: var(--orange-hover);
          transform: translateY(-2px);
          box-shadow: 0 4px 12px rgba(255, 121, 0, 0.3);
        }

        /* Animation pour l'image téléchargée */
        @keyframes fadeIn {
          from { opacity: 0; transform: translateY(10px); }
          to { opacity: 1; transform: translateY(0); }
        }

        .preview-container {
          display: flex;
          flex-direction: column;
          align-items: center;
          animation: fadeIn 0.5s ease;
        }

        .preview-image {
          width: 100px;
          height: 100px;
          border-radius: 50%;
          object-fit: cover;
          border: 3px solid var(--orange-primary);
          box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
          margin-bottom: 1rem;
        }

        .preview-name {
          font-size: 0.9rem;
          color: var(--text-dark);
          margin-bottom: 0.5rem;
        }

        .preview-size {
          font-size: 0.8rem;
          color: var(--text-muted);
        }

        /* Style d'aide et d'erreur */
        .form-text {
          font-size: 0.8rem;
          color: var(--text-muted);
          margin-top: 0.5rem;
        }

        .error-message {
          color: #dc2626;
          font-size: 0.8rem;
          margin-top: 0.5rem;
          display: flex;
          align-items: center;
          gap: 0.5rem;
        }

        .error-message i {
          font-size: 0.9rem;
        }

        /* Effets de survol sur les champs */
        .form-group:hover label {
          color: var(--orange-primary);
        }

        /* Animation du formulaire */
        @keyframes slideIn {
          from { opacity: 0; transform: translateY(20px); }
          to { opacity: 1; transform: translateY(0); }
        }

        .card {
          animation: slideIn 0.5s ease;
        }

        /* Indicateur de champ obligatoire */
        label[for]:after {
          content: "*";
          color: var(--orange-primary);
          margin-left: 4px;
        }

        /* Effets pour le téléchargement de fichier en cours */
        .upload-photo-content.uploading {
          border-color: var(--orange-primary);
          background-color: var(--orange-light);
        }

        .upload-photo-content.uploading .upload-icon {
          animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
          0% { transform: scale(1); }
          50% { transform: scale(1.1); }
          100% { transform: scale(1); }
        }

        /* Pour l'état de glisser-déposer (drag-over) */
        .upload-photo-content.dragover {
          border-color: var(--orange-primary);
          background-color: var(--orange-light);
          transform: scale(1.02);
        }

        /* Media queries pour les appareils mobiles */
        @media (max-width: 768px) {
          .container {
            padding: 1rem;
          }
          
          .card-body {
            padding: 1.5rem;
          }
          
          .col-md-6 {
            flex: 0 0 100%;
            max-width: 100%;
          }
          
          .action-buttons {
            flex-direction: column;
            gap: 0.75rem;
          }
          
          .btn {
            width: 100%;
          }
          
          .row {
            margin: 0;
          }
          
          .col-md-6 {
            padding: 0;
          }
        }

        /* Pour activation du focus des champs */
        input:focus ~ label,
        textarea:focus ~ label,
        select:focus ~ label {
          color: var(--orange-primary);
          font-weight: 600;
        }

        /* Classes utilitaires Bootstrap */
        .text-center {
          text-align: center;
        }

        .mt-4 {
          margin-top: 1.5rem;
        }

        .mb-4 {
          margin-bottom: 1.5rem;
        }

        .mb-3 {
          margin-bottom: 1rem;
        }

        .me-2 {
          margin-right: 0.5rem;
        }

        .text-end {
          text-align: right;
        }

        .d-flex {
          display: flex;
        }

        .align-items-center {
          align-items: center;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Ajout apprenant</h3>
            </div>
            <div class="card-body">
                <form action="?page=add-apprenant-process" method="POST" enctype="multipart/form-data">
                    
                    <!-- Informations de l'apprenant -->
                    <div class="section-title mb-4">
                        <h4 class="d-flex align-items-center">
                            <i class="fas fa-user me-2"></i>
                            Informations de l'apprenant
                        </h4>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="prenom">Prénom(s)</label>
                                <input type="text" name="prenom" id="prenom" class="form-control" required>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="date_naissance">Date de naissance</label>
                                <input type="text" name="date_naissance" id="date_naissance" class="form-control" placeholder="JJ/MM/AAAA" required>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="adresse">Adresse</label>
                                <input type="text" name="adresse" id="adresse" class="form-control" required>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="telephone">Téléphone</label>
                                <input type="text" name="telephone" id="telephone" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" id="nom" class="form-control" required>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="lieu_naissance">Lieu de naissance</label>
                                <input type="text" name="lieu_naissance" id="lieu_naissance" class="form-control" required>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="photoInput">Photo</label>
                                <div class="upload-photo-container">
                                    <input type="file" name="photo" id="photoInput" class="photo-input" accept="image/*">
                                    <label for="photoInput" class="upload-photo-content" id="uploadArea">
                                        <div class="upload-icon">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                        </div>
                                        <div class="upload-text">
                                            <span class="main-text">Glissez et déposez votre photo</span>
                                            <span class="sub-text">ou</span>
                                            <span class="btn-browse">Parcourir</span>
                                        </div>
                                        <div class="file-info" id="fileInfo"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="referentiel_id">Référentiel</label>
                        <select name="referentiel_id" id="referentiel_id" class="form-control" required>
                            <option value="">Sélectionnez un référentiel</option>
                            <?php foreach ($referentiels as $referentiel): ?>
                                <option value="<?= htmlspecialchars($referentiel['id']) ?>">
                                    <?= htmlspecialchars($referentiel['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Informations du tuteur -->
                    <div class="section-title mb-4">
                        <h4 class="d-flex align-items-center">
                            <i class="fas fa-user-tie me-2"></i>
                            Informations du tuteur
                        </h4>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="tuteur_nom">Prénom & Nom</label>
                                <input type="text" name="tuteur_nom" id="tuteur_nom" class="form-control">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="tuteur_adresse">Adresse</label>
                                <input type="text" name="tuteur_adresse" id="tuteur_adresse" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="tuteur_lien">Lien de parenté</label>
                                <input type="text" name="tuteur_lien" id="tuteur_lien" class="form-control">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="tuteur_telephone">Téléphone</label>
                                <input type="text" name="tuteur_telephone" id="tuteur_telephone" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="text-end mt-4 action-buttons">
                        <a href="?page=apprenants" class="btn btn-warning me-2">Annuler</a>
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>