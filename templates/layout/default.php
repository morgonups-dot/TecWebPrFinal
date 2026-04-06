<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = __('User Management System');
$session = $this->request->getSession();
$user = $session->read('Auth.User');
$currentLang = $session->read('Config.language') ?: 'es';

$currentDateTime = date('Y-m-d H:i:s');

$dbStatus = 'CONECTADO';
try {
    $db = \Cake\Datasource\ConnectionManager::get('default');
    $conn = $db->getDriver()->connect();
    $dbStatus = 'CONECTADO';
} catch (\Exception $e) {
    $dbStatus = 'ERROR';
}

$langError = $session->read('Lang.error') ?? '';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Share+Tech+Mono&display=swap" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Share Tech Mono', monospace;
            background: #0a0a0f;
            min-height: 100vh;
            color: #ccc;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                linear-gradient(90deg, transparent 98%, rgba(0, 255, 255, 0.02) 98%),
                linear-gradient(0deg, transparent 98%, rgba(0, 255, 255, 0.02) 98%);
            background-size: 4px 4px;
            pointer-events: none;
            z-index: 1000;
        }

        .cyber-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background: linear-gradient(180deg, rgba(20, 20, 40, 0.95) 0%, rgba(10, 10, 20, 0.95) 100%);
            border-bottom: 2px solid #00ffff;
            position: relative;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.2);
        }

        .cyber-nav::before {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #00ffff, #ff00ff, #00ffff, transparent);
            animation: navGlow 3s linear infinite;
        }

        @keyframes navGlow {
            0% { opacity: 0.5; }
            50% { opacity: 1; }
            100% { opacity: 0.5; }
        }

        .cyber-nav-title a {
            font-family: 'Orbitron', sans-serif;
            font-size: 20px;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 3px;
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
        }

        .cyber-nav-links {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .cyber-nav-links a {
            font-family: 'Orbitron', sans-serif;
            font-size: 12px;
            color: #666;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 2px;
            padding: 8px 15px;
            border: 1px solid transparent;
            transition: all 0.3s;
        }

        .cyber-nav-links a:hover,
        .cyber-nav-links a.active {
            color: #00ffff;
            border-color: #00ffff;
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 255, 255, 0.3);
        }

        .cyber-nav-links .separator {
            color: #333;
            font-size: 14px;
        }

        .cyber-nav-links .logout-btn {
            color: #ff0066;
            border-color: transparent;
        }

        .cyber-nav-links .logout-btn:hover {
            color: #ff0066;
            border-color: #ff0066;
            text-shadow: 0 0 10px rgba(255, 0, 102, 0.8);
            box-shadow: 0 0 15px rgba(255, 0, 102, 0.3);
        }

        .main {
            padding: 30px;
            position: relative;
        }

        .main .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .cyber-flash {
            padding: 15px 20px;
            margin-bottom: 20px;
            border: 1px solid;
            font-family: 'Share Tech Mono', monospace;
        }

        .cyber-flash.success {
            background: rgba(0, 255, 100, 0.1);
            border-color: #00ff64;
            color: #00ff64;
        }

        .cyber-flash.error {
            background: rgba(255, 0, 0, 0.1);
            border-color: #ff0000;
            color: #ff0000;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #333;
            font-family: 'Share Tech Mono', monospace;
            font-size: 12px;
            border-top: 1px solid rgba(0, 255, 255, 0.1);
            margin-top: 30px;
        }

        .footer-line1 {
            color: #00ffff;
            margin-bottom: 8px;
            font-size: 13px;
            letter-spacing: 1px;
        }

        .footer-line2 {
            color: #ff00ff;
            font-size: 14px;
            letter-spacing: 2px;
            font-weight: bold;
        }
    </style>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="cyber-nav">
        <div class="cyber-nav-title">
            <a href="<?= $this->Url->build('/') ?>">TecWeb-II</a>
        </div>
        <div class="cyber-nav-links">
            <?php if ($user): ?>
                <?= $this->Html->link('ES', ['controller' => 'Users', 'action' => 'changeLanguage', 'es'], 
                    ['class' => ($currentLang === 'es' ? 'active' : '')]) ?>
                <?= $this->Html->link('EN', ['controller' => 'Users', 'action' => 'changeLanguage', 'en'], 
                    ['class' => ($currentLang === 'en' ? 'active' : '')])
                ?>
                <span class="separator">|</span>
                <?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'logout-btn']) ?>
            <?php else: ?>
                <?= $this->Html->link('ES', ['controller' => 'Users', 'action' => 'changeLanguage', 'es'], 
                    ['class' => ($currentLang === 'es' ? 'active' : '')]) ?>
                <?= $this->Html->link('EN', ['controller' => 'Users', 'action' => 'changeLanguage', 'en'], 
                    ['class' => ($currentLang === 'en' ? 'active' : '')])
                ?>
            <?php endif; ?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
        <div class="footer-line1">
            <?= h($currentDateTime) ?> // <?= h($dbStatus) ?> <?= $langError ? ' // ERROR AL CAMBIAR IDIOMA' : '' ?>
        </div>
        <div class="footer-line2">
            SC-BO-2026 // Paul A. Castedo .A
        </div>
    </footer>
</body>
</html>
