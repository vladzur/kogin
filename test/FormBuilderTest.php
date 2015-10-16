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
        $text = $f->input('text', 'username');
        $this->assertEquals('<input type="text" name="username" placeholder="Username">', $text);
        $password = $f->input('password', 'secret');
        $this->assertEquals('<input type="password" name="secret" placeholder="Secret">', $password);
    }

    public function testInputWithParams()
    {
        $f = new FormBuilder();
        $output = $f->input('text', 'username', ['placeholder' => 'User Name']);
        $this->assertEquals('<input type="text" name="username" placeholder="User Name">', $output);
    }

    public function testInputTextDefault()
    {
        $f = new FormBuilder();
        $output = $f->text('class_name');
        $this->assertEquals('<input type="text" name="class_name" placeholder="Class Name">', $output);
    }

    public function testInputPasswordDefault()
    {
        $f = new FormBuilder();
        $output = $f->password('secret');
        $this->assertEquals('<input type="password" name="secret" placeholder="Secret">', $output);
    }

    public function testTextArea()
    {
        $f = new FormBuilder();
        $output = $f->textarea('details', 'lorem ipsum');
        $this->assertEquals('<textarea name="details" rows="3" cols="50">lorem ipsum</textarea>', $output);
    }

    public function testButton()
    {
        $f = new FormBuilder();
        $output = $f->button('Send');
        $this->assertEquals('<button type="submit">Send</button>', $output);
    }

    public function testClose()
    {
        $f = new FormBuilder();
        $output = $f->close();
        $this->assertEquals('</form>', $output);
    }

}