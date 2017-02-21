<?php
namespace Test\Models;

use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Uniqueness;

/**
 * Test\Models\Users
 * All the users registered in the application
 */
class Users extends Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var string
     */
    public $mustChangePassword;


    /**
     *
     * @var string
     */
    public $active;
    
    /**
     * Before create the user assign a password
     */
    public function beforeValidationOnCreate()
    {
        if (empty($this->password)) {

            # Generate a plain temporary password
            $tempPassword = preg_replace('/[^a-zA-Z0-9]/', '', base64_encode(openssl_random_pseudo_bytes(12)));

            # The user must change its password in first login
            $this->mustChangePassword = 'Y';

            # Use this password as default
            $this->password = $this->getDI()
                ->getSecurity()
                ->hash($tempPassword);
        } else {
            # The user must not change its password in first login
            $this->mustChangePassword = 'N';
        }
      
    }

    /**
     * Send a confirmation e-mail to the user if the account is not active
     */
    public function afterSave()
    {
    }

    /**
     * Validate that emails are unique across users
     */
    public function validation()
    {
        $validator = new Validation();

        $validator->add('email', new Uniqueness([
            "message" => "The email is already registered"
        ]));

        return $this->validate($validator);
    }

    public function initialize()
    {
     
        $this->hasMany(
            "id",
            __NAMESPACE__ . '\UsersGroups',
            "userId",
            array('alias' => 'usersGroups')
        );
         
        $this->hasManyToMany(
            "id",
               __NAMESPACE__ . '\UsersGroups',
            "userId", "groupId",
               __NAMESPACE__ . '\Groups',
            "id",
            array('alias' => 'groups')
        );

        $this->hasMany('id', __NAMESPACE__ . '\SuccessLogins', 'usersId', [
            'alias' => 'successLogins',
            'foreignKey' => [
                'message' => 'User cannot be deleted because he/she has activity in the system'
            ]
        ]);

        $this->hasMany('id', __NAMESPACE__ . '\PasswordChanges', 'usersId', [
            'alias' => 'passwordChanges',
            'foreignKey' => [
                'message' => 'User cannot be deleted because he/she has activity in the system'
            ]
        ]);

        $this->hasMany('id', __NAMESPACE__ . '\ResetPasswords', 'usersId', [
            'alias' => 'resetPasswords',
            'foreignKey' => [
                'message' => 'User cannot be deleted because he/she has activity in the system'
            ]
        ]);
        
    }
       
}
