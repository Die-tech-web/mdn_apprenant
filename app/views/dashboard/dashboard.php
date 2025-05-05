<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Sonatel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            padding: 20px;
        }
        
        .stats-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            gap: 15px;
        }
        
        .stat-card {
            flex: 1;
            background-color: #ff8500;
            color: white;
            border-radius: 10px;
            padding: 20px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 15px;
            font-size: 18px;
            color: #ff8500;
        }
        
        .stat-number {
            font-size: 24px;
            font-weight: bold;
        }
        
        .stat-label {
            font-size: 14px;
            opacity: 0.9;
        }
        
        .dashboard-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .left-column {
            width: 25%;
        }
        
        .right-column {
            width: 75%;
        }
        
        .sonatel-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .orange-title {
            color: #ff6600;
            font-weight: bold;
            font-size: 14px;
        }
        
        .sonatel-title {
            color: #008fc8;
            font-weight: bold;
            font-size: 22px;
            margin-bottom: 5px;
        }
        
        .sonatel-square {
            display: inline-block;
            width: 20px;
            height: 20px;
            background-color: #ff6600;
            margin-bottom: 20px;
        }
        
        .sonatel-slogan {
            font-size: 12px;
            color: #777;
            max-width: 200px;
            margin-bottom: 30px;
            line-height: 1.4;
        }
        
        .sonatel-stats {
            display: flex;
            justify-content: space-between;
            padding-top: 20px;
            border-top: 1px dashed #ddd;
        }
        
        .sonatel-stat {
            text-align: center;
        }
        
        .sonatel-stat-number {
            font-weight: bold;
            font-size: 24px;
        }
        
        .sonatel-stat-label {
            font-size: 12px;
            color: #777;
        }
        
        .menu-dots {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
            color: #333;
        }
        
        .chart-container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .chart-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        
        .chart-filter {
            display: flex;
            align-items: center;
            font-size: 14px;
        }
        
        .filter-dropdown {
            padding: 5px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 12px;
            color: #666;
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        
        .filter-dropdown::after {
            content: "▼";
            font-size: 10px;
            margin-left: 5px;
        }
        
        .chart-legend {
            display: flex;
            margin-bottom: 15px;
            gap: 15px;
        }
        
        .legend-item {
            display: flex;
            align-items: center;
            font-size: 12px;
        }
        
        .legend-color {
            width: 12px;
            height: 12px;
            margin-right: 5px;
            border-radius: 2px;
        }
        
        .presence {
            background-color: #00a79d;
        }
        
        .retard {
            background-color: #e0f2f1;
        }
        
        .absences {
            background-color: #ff8500;
        }
        
        .chart-scale {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 200px;
            font-size: 12px;
            color: #aaa;
            position: absolute;
            left: 20px;
        }
        
        .chart {
            height: 200px;
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            position: relative;
            margin-left: 35px;
        }
        
        .chart-column {
            width: 7%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
        }
        
        .chart-bar {
            width: 100%;
            border-radius: 3px 3px 0 0;
        }
        
        .chart-label {
            font-size: 12px;
            color: #777;
            margin-top: 8px;
        }
        
        .apprenant-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .apprenant-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .apprenant-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #ff8500;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 15px;
            color: white;
            font-size: 20px;
        }
        
        .apprenant-number {
            font-size: 26px;
            font-weight: bold;
        }
        
        .apprenant-label {
            font-size: 14px;
            color: #777;
        }
        
        .donut-chart {
            position: relative;
            width: 180px;
            height: 180px;
            margin: 0 auto;
            padding-top: 20px;
        }
        
        .donut-chart svg {
            width: 100%;
            height: 100%;
            transform: rotate(-90deg);
        }
        
        .donut-segment {
            fill: none;
            stroke-width: 25;
        }
        
        .segment-1 {
            stroke: #ff8500;
            stroke-dasharray: 155 565; /* 35% of the circumference */
        }
        
        .segment-2 {
            stroke: #00a79d;
            stroke-dasharray: 410 565; /* 65% of the circumference */
            stroke-dashoffset: -155;
        }
        
        .donut-label {
            position: absolute;
            text-align: center;
            font-size: 12px;
            font-weight: bold;
        }
        
        .label-35 {
            color: #ff8500;
            top: 40px;
            left: 20px;
        }
        
        .label-65 {
            color: #00a79d;
            bottom: 40px;
            right: 20px;
        }
        
        .sonatel-infographic {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            position: relative;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .sonatel-header {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 30px;
        }
        
        .infographic-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
        
        .metric-card {
            text-align: center;
            width: 22%;
        }
        
        .circle-container {
            width: 100px;
            height: 100px;
            margin: 0 auto 10px;
            position: relative;
        }
        
        .circle-outer {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        .circle-inner-100 {
            width: 85%;
            height: 85%;
            border-radius: 50%;
            background-color: #00a79d;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-weight: bold;
            font-size: 20px;
        }
        
        .circle-inner-56 {
            width: 85%;
            height: 85%;
            border-radius: 50%;
            background-color: #e0f2f1;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #00a79d;
            font-weight: bold;
            font-size: 20px;
        }
        
        .metric-title {
            font-size: 12px;
            margin-top: 5px;
            color: #00a79d;
            font-weight: bold;
        }
        
        .metric-subtitle {
            font-size: 16px;
            color: #00a79d;
            font-weight: bold;
        }
        
        .taux-box {
            background-color: #ff8500;
            color: white;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 12px;
            display: inline-block;
            margin-bottom: 5px;
        }
        
        .taux-feminisation {
            background-color: #ff8500;
            color: white;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 12px;
            display: inline-block;
            margin-bottom: 5px;
        }
        
        .dev-container {
            text-align: center;
        }
        
        .dev-label {
            background-color: #ff8500;
            color: white;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 12px;
            display: inline-block;
            margin-bottom: 5px;
        }
        
        .dev-number {
            font-size: 28px;
            font-weight: bold;
            color: #00a79d;
        }
        
        .dev-title {
            font-size: 14px;
            color: #00a79d;
        }
        
        .centres-container {
            text-align: center;
        }
        
        .centres-box {
            background-color: #ff8500;
            color: white;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 16px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 5px;
        }
        
        .centres-icon {
            color: #00a79d;
            font-size: 40px;
            margin-bottom: 5px;
        }
        
        .centres-title {
            font-size: 14px;
            color: #00a79d;
            margin-bottom: 5px;
        }
        
        .centres-list {
            font-size: 10px;
            color: #00a79d;
            line-height: 1.4;
        }
        
        .icon-graduation::before {
            content: '🎓';
        }
        
        .icon-document::before {
            content: '📄';
        }
        
        .icon-people::before {
            content: '👥';
        }
        
        .icon-building::before {
            content: '🏢';
        }
        
        .icon-user::before {
            content: '👤';
        }
        
        .gender-icon-female::before {
            content: '👩';
            color: #ff8500;
            font-size: 16px;
        }
        
        .gender-icon-male::before {
            content: '👨';
            color: #00a79d;
            font-size: 16px;
        }
        
        .highlighted-bar {
            position: relative;
        }
        
        .highlighted-bar::after {
            content: "77";
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #e0f2f1;
            color: #00a79d;
            font-weight: bold;
            padding: 3px 6px;
            border-radius: 3px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <!-- Première rangée: 4 cartes oranges -->
    <div class="stats-row">
        <div class="stat-card">
            <div class="stat-icon icon-graduation"></div>
            <div class="stat-content">
                <div class="stat-number">180</div>
                <div class="stat-label">Apprenants</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon icon-document"></div>
            <div class="stat-content">
                <div class="stat-number">5</div>
                <div class="stat-label">Référentiels</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon icon-people"></div>
            <div class="stat-content">
                <div class="stat-number">5</div>
                <div class="stat-label">Stagiaires</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon icon-building"></div>
            <div class="stat-content">
                <div class="stat-number">13</div>
                <div class="stat-label">Permanant</div>
            </div>
        </div>
    </div>
    
    <!-- Deuxième rangée avec 2 divs -->
    <div class="dashboard-row">
        <!-- Div de gauche -->
        <div class="left-column">
            <div class="sonatel-card">
                <div class="menu-dots">•••</div>
                <div>
                    <div class="orange-title">Orange Digital Center</div>
                    <div class="sonatel-title">sonatel</div>
                    <div class="sonatel-square"></div>
                </div>
                <div class="sonatel-slogan">Transformer la vie des personnes grâce à nos solutions technologiques innovantes et accessibles.</div>
                <div class="sonatel-stats">
                    <div class="sonatel-stat">
                        <div class="sonatel-stat-number">180</div>
                        <div class="sonatel-stat-label">Apprenants</div>
                    </div>
                    <div class="sonatel-stat">
                        <div class="sonatel-stat-number">7</div>
                        <div class="sonatel-stat-label">Promo</div>
                    </div>
                    <div class="sonatel-stat">
                        <div class="sonatel-stat-number">10</div>
                        <div class="sonatel-stat-label">Mois</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Div de droite -->
        <div class="right-column">
            <div class="chart-container">
                <div class="chart-header">
                    <div class="chart-title">Présences statistiques</div>
                    <div class="chart-filter">
                        <div class="filter-dropdown">This Month</div>
                    </div>
                </div>
                
                <div class="chart-legend">
                    <div class="legend-item">
                        <div class="legend-color presence"></div>
                        <span>Présence</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color retard"></div>
                        <span>Retard</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color absences"></div>
                        <span>Absences</span>
                    </div>
                </div>
                
                <div class="chart-scale">
                    <div>100</div>
                    <div>80</div>
                    <div>60</div>
                    <div>40</div>
                    <div>20</div>
                </div>
                
                <div class="chart">
                    <div class="chart-column">
                        <div class="chart-bar retard" style="height: 15%; position: absolute; bottom: 50%; width: 7%; left: 50%; transform: translateX(-50%);"></div>
                        <div class="chart-bar presence" style="height: 50%;"></div>
                        <div class="chart-label">Jan</div>
                    </div>
                    <div class="chart-column">
                        <div class="chart-bar retard" style="height: 20%; position: absolute; bottom: 60%; width: 7%; left: 50%; transform: translateX(-50%);"></div>
                        <div class="chart-bar presence" style="height: 60%;"></div>
                        <div class="chart-label">Feb</div>
                    </div>
                    <div class="chart-column">
                        <div class="chart-bar absences" style="height: 15%; position: absolute; top: 0; width: 7%; left: 50%; transform: translateX(-50%);"></div>
                        <div class="chart-bar retard" style="height: 15%; position: absolute; bottom: 70%; width: 7%; left: 50%; transform: translateX(-50%);"></div>
                        <div class="chart-bar presence" style="height: 70%;"></div>
                        <div class="chart-label">Mar</div>
                    </div>
                    <div class="chart-column">
                        <div class="chart-bar retard" style="height: 20%; position: absolute; bottom: 55%; width: 7%; left: 50%; transform: translateX(-50%);"></div>
                        <div class="chart-bar presence" style="height: 55%;"></div>
                        <div class="chart-label">Apr</div>
                    </div>
                    <div class="chart-column">
                        <div class="chart-bar retard" style="height: 15%; position: absolute; bottom: 45%; width: 7%; left: 50%; transform: translateX(-50%);"></div>
                        <div class="chart-bar presence" style="height: 45%;"></div>
                        <div class="chart-label">May</div>
                    </div>
                    <div class="chart-column">
                        <div class="chart-bar retard" style="height: 5%; position: absolute; bottom: 55%; width: 7%; left: 50%; transform: translateX(-50%);"></div>
                        <div class="chart-bar presence" style="height: 55%;"></div>
                        <div class="chart-label">Jun</div>
                    </div>
                    <div class="chart-column">
                        <div class="chart-bar retard" style="height: 15%; position: absolute; bottom: 65%; width: 7%; left: 50%; transform: translateX(-50%);"></div>
                        <div class="chart-bar presence" style="height: 65%;"></div>
                        <div class="chart-label">Jul</div>
                    </div>
                    <div class="chart-column">
                        <div class="chart-bar retard" style="height: 15%; position: absolute; bottom: 75%; width: 7%; left: 50%; transform: translateX(-50%);"></div>
                        <div class="chart-bar presence highlighted-bar" style="height: 75%;"></div>
                        <div class="chart-label">Aug</div>
                    </div>
                    <div class="chart-column">
                        <div class="chart-bar retard" style="height: 20%; position: absolute; bottom: 65%; width: 7%; left: 50%; transform: translateX(-50%);"></div>
                        <div class="chart-bar presence" style="height: 65%;"></div>
                        <div class="chart-label">Sep</div>
                    </div>
                    <div class="chart-column">
                        <div class="chart-bar retard" style="height: 15%; position: absolute; bottom: 60%; width: 7%; left: 50%; transform: translateX(-50%);"></div>
                        <div class="chart-bar presence" style="height: 60%;"></div>
                        <div class="chart-label">Oct</div>
                    </div>
                    <div class="chart-column">
                        <div class="chart-bar retard" style="height: 10%; position: absolute; bottom: 50%; width: 7%; left: 50%; transform: translateX(-50%);"></div>
                        <div class="chart-bar presence" style="height: 50%;"></div>
                        <div class="chart-label">Nov</div>
                    </div>
                    <div class="chart-column">
                        <div class="chart-bar retard" style="height: 15%; position: absolute; bottom: 70%; width: 7%; left: 50%; transform: translateX(-50%);"></div>
                        <div class="chart-bar presence" style="height: 70%;"></div>
                        <div class="chart-label">Dec</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Troisième rangée avec 2 divs -->
    <div class="dashboard-row">
        <!-- Div de gauche -->
        <div class="left-column">
            <div class="apprenant-card">
                <div class="apprenant-header">
                    <div class="apprenant-icon icon-user"></div>
                    <div>
                        <div class="apprenant-number">180</div>
                        <div class="apprenant-label">Apprenants</div>
                    </div>
                </div>
                <div class="donut-chart">
                    <svg viewBox="0 0 180 180">
                        <circle class="donut-segment segment-1" cx="90" cy="90" r="90"></circle>
                        <circle class="donut-segment segment-2" cx="90" cy="90" r="90"></circle>
                    </svg>
                    <div class="donut-label label-35"><span class="gender-icon-female"></span> 35%</div>
                    <div class="donut-label label-65"><span class="gender-icon-male"></span> 65%</div>
                </div>
            </div>
        </div>
        
        <!-- Div de droite -->
        <div class="right-column">
            <div class="sonatel-infographic">
                <div class="sonatel-header">
                    <div>
                        <div class="orange-title">Orange Digital Center</div>
                        <div class="sonatel-title">sonatel</div>
                        <div class="sonatel-square"></div>
                    </div>
                </div>
                
                <div class="infographic-row">
                    <div class="metric-card">
                        <div class="circle-container">
                            <div class="circle-outer">
                                <div class="circle-inner-100">100%</div>
                            </div>
                        </div>
                        <div class="taux-box">Taux d'insertion</div>
                        <div class="metric-subtitle">Professionnelle</div>
                    </div>
                    
                    <div class="metric-card">
                        <div class="circle-container">
                            <div class="circle-outer">
                                <div class="circle-inner-56">56%</div>
                            </div>
                        </div>
                        <div class="taux-feminisation">Taux de</div>
                        <div class="metric-subtitle">Féminisation</div>
                    </div>
                    
                    <div class="metric-card">
                        <div class="dev-container">
                            <div class="dev-label">Communauté de plus de</div>
                            <div class="dev-number">1000</div>
                            <div class="dev-title">Développeurs</div>
                        </div>
                    </div>
                    
                    <div class="metric-card">
                        <div class="centres-container">
                            <div class="centres-icon">⚪⚪⚪</div>
                            <div class="centres-box">4 Centres</div>
                            <div class="centres-list">Dakar, Diamniado<br>Ziguinchor, et Saint Louis</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>