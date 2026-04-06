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
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('nombres', ['placeholder' => __('Solo letras')]);
                    echo $this->Form->control('apellido_paterno', ['placeholder' => __('Solo letras')]);
                    echo $this->Form->control('apellido_materno', ['placeholder' => __('Opcional - Solo letras')]);
                    echo $this->Form->control('ci', ['placeholder' => __('Solo números')]);
                    echo $this->Form->control('correo_electronico', ['placeholder' => __('correo@ejemplo.com')]);
                    echo $this->Form->control('departamento', [
                        'options' => [
                            '' => __('Seleccione departamento'),
                            'Santa Cruz' => 'Santa Cruz',
                            'La Paz' => 'La Paz',
                            'Cochabamba' => 'Cochabamba',
                            'Oruro' => 'Oruro',
                            'Potosí' => 'Potosí',
                            'Chuquisaca' => 'Chuquisaca',
                            'Tarija' => 'Tarija',
                            'Beni' => 'Beni',
                            'Pando' => 'Pando'
                        ],
                        'required' => true
                    ]);
                    echo $this->Form->control('sexo', [
                        'options' => [
                            '' => __('Seleccione sexo'),
                            'M' => 'Masculino',
                            'F' => 'Femenino'
                        ],
                        'required' => true
                    ]);
                    echo $this->Form->control('direccion_vivienda', ['placeholder' => __('Dirección completa')]);
                    echo $this->Form->control('telefono', ['placeholder' => __('Solo números')]);
                    echo $this->Form->control('telefono_emergencia', ['placeholder' => __('Solo números')]);
                    echo $this->Form->control('password', ['placeholder' => __('Mínimo 6 caracteres')]);
                    echo $this->Form->control('es_administrador', [
                        'type' => 'select',
                        'options' => [
                            '0' => __('Usuario'),
                            '1' => __('Administrador')
                        ]
                    ]);
                    echo $this->Form->control('idioma_preferido', [
                        'options' => [
                            '' => __('Seleccione idioma'),
                            'es' => 'Español',
                            'en' => 'English'
                        ]
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
