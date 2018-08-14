<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * SymfonyUser Entity
 *
 * @property int $id
 * @property string $fullName
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string|resource $roles
 */
class SymfonyUser extends Entity
{

	/**
	 * Fields that can be mass assigned using newEntity() or patchEntity().
	 *
	 * Note that when '*' is set to true, this allows all unspecified fields to
	 * be mass assigned. For security purposes, it is advised to set '*' to false
	 * (or remove it), and explicitly make individual fields accessible as needed.
	 *
	 * @var array
	 */
	// protected $_accessible = [
	//     'fullName' => true,
	//     'username' => true,
	//     'email' => true,
	//     'password' => true,
	//     'roles' => true
	// ];
	protected $_accessible = ['*' => true, 'id' => false];

	/**
	 * Fields that are excluded from JSON versions of the entity.
	 *
	 * @var array
	 */
	protected $_hidden = ['password'];
}
