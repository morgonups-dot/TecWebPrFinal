<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Share+Tech+Mono&display=swap" rel="stylesheet">
<style>
    .users-index-content {
        padding: 20px;
    }

    .cyber-search-container {
        display: flex;
        gap: 10px;
        margin-bottom: 25px;
        padding: 15px;
        background: rgba(10, 10, 20, 0.8);
        border: 1px solid #00ffff;
        align-items: center;
    }

    .cyber-search-container form {
        display: flex;
        gap: 10px;
        width: 100%;
    }

    .cyber-search-field {
        flex: 0 0 180px;
    }

    .cyber-search-field select {
        width: 100%;
        padding: 10px;
        background: rgba(0, 0, 0, 0.5);
        border: 1px solid #333;
        border-left: 3px solid #00ffff;
        color: #00ffff;
        font-family: 'Share Tech Mono', monospace;
        font-size: 12px;
        outline: none;
        cursor: pointer;
        transition: all 0.3s;
    }

    .cyber-search-field select:hover {
        animation: selectGlitch 0.3s infinite;
        border-color: #00ffff;
        box-shadow: 0 0 15px rgba(0, 255, 255, 0.5);
        text-shadow: 0 0 10px rgba(0, 255, 255, 0.8);
    }

    @keyframes selectGlitch {
        0% { transform: translate(0); }
        20% { transform: translate(-1px, 1px); }
        40% { transform: translate(-1px, -1px); }
        60% { transform: translate(1px, 1px); }
        80% { transform: translate(1px, -1px); }
        100% { transform: translate(0); }
    }

    .cyber-search-field select:focus {
        border-color: #00ffff;
        box-shadow: 0 0 10px rgba(0, 255, 255, 0.3);
    }

    .cyber-search-field select option {
        background: #0a0a0f;
        color: #00ffff;
        padding: 10px;
        font-family: 'Share Tech Mono', monospace;
    }

    .cyber-search-field select option:hover {
        background: rgba(0, 255, 255, 0.3);
        color: #fff;
    }

    .cyber-search-input {
        flex: 1;
    }

    .cyber-search-input input {
        width: 100%;
        padding: 10px;
        background: rgba(0, 0, 0, 0.5);
        border: 1px solid #333;
        border-left: 3px solid #00ffff;
        color: #00ffff;
        font-family: 'Share Tech Mono', monospace;
        font-size: 14px;
        outline: none;
    }

    .cyber-search-input input::placeholder {
        color: #444;
    }

    .cyber-search-input input:focus {
        border-color: #00ffff;
        box-shadow: 0 0 10px rgba(0, 255, 255, 0.3);
        animation: inputGlitch 0.3s infinite;
    }

    @keyframes inputGlitch {
        0% { transform: translate(0); }
        20% { transform: translate(-2px, 2px); }
        40% { transform: translate(-2px, -2px); }
        60% { transform: translate(2px, 2px); }
        80% { transform: translate(2px, -2px); }
        100% { transform: translate(0); }
    }

    .cyber-search-btn {
        padding: 10px 20px;
        background: linear-gradient(135deg, #00ffff 0%, #00cccc 100%);
        color: #0a0a0f;
        border: none;
        font-family: 'Orbitron', sans-serif;
        font-size: 12px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .cyber-search-btn:hover {
        box-shadow: 0 0 20px rgba(0, 255, 255, 0.5);
        transform: translateY(-2px);
    }

    .cyber-clear-btn {
        padding: 10px 20px;
        background: transparent;
        color: #ff0066;
        border: 1px solid #ff0066;
        font-family: 'Orbitron', sans-serif;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 2px;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
    }

    .cyber-clear-btn:hover {
        background: rgba(255, 0, 102, 0.2);
        box-shadow: 0 0 15px rgba(255, 0, 102, 0.5);
    }

    .cyber-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding: 20px;
        background: linear-gradient(90deg, rgba(0, 255, 255, 0.1) 0%, transparent 100%);
        border-left: 4px solid #00ffff;
    }

    .cyber-header h3 {
        font-family: 'Orbitron', sans-serif;
        font-size: 28px;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 3px;
        margin: 0;
        text-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
    }

    .cyber-btn {
        font-family: 'Orbitron', sans-serif;
        padding: 12px 25px;
        background: transparent;
        color: #00ffff;
        border: 2px solid #00ffff;
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 14px;
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }

    .cyber-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(0, 255, 255, 0.3), transparent);
        transition: all 0.5s;
    }

    .cyber-btn:hover {
        background: rgba(0, 255, 255, 0.2);
        box-shadow: 0 0 20px rgba(0, 255, 255, 0.5);
        text-shadow: 0 0 10px rgba(0, 255, 255, 0.8);
        animation: glitchBtn 0.3s infinite;
    }

    .cyber-btn:hover::before {
        left: 100%;
    }

    @keyframes glitchBtn {
        0% { transform: translate(0); }
        20% { transform: translate(-2px, 2px); }
        40% { transform: translate(-2px, -2px); }
        60% { transform: translate(2px, 2px); }
        80% { transform: translate(2px, -2px); }
        100% { transform: translate(0); }
    }

    .cyber-table-wrapper {
        overflow-x: auto;
        max-height: 70vh;
        border: 2px solid #00ffff;
        box-shadow: 0 0 20px rgba(0, 255, 255, 0.2);
    }

    .cyber-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background: rgba(10, 10, 20, 0.9);
        border: 2px solid #00ffff;
        box-shadow: 0 0 20px rgba(0, 255, 255, 0.2), inset 0 0 30px rgba(0, 255, 255, 0.05);
    }

    .cyber-table thead {
        background: linear-gradient(90deg, rgba(0, 255, 255, 0.3) 0%, rgba(255, 0, 255, 0.2) 100%);
    }

    .cyber-table th {
        font-family: 'Orbitron', sans-serif;
        font-size: 11px;
        color: #00ffff;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 12px 10px;
        text-align: left;
        border-right: 1px solid rgba(0, 255, 255, 0.4);
        border-bottom: 2px solid #ff00ff;
        text-shadow: 0 0 8px rgba(0, 255, 255, 0.8);
        position: relative;
    }

    .cyber-table th:last-child {
        border-right: none;
    }

    .cyber-table td {
        font-family: 'Share Tech Mono', monospace;
        font-size: 12px;
        color: #aaa;
        padding: 10px;
        border-right: 1px solid rgba(0, 255, 255, 0.25);
        border-bottom: 1px solid rgba(0, 255, 255, 0.15);
        transition: all 0.3s;
    }

    .cyber-table td:last-child {
        border-right: none;
    }

    .cyber-table tbody tr {
        transition: all 0.3s;
        position: relative;
    }

    .cyber-table tbody tr:hover {
        background: rgba(0, 255, 255, 0.15);
        animation: rowGlitch 0.4s infinite;
    }

    .cyber-table tbody tr:hover td {
        color: #fff;
        text-shadow: 0 0 5px rgba(0, 255, 255, 0.5);
    }

    .cyber-table tbody tr:nth-child(odd):hover {
        background: rgba(255, 0, 255, 0.1);
    }

    @keyframes rowGlitch {
        0% { background: rgba(0, 255, 255, 0.15); }
        25% { background: rgba(255, 0, 255, 0.1); }
        50% { background: rgba(0, 255, 255, 0.2); }
        75% { background: rgba(255, 0, 255, 0.05); }
        100% { background: rgba(0, 255, 255, 0.15); }
    }

    .cyber-table tbody tr::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 3px;
        background: #00ffff;
        transform: scaleY(0);
        transition: transform 0.3s;
    }

    .cyber-table tbody tr:hover::before {
        transform: scaleY(1);
        box-shadow: 0 0 10px rgba(0, 255, 255, 0.8);
    }

    .cyber-table tbody tr:nth-child(odd):hover::before {
        background: #ff00ff;
    }

    .cyber-actions a,
    .cyber-actions form {
        display: inline-block;
        margin-right: 10px;
    }

    .cyber-link {
        font-family: 'Orbitron', sans-serif;
        font-size: 12px;
        color: #00ffff;
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 5px 10px;
        border: 1px solid transparent;
        transition: all 0.3s;
    }

    .cyber-link:hover {
        border-color: #00ffff;
        box-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
        text-shadow: 0 0 5px rgba(0, 255, 255, 0.8);
    }

    .cyber-delete {
        color: #ff0000;
        font-family: 'Orbitron', sans-serif;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
        background: none;
        border: 1px solid transparent;
        cursor: pointer;
        padding: 5px 10px;
        transition: all 0.3s;
    }

    .cyber-delete:hover {
        border-color: #ff0000;
        box-shadow: 0 0 10px rgba(255, 0, 0, 0.5);
        text-shadow: 0 0 5px rgba(255, 0, 0, 0.8);
    }

    .glitch-btn {
        color: #ff0000;
        font-family: 'Orbitron', sans-serif;
        font-size: 16px;
        font-weight: bold;
        background: none;
        border: none;
        cursor: pointer;
        padding: 5px 10px;
        transition: all 0.3s;
    }

    .glitch-btn:hover {
        animation: glitchDelete 0.3s infinite;
        text-shadow: 0 0 15px rgba(255, 0, 0, 0.8);
    }

    @keyframes glitchDelete {
        0% { transform: translate(0); }
        20% { transform: translate(-2px, 2px); }
        40% { transform: translate(-2px, -2px); }
        60% { transform: translate(2px, 2px); }
        80% { transform: translate(2px, -2px); }
        100% { transform: translate(0); }
    }

    .cyber-pagination {
        margin-top: 30px;
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .cyber-pagination ul {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
        gap: 5px;
    }

    .cyber-pagination li {
        font-family: 'Orbitron', sans-serif;
    }

    .cyber-pagination a {
        display: block;
        padding: 8px 15px;
        color: #666;
        text-decoration: none;
        border: 1px solid #333;
        transition: all 0.3s;
    }

    .cyber-pagination a:hover {
        color: #00ffff;
        border-color: #00ffff;
        box-shadow: 0 0 10px rgba(0, 255, 255, 0.3);
    }

    .cyber-pagination .current {
        color: #ff00ff;
        border-color: #ff00ff;
        box-shadow: 0 0 10px rgba(255, 0, 255, 0.3);
    }

    .cyber-counter {
        text-align: center;
        margin-top: 20px;
        font-family: 'Share Tech Mono', monospace;
        color: #666;
    }
</style>

<div class="users-index-content">
    <div class="cyber-header">
        <h3><?= __('Users') ?></h3>
        <?= $this->Html->link(__('+ AGREGAR'), ['action' => 'add'], ['class' => 'cyber-btn']) ?>
    </div>
    
    <div class="cyber-search-container">
        <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'index'], 'type' => 'get']) ?>
        <div class="cyber-search-field">
            <?= $this->Form->select('field', [
                'nombres' => __('Nombres'),
                'apellido_paterno' => __('Apellido Paterno'),
                'apellido_materno' => __('Apellido Materno'),
                'ci' => __('CI'),
                'correo_electronico' => __('Correo'),
                'departamento' => __('Departamento'),
                'sexo' => __('Sexo'),
                'telefono' => __('Teléfono'),
                'es_administrador' => __('Admin'),
                'idioma_preferido' => __('Idioma'),
                'id' => 'ID'
            ], ['value' => $searchField ?? 'nombres', 'empty' => false]) ?>
        </div>
        <div class="cyber-search-input">
            <?= $this->Form->text('q', ['value' => $searchQuery ?? '', 'placeholder' => __('Buscar...')]) ?>
        </div>
        <?= $this->Form->button(__('Buscar'), ['class' => 'cyber-search-btn', 'type' => 'submit']) ?>
        <?php if (!empty($searchQuery)): ?>
            <?= $this->Html->link('X', ['controller' => 'Users', 'action' => 'index'], ['class' => 'cyber-clear-btn']) ?>
        <?php endif; ?>
        <?= $this->Form->end() ?>
    </div>
    
    <div class="cyber-table-wrapper">
    <table class="cyber-table">
        <thead>
            <tr>
                <th></th>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nombres') ?></th>
                <th><?= $this->Paginator->sort('apellido_paterno') ?></th>
                <th><?= $this->Paginator->sort('apellido_materno') ?></th>
                <th><?= $this->Paginator->sort('ci') ?></th>
                <th><?= $this->Paginator->sort('correo_electronico') ?></th>
                <th><?= $this->Paginator->sort('departamento') ?></th>
                <th><?= $this->Paginator->sort('sexo') ?></th>
                <th><?= $this->Paginator->sort('telefono') ?></th>
                <th><?= $this->Paginator->sort('es_administrador') ?></th>
                <th><?= $this->Paginator->sort('idioma_preferido') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->nombres) ?></td>
                <td><?= h($user->apellido_paterno) ?></td>
                <td><?= h($user->apellido_materno) ?></td>
                <td><?= h($user->ci) ?></td>
                <td><?= h($user->correo_electronico) ?></td>
                <td><?= h($user->departamento) ?></td>
                <td><?= h($user->sexo) ?></td>
                <td><?= h($user->telefono) ?></td>
                <td><?= $user->es_administrador ? '<span style="color: #ff00ff;">' . __('Administrador') . '</span>' : '<span style="color: #666;">' . __('Usuario') . '</span>' ?></td>
                <td><?= h($user->idioma_preferido) ?></td>
                <td class="cyber-actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class' => 'cyber-link']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'cyber-link']) ?>
                    <?= $this->Form->postLink(
                        'X',
                        ['action' => 'delete', $user->id],
                        [
                            'method' => 'delete',
                            'confirm' => __('Are you sure you want to delete # {0}?', $user->id),
                            'class' => 'cyber-delete glitch-btn'
                        ]
                    ) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    
    <div class="cyber-paginator">
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
        </div>
        <p class="cyber-counter"><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
