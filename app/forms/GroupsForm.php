<?php
namespace Test\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;

class GroupsForm extends Form
{

    public function initialize($entity = null, $options = null)
    {
        if (isset($options['edit']) && $options['edit']) {
            $id = new Hidden('id');
        } else {
            $id = new Text('id');
        }
        
        $id->setFilters(
                [
                    "int"
                ]
            );

        $this->add($id);

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

        $this->add(new Select('active', [
            'Y' => 'Yes',
            'N' => 'No'
        ]));
    }
}
