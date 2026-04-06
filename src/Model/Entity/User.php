<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $nombres
 * @property string $apellido_paterno
 * @property string|null $apellido_materno
 * @property string $ci
 * @property string $correo_electronico
 * @property string $departamento
 * @property string $sexo
 * @property string|null $direccion_vivienda
 * @property string|null $telefono
 * @property string|null $telefono_emergencia
 * @property string $password
 * @property bool|null $es_administrador
 * @property string|null $idioma_preferido
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'nombres' => true,
        'apellido_paterno' => true,
        'apellido_materno' => true,
        'ci' => true,
        'correo_electronico' => true,
        'departamento' => true,
        'sexo' => true,
        'direccion_vivienda' => true,
        'telefono' => true,
        'telefono_emergencia' => true,
        'password' => true,
        'es_administrador' => true,
        'idioma_preferido' => true,
        'created' => true,
        'modified' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected array $_hidden = [
        'password',
    ];
}
