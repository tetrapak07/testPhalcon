<?php
namespace Test\Models;

use Phalcon\Mvc\Model;


/**
 * Test\Models\UsersGroups
 * 
 */
class UsersGroups extends Model
{
    public $id;
    /**
     *
     * @var integer
     */
    public $userId;

    /**
     *
     * @var string
     */
    public $groupId;
    
    public function initialize()
    {
        $this->belongsTo('userId', __NAMESPACE__ . '\Users', 'id', 
            array('alias' => 'user')
        );
        $this->belongsTo('groupId', __NAMESPACE__ . '\Groups', 'id', 
            array('alias' => 'group')
        );
    }
}
