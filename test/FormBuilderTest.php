<?php

use Vladzur\Kogin\FormBuilder;

class FormBuilderTest extends PHPUnit_Framework_TestCase
{

    public function testFormOpenDefault()
    {
        $f = new FormBuilder();

        $output = $f->open();
        $this->assertEquals('<form method="post" action="">', $output);
    }

    public function testFormOpenWithParams()
    {
        $f = new FormBuilder();
        $options = [
            'action' => '/self',
            'class' => 'form-horizontal'
        ];
        $output = $f->open($options);
        $this->assertEquals('<form method="post" action="/self" class="form-horizontal">', $output);
    }

    public function testInputDefault()
    {
        $f = new FormBuilder();
        $text = $f->input('text', 'nombre');
        $this->assertEquals('<input type="text" name="nombre">', $text);
        $password = $f->input('password', 'nombre');
        $this->assertEquals('<input type="password" name="nombre">', $password);
    }

}