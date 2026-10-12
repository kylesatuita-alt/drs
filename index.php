<?php
$pageTitle = 'D. Racing Sims | Home';

// Dummy data. Later this will come from MySQL.
$servers = [
    [
        'name'    => 'Akina',
        'desc'    => 'DRS Racing | Touge | Time Attack & Battles',
        'ip'      => '127.0.0.1',
        'http'    => 8081,
        'players' => 6,
        'max'     => 32,
        'online'  => true,
        'weather' => '22°C',
        'time'    => '05:51',
    ],
    [
        'name'    => 'Akagi',
        'desc'    => 'DRS Racing | Main Server | Touge',
        'ip'      => '127.0.0.1',
        'http'    => 8082,
        'players' => 0,
        'max'     => 32,
        'online'  => true,
        'weather' => '26°C',
        'time'    => '21:36',
    ],
    [
        'name'    => 'Shomaru Pass',
        'desc'    => 'DRS Racing | Shomaru Only | Time Attack',
        'ip'      => '127.0.0.1',
        'http'    => 8083,
        'players' => 0,
        'max'     => 32,
        'online'  => false,
        'weather' => '22°C',
        'time'    => '17:27',
    ],
];

include 'includes/header.php';
?>

<main>
    <!-- HERO -->
    <section class="hero">
        <div class="container hero-inner">
            <img src="assets/img/logo.png" alt="DRS" class="hero-logo">
            <h1>D. <span class="red">Racing</span> Sims</h1>
            <p>Touge battles, time attacks, and leaderboards. Pick a server and hit the road.</p>
            <div class="hero-actions">
                <a href="#servers" class="btn btn-red">View Servers</a>
                <a href="leaderboards.php" class="btn btn-outline">Leaderboards</a>
            </div>
        </div>
    </section>

    <!-- SERVERS -->
    <section class="section" id="servers">
        <div class="container">
            <div class="section-head">
                <h2>Servers</h2>
                <a href="servers.php" class="link">All servers &rarr;</a>
            </div>

            <div class="server-grid">
                <?php foreach ($servers as $s):
                    $percent = $s['max'] > 0 ? round($s['players'] / $s['max'] * 100) : 0;
                    $joinUrl = 'acmanager://race/online/join?ip=' . $s['ip']
                             . '&httpPort=' . $s['http'];
                ?>
                <article class="server-card">
                    <div class="server-cover">
                        <span class="chip"><?= htmlspecialchars($s['weather']) ?> &middot; <?= htmlspecialchars($s['time']) ?></span>
                        <span class="status <?= $s['online'] ? 'on' : 'off' ?>">
                            <?= $s['online'] ? 'Online' : 'Offline' ?>
                        </span>
                    </div>

                    <div class="server-body">
                        <p class="server-desc"><?= htmlspecialchars($s['desc']) ?></p>
                        <h3><?= htmlspecialchars($s['name']) ?></h3>

                        <div class="players">
                            <strong><?= $s['players'] ?></strong>
                            <span>/ <?= $s['max'] ?> drivers</span>
                        </div>
                        <div class="bar"><div class="bar-fill" style="width: <?= $percent ?>%"></div></div>

                        <div class="server-actions">
                            <?php if ($s['online']): ?>
                                <a href="<?= htmlspecialchars($joinUrl) ?>" class="btn btn-red btn-block">Connect</a>
                            <?php else: ?>
                                <span class="btn btn-disabled btn-block">Connect</span>
                            <?php endif; ?>
                            <a href="livetiming.php?server=<?= urlencode($s['name']) ?>" class="btn btn-outline btn-block">Live timing</a>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>