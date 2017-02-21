<?php
namespace Test\Models;

use Phalcon\Mvc\Model;

/**
 * Test\Models\Groups
 * All the groups in the application.
 */
class Groups extends Model
{

    /**
     * ID
     * @var integer
     */
    public $id;

    /**
     * Name
     * @var string
     */
    public $name;

    /**
     * Define relationships to Users and Permissions
     */
    public function initialize()
    {

         $this->hasMany(
            "id",
            __NAMESPACE__ . '\UsersGroups',
            "groupId",
            array('alias' => 'groupsUsers')     
        );
        
        $this->hasManyToMany(
            "id",
            __NAMESPACE__ . '\UsersGroups',
            "groupId",
            "userId",
            __NAMESPACE__ . '\Users',
            "id",
            array('alias' => 'users')
        );

    }
}
