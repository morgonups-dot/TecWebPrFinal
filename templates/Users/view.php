<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($user->nombres) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombres') ?></th>
                    <td><?= h($user->nombres) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apellido Paterno') ?></th>
                    <td><?= h($user->apellido_paterno) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apellido Materno') ?></th>
                    <td><?= h($user->apellido_materno) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ci') ?></th>
                    <td><?= h($user->ci) ?></td>
                </tr>
                <tr>
                    <th><?= __('Correo Electronico') ?></th>
                    <td><?= h($user->correo_electronico) ?></td>
                </tr>
                <tr>
                    <th><?= __('Departamento') ?></th>
                    <td><?= h($user->departamento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sexo') ?></th>
                    <td><?= $user->sexo === 'M' ? __('Masculino') : __('Femenino') ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefono') ?></th>
                    <td><?= h($user->telefono) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefono Emergencia') ?></th>
                    <td><?= h($user->telefono_emergencia) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idioma Preferido') ?></th>
                    <td><?= $user->idioma_preferido === 'es' ? __('Español') : __('English') ?></td>
                </tr>
                <tr>
                    <th><?= __('Es Administrador') ?></th>
                    <td><?= $user->es_administrador ? __('Sí') : __('No') ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Direccion Vivienda') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->direccion_vivienda)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>