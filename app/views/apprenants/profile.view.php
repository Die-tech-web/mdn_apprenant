<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord de Présence - Sonatel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .dashboard-title {
            background-color: #e85511;
            color: white;
            padding: 15px 20px;
            margin: 15px;
            border-radius: 10px;
            font-size: 20px;
            font-weight: 300;
        }
        
        .card {
            background-color: white;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            margin: 0 15px 15px 15px;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .user-photo {
            width: 70px;
            height: 70px;
            border-radius: 8px;
            object-fit: cover;
        }
        
        .user-details h2 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 3px;
        }
        
        .user-details p {
            font-size: 14px;
            color: #e85511;
            margin-bottom: 10px;
        }
        
        .info-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
        }
        
        .info-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            background-color: #e85511;
            border-radius: 50%;
            color: white;
            font-size: 16px;
        }
        
        .grid-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 15px;
            margin: 0 15px;
        }
        
        @media (max-width: 768px) {
            .grid-row {
                grid-template-columns: 1fr;
            }
        }
        
        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            font-weight: 600;
        }
        
        .section-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            background-color: #e85511;
            border-radius: 50%;
            color: white;
            font-size: 16px;
        }
        
        .presence-stats {
            display: flex;
            justify-content: space-around;
            margin-top: 15px;
        }
        
        .stat-box {
            width: 80px;
            height: 80px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
        }
        
        .present-bg {
            background-color: #e6f7f0;
        }
        
        .retard-bg {
            background-color: #fff5e6;
        }
        
        .absent-bg {
            background-color: #fee6e6;
        }
        
        .stat-number {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .present {
            color: #1cb47c;
        }
        
        .retard {
            color: #ff9933;
        }
        
        .absent {
            color: #ff6666;
        }
        
        .stat-label {
            font-size: 13px;
            color: #666;
        }
        
        .donut-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .chart-container {
            width: 150px;
            height: 150px;
            position: relative;
            margin: 0 auto;
        }
        
        .chart-legend {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 15px;
        }
        
        .legend-item {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 13px;
        }
        
        .legend-color {
            width: 10px;
            height: 10px;
            border-radius: 2px;
            display: inline-block;
        }
        
        .qr-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
        }
        
        .qr-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .qr-box {
            background-color: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            margin-bottom: 10px;
        }
        
        .qr-code {
            width: 120px;
            height: 120px;
        }
        
        .code-label {
            color: #e85511;
            font-size: 14px;
            margin-top: 5px;
        }
        
        .code-value {
            font-weight: 600;
            font-size: 15px;
        }
        
        .history-section {
            margin: 15px;
        }
        
        .history-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        
        .history-title {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .search-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        
        .search-input {
            padding: 8px 12px;
            border-radius: 6px;
            border: 1px solid #ddd;
            width: 250px;
            font-size: 13px;
        }
        
        .filter-button {
            padding: 8px 12px;
            border-radius: 6px;
            border: 1px solid #ddd;
            background-color: white;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
        }
        
        .filter-icon {
            font-size: 16px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 10px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        
        th {
            color: #666;
            font-weight: 500;
        }
        
        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 15px;
            background-color: #e6f7f0;
            color: #1cb47c;
            font-size: 11px;
            font-weight: 600;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }
        
        .page-button {
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            border: 1px solid #ddd;
            margin: 0 2px;
            cursor: pointer;
            font-size: 13px;
        }
        
        .page-button.active {
            background-color: #e85511;
            color: white;
            border-color: #e85511;
        }
    </style>
</head>
<body>
    <!-- Dashboard Title -->
    <div class="dashboard-title">
        Tableau de Bord
    </div>
    
    <!-- Profile Card -->
    <div class="card">
        <div class="user-info">
            <img src="/api/placeholder/70/70" alt="User Photo" class="user-photo">
            <div class="user-details">
                <h2>Dié Niang</h2>
                <p>DevWeb</p>
                <div class="info-row">
                    <div class="info-icon">✉</div>
                    <span>dieniang32@gmail.com</span>
                </div>
                <div class="info-row">
                    <div class="info-icon">#</div>
                    <span>#DW25005</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Three Column Grid -->
    <div class="grid-row">
        <!-- Presence Statistics Card -->
        <div class="card">
            <div class="section-title">
                <div class="section-icon" style="background-color: #e85511;">
                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="white" stroke-width="2" fill="none">
                        <path d="M4 19h4v-4H4v4zm6 0h4v-8h-4v8zm6 0h4V9h-4v10z"></path>
                    </svg>
                </div>
                <span>Présences</span>
            </div>
            <div class="presence-stats">
                <div class="stat-box present-bg">
                    <div class="stat-number present">41</div>
                    <div class="stat-label">Présent</div>
                </div>
                <div class="stat-box retard-bg">
                    <div class="stat-number retard">1</div>
                    <div class="stat-label">Retard</div>
                </div>
                <div class="stat-box absent-bg">
                    <div class="stat-number absent">0</div>
                    <div class="stat-label">Absent</div>
                </div>
            </div>
        </div>
        
        <!-- Distribution Chart Card -->
        <div class="card">
            <div class="section-title">
                <div class="section-icon" style="background-color: #e85511;">
                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="white" stroke-width="2" fill="none">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                </div>
                <span>Répartition</span>
            </div>
            <div class="donut-container">
                <div class="chart-container">
                    <svg width="150" height="150" viewBox="0 0 150 150">
                        <circle cx="75" cy="75" r="60" fill="transparent" 
                                stroke="#1cb47c" stroke-width="20" 
                                stroke-dasharray="330 377" stroke-dashoffset="-47"/>
                        <circle cx="75" cy="75" r="60" fill="transparent" 
                                stroke="#ff9933" stroke-width="20" 
                                stroke-dasharray="47 377" stroke-dashoffset="0"/>
                        <circle cx="75" cy="75" r="50" fill="white"/>
                    </svg>
                </div>
                <div class="chart-legend">
                    <div class="legend-item">
                        <span class="legend-color" style="background: #1cb47c"></span>
                        <span>Présents</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color" style="background: #ff9933"></span>
                        <span>Retards</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color" style="background: #ff6666"></span>
                        <span>Absents</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- QR Code Card -->
        <div class="card" style="background-color: #FFF8F0; padding: 0;">
            <div style="text-align: center; padding: 15px 0;">
                <div style="display: inline-block; background-color: #e85511; color: white; width: 40px; height: 40px; border-radius: 50%; line-height: 40px; margin-bottom: 10px; text-align: center;">
                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="white" stroke-width="2" fill="none" style="margin: 12px;">
                        <path d="M3 3h6v6H3zM15 3h6v6h-6zM3 15h6v6H3z"></path>
                        <path d="M13 13h2v2h-2zM15 15h2v2h-2zM17 13h2v2h-2zM19 15h2v2h-2zM19 19h2v2h-2zM13 17h2v2h-2zM15 19h2v2h-2zM17 17h2v2h-2zM13 21h2v2h-2zM17 21h2v2h-2z"></path>
                    </svg>
                </div>
                <h3 style="font-size: 18px; margin-bottom: 15px;">Scanner pour la présence</h3>
                
                <div style="background-color: white; width: 180px; height: 180px; margin: 0 auto 15px auto; border-radius: 10px; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                    <img src="/api/placeholder/150/150" alt="QR Code" id="qrCode" style="width: 150px; height: 150px;">
                </div>
                
                <p style="color: #e85511; font-size: 14px; margin-bottom: 5px;">Code de présence personnel</p>
                <p style="font-weight: 600; font-size: 16px;">DW25005</p>
            </div>
        </div>
    </div>
    
    <!-- Attendance History -->
    <div class="card history-section">
        <div class="history-header">
            <div class="history-title">
                <div class="section-icon" style="background-color: #e85511;">
                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="white" stroke-width="2" fill="none">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                </div>
                <span>Historique de présence</span>
            </div>
        </div>
        
        <div class="search-bar" style="margin-top: 15px;">
            <input type="text" placeholder="Rechercher..." class="search-input" style="border-radius: 20px; padding: 8px 15px;">
            <button class="filter-button" style="border-radius: 20px; display: flex; align-items: center; gap: 5px;">
                <svg viewBox="0 0 24 24" width="16" height="16" stroke="#666" stroke-width="2" fill="none">
                    <path d="M22 3H2l8 9.46V19l4 2v-8.54L22 3z"></path>
                </svg>
                <span>Tous les statuts</span>
                <span class="filter-icon">⌄</span>
            </button>
        </div>
        
        <table style="margin-top: 20px;">
            <thead>
                <tr style="background-color: #f9f9f9;">
                    <th style="padding: 10px 20px; border-bottom: 1px solid #eee; font-weight: 500; color: #666;">Date</th>
                    <th style="padding: 10px 20px; border-bottom: 1px solid #eee; font-weight: 500; color: #666;">Statut</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 10px 20px; border-bottom: 1px solid #eee;">24/02/2025 07:23:29</td>
                    <td style="padding: 10px 20px; border-bottom: 1px solid #eee;">
                        <span class="status-badge" style="background-color: #e6f7f0; color: #1cb47c; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">PRESENT</span>
                    </td>
                </tr>
                <tr style="background-color: #f9f9f9;">
                    <td style="padding: 10px 20px; border-bottom: 1px solid #eee;">25/02/2025 07:23:15</td>
                    <td style="padding: 10px 20px; border-bottom: 1px solid #eee;">
                        <span class="status-badge" style="background-color: #e6f7f0; color: #1cb47c; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">PRESENT</span>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 10px 20px; border-bottom: 1px solid #eee;">26/02/2025 07:15:34</td>
                    <td style="padding: 10px 20px; border-bottom: 1px solid #eee;">
                        <span class="status-badge" style="background-color: #e6f7f0; color: #1cb47c; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">PRESENT</span>
                    </td>
                </tr>
                <tr style="background-color: #f9f9f9;">
                    <td style="padding: 10px 20px; border-bottom: 1px solid #eee;">27/02/2025 07:13:31</td>
                    <td style="padding: 10px 20px; border-bottom: 1px solid #eee;">
                        <span class="status-badge" style="background-color: #e6f7f0; color: #1cb47c; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">PRESENT</span>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 10px 20px; border-bottom: 1px solid #eee;">28/02/2025 07:12:29</td>
                    <td style="padding: 10px 20px; border-bottom: 1px solid #eee;">
                        <span class="status-badge" style="background-color: #e6f7f0; color: #1cb47c; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">PRESENT</span>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
            <div style="color: #666; font-size: 13px;">Affichage de 1 à 5 sur 43 entrées</div>
            <div class="pagination" style="display: flex; gap: 5px;">
                <div class="page-button" style="width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; border-radius: 4px; border: 1px solid #ddd; cursor: pointer;">◀</div>
                <div class="page-button active" style="width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; border-radius: 4px; background-color: #e85511; color: white; border: 1px solid #e85511; cursor: pointer;">1</div>
                <div class="page-button" style="width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; border-radius: 4px; border: 1px solid #ddd; cursor: pointer;">2</div>
                <div class="page-button" style="width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; border-radius: 4px; border: 1px solid #ddd; cursor: pointer;">3</div>
                <div class="page-button" style="width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; border-radius: 4px; border: 1px solid #ddd; cursor: pointer;">4</div>
                <div class="page-button" style="width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; border-radius: 4px; border: 1px solid #ddd; cursor: pointer;">5</div>
                <div class="page-button" style="width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; border-radius: 4px; border: 1px solid #ddd; cursor: pointer;">▶</div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Cette partie simule la génération du code QR qui serait normalement faite par PHP
            // Dans une implémentation réelle, le code PHP fourni serait utilisé à la place
            const apprenant = {
                matricule: 'DW25005',
                nom: 'Niang',
                prenom: 'Dié',
                email: 'dieniang32@gmail.sn',
                telephone: '',
                adresse: ''
            };
            
            const qrData = JSON.stringify(apprenant);
            const qrCodeUrl = `https://api.qrserver.com/v1/create-qr-code/?data=${encodeURIComponent(qrData)}&size=150x150`;
            
            const qrCodeImg = document.getElementById('qrCode');
            if (qrCodeImg) {
                qrCodeImg.src = qrCodeUrl;
            }
            
            // Simulation de données pour le graphique
            // Dans une implémentation réelle, ces données viendraient de la base de données
            const presences = 41;
            const retards = 1;
            const absents = 1;
            const total = presences + retards + absents;
            
            // Mise à jour du texte des statistiques
            document.querySelectorAll('.present').forEach(el => el.textContent = presences);
            document.querySelectorAll('.retard').forEach(el => el.textContent = retards);
            document.querySelectorAll('.absent').forEach(el => el.textContent = absents);
        });
    </script>
</body>
</html>