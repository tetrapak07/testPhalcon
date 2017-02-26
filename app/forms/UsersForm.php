<?php
namespace Test\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\Email;

class UsersForm extends Form
{

    public function initialize($entity = null, $options = null)
    {

        # In edition the id is hidden
        if (isset($options['edit']) && $options['edit']) {
            
            $id = new Hidden('id');
            
            $id->setFilters(
                [
                    "int"
                ]
            );

            $this->add($id); 
            
        } else {
            
            $id = new Text('id');
            
            $password = new Password('password', [
            'placeholder' => 'password'
            ]);
            
            $id->setFilters(
                [
                    "int"
                ]
            );

            $this->add($id); 
            
            $password->setFilters(
                [
                    "striptags",
                    "string"
                ]
            );

            $password->addValidators([
                new PresenceOf([
                    'message' => 'Password is required'
                ]),
                new StringLength([
                    'min' => 8,
                    'messageMinimum' => 'Password is too short. Minimum 8 characters'
                ]),
                new Confirmation([
                    'message' => 'Password doesn\'t match confirmation',
                    'with' => 'confirmPassword'
                ])
            ]);


            $this->add($password);

            # Confirm Password
            $confirmPassword = new Password('confirmPassword');
            
            $confirmPassword->setFilters(
                [
                    "striptags",
                    "string"
                ]
            );

            $confirmPassword->addValidators([
                new PresenceOf([
                    'message' => 'The confirmation password is required'
                ])
            ]);

            $this->add($confirmPassword);
        
        }

        $name = new Text('name', [
            'placeholder' => 'Name'
        ]);
        
        $name->setFilters(
            [
                "striptags",
                "string",
                "alphanum"
            ]
        );

        $name->addValidators([
            new PresenceOf([
                'message' => 'The name is required'
            ])
        ]);

        $this->add($name);

        $email = new Text('email', [
            'placeholder' => 'Email'
        ]);
        
        $email->setFilters(
            [
                "email"
            ]
        );

        $email->addValidators([
            new PresenceOf([
                'message' => 'The e-mail is required'
            ]),
            new Email([
                'message' => 'The e-mail is not valid'
            ])
        ]);

        $this->add($email);
        
        $group = new Text('groups', [
            'placeholder' => 'Group'
        ]);

        $this->add($group);
        
        $select = new Select('active', [
            'Y' => 'Yes',
            'N' => 'No'
        ]);
        
        $select->setFilters(
            [
                "striptags",
                "string"
            ]
        );

        $this->add($select);
    }
    
  
}
