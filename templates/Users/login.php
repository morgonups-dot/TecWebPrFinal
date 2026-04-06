<?php
/**
 * @var \App\View\AppView $this
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= __('Login') ?></title>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Share+Tech+Mono&display=swap" rel="stylesheet">
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
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                linear-gradient(90deg, transparent 98%, rgba(0, 255, 255, 0.03) 98%),
                linear-gradient(0deg, transparent 98%, rgba(0, 255, 255, 0.03) 98%);
            background-size: 4px 4px;
            pointer-events: none;
            z-index: 1000;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 40px;
            position: relative;
            background: linear-gradient(135deg, rgba(20, 20, 40, 0.9) 0%, rgba(10, 10, 20, 0.95) 100%);
            border: 2px solid #00ffff;
            border-radius: 4px;
            box-shadow: 
                0 0 20px rgba(0, 255, 255, 0.3),
                0 0 40px rgba(0, 255, 255, 0.1),
                inset 0 0 20px rgba(0, 255, 255, 0.05);
            animation: borderGlow 3s ease-in-out infinite;
        }

        @keyframes borderGlow {
            0%, 100% { border-color: #00ffff; box-shadow: 0 0 20px rgba(0, 255, 255, 0.3), 0 0 40px rgba(0, 255, 255, 0.1); }
            50% { border-color: #ff00ff; box-shadow: 0 0 20px rgba(255, 0, 255, 0.3), 0 0 40px rgba(255, 0, 255, 0.1); }
        }

        .login-container::before {
            content: 'ESPERANDO DATOS';
            position: absolute;
            top: -12px;
            left: 20px;
            background: #0a0a0f;
            padding: 0 10px;
            font-family: 'Orbitron', sans-serif;
            font-size: 12px;
            color: #00ffff;
            letter-spacing: 3px;
        }

        .login-container::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #00ffff, #ff00ff, #00ffff, transparent);
            animation: scanline 2s linear infinite;
        }

        @keyframes scanline {
            0% { top: 0; }
            100% { top: 100%; }
        }

        .glitch-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 32px;
            font-weight: 900;
            text-align: center;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 4px;
            margin-bottom: 30px;
            position: relative;
            animation: glitch 2s infinite;
        }

        .glitch-title::before,
        .glitch-title::after {
            content: 'LOGIN';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .glitch-title::before {
            color: #00ffff;
            animation: glitch1 0.3s infinite;
            clip-path: polygon(0 0, 100% 0, 100% 35%, 0 35%);
        }

        .glitch-title::after {
            color: #ff00ff;
            animation: glitch2 0.3s infinite;
            clip-path: polygon(0 65%, 100% 65%, 100% 100%, 0 100%);
        }

        @keyframes glitch {
            0%, 100% { transform: translate(0); }
            20% { transform: translate(-2px, 2px); }
            40% { transform: translate(-2px, -2px); }
            60% { transform: translate(2px, 2px); }
            80% { transform: translate(2px, -2px); }
        }

        @keyframes glitch1 {
            0%, 100% { transform: translate(0); }
            50% { transform: translate(3px, -1px); }
        }

        @keyframes glitch2 {
            0%, 100% { transform: translate(0); }
            50% { transform: translate(-3px, 1px); }
        }

        .language-selector {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .language-selector a {
            font-family: 'Orbitron', sans-serif;
            font-size: 14px;
            padding: 8px 16px;
            border: 1px solid #333;
            color: #666;
            text-decoration: none;
            transition: all 0.3s;
            background: rgba(0, 0, 0, 0.3);
        }

        .language-selector a:hover,
        .language-selector a.active {
            border-color: #00ffff;
            color: #00ffff;
            box-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.8);
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            font-family: 'Orbitron', sans-serif;
            font-size: 11px;
            color: #00ffff;
            margin-bottom: 8px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .form-group input {
            width: 100%;
            padding: 15px;
            background: rgba(0, 0, 0, 0.5);
            border: 1px solid #333;
            border-left: 3px solid #333;
            color: #00ffff;
            font-family: 'Share Tech Mono', monospace;
            font-size: 16px;
            transition: all 0.3s;
            outline: none;
        }

        .form-group input:focus {
            border-color: #00ffff;
            border-left: 3px solid #00ffff;
            box-shadow: 
                0 0 10px rgba(0, 255, 255, 0.3),
                inset 0 0 10px rgba(0, 255, 255, 0.1);
        }

        .form-group input::placeholder {
            color: #444;
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            padding-right: 50px;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            font-size: 20px;
            color: #666;
            transition: all 0.3s;
            padding: 5px;
        }

        .toggle-password:hover {
            color: #00ffff;
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.8);
        }

        .login-btn {
            width: 100%;
            padding: 18px;
            margin-top: 5px;
            font-family: 'Orbitron', sans-serif;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 4px;
            text-transform: uppercase;
            background: linear-gradient(135deg, #ff00ff 0%, #bf00ff 100%);
            color: #fff;
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: all 0.5s;
        }

        .login-btn:hover {
            box-shadow: 
                0 0 20px rgba(255, 0, 255, 0.6),
                0 0 40px rgba(255, 0, 255, 0.3);
            transform: translateY(-2px);
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .error-message {
            background: rgba(255, 0, 0, 0.1);
            border: 1px solid #ff0000;
            color: #ff0000;
            padding: 15px;
            margin-bottom: 20px;
            font-family: 'Share Tech Mono', monospace;
            text-align: center;
            animation: errorBlink 0.5s infinite;
        }

        @keyframes errorBlink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        .corner-decoration {
            position: absolute;
            width: 20px;
            height: 20px;
            border: 2px solid #00ffff;
        }

        .corner-decoration.top-left {
            top: -2px;
            left: -2px;
            border-right: none;
            border-bottom: none;
        }

        .corner-decoration.top-right {
            top: -2px;
            right: -2px;
            border-left: none;
            border-bottom: none;
        }

        .corner-decoration.bottom-left {
            bottom: -2px;
            left: -2px;
            border-right: none;
            border-top: none;
        }

        .corner-decoration.bottom-right {
            bottom: -2px;
            right: -2px;
            border-left: none;
            border-top: none;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="corner-decoration top-left"></div>
        <div class="corner-decoration top-right"></div>
        <div class="corner-decoration bottom-left"></div>
        <div class="corner-decoration bottom-right"></div>
        
        <h1 class="glitch-title">LOGIN</h1>
        
        <?php if ($this->Flash->render('error')): ?>
            <div class="error-message">
                <?= $this->Flash->render('error') ?>
            </div>
        <?php endif; ?>

        <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'login']]) ?>
        
        <div class="form-group">
            <?= $this->Form->label('username', __('Username')) ?>
            <?= $this->Form->text('username', ['placeholder' => __('Enter your email'), 'required' => true, 'autocomplete' => 'off']) ?>
        </div>

        <div class="form-group">
            <?= $this->Form->label('password', __('Password')) ?>
            <div class="password-wrapper">
                <?= $this->Form->password('password', ['placeholder' => __('Enter your password'), 'required' => true, 'id' => 'password-field']) ?>
                <button type="button" class="toggle-password" onclick="togglePassword()">
                    <span id="eye-icon">&#128065;</span>
                </button>
            </div>
        </div>

        <?= $this->Form->button(__('Iniciar Sesión'), ['class' => 'login-btn', 'type' => 'submit']) ?>

        <?= $this->Form->end() ?>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password-field');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.innerHTML = '&#128064;';
            } else {
                passwordField.type = 'password';
                eyeIcon.innerHTML = '&#128065;';
            }
        }
    </script>
</body>
</html>
