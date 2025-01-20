
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .stat-card {
        background: white;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .card-title {
        color: #666;
        font-size: 14px;
        font-weight: 600;
    }

    .icon {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .courses .icon { background: #e3f2fd; color: #1e88e5; }
    .students .icon { background: #e8f5e9; color: #43a047; }
    .hours .icon { background: #fff3e0; color: #fb8c00; }
    .success .icon { background: #fff8e1; color: #fdd835; }

    .stat-value {
        font-size: 28px;
        font-weight: bold;
        margin: 10px 0;
    }

    .stat-change {
        font-size: 12px;
        color: #888;
    }

    .positive {
        color: #43a047;
    }
    .text-info {
        width: 50px;
        height: 50px;
        border-radius: 30%;
    }
</style>

<body>
    <div class="stats-container">
        <div class="stat-card courses">
            <div class="card-header">
                <span class="card-title">Cours Total</span>
                <span class="icon">📚</span>
            </div>
            <?php if (!empty($statisticcours)): ?>
                <?php foreach ($statisticcours as $stac): ?>
                    <div class="stat-value"><?php echo($stac); ?></div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="stat-value">0</div>
            <?php endif; ?>
            <div class="stat-change positive">+2 depuis le mois dernier</div>
        </div>

        <div class="stat-card students">
            <div class="card-header">
                <span class="card-title">Étudiants Inscrits</span>
                <span class="icon">👥</span>
            </div>
            <div class="stat-value">573</div>
            <div class="stat-change positive">+48 cette semaine</div>
        </div>

        <div class="stat-card hours">
            <div class="card-header">
                <span class="card-title">Heures Complétées</span>
                <span class="icon">⏰</span>
            </div>
            <div class="stat-value">1,428</div>
            <div class="stat-change positive">+160 cette semaine</div>
        </div>

        <div class="stat-card success">
            <div class="card-header">
                <span class="card-title">Taux de Réussite</span>
                <span class="icon">🏆</span>
            </div>
            <div class="stat-value">89%</div>
            <div class="stat-change positive">+2% depuis le dernier trimestre</div>
        </div>
    </div>
</body>
</html>