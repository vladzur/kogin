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
        $this->assertEquals('<div class="form-group"><input type="text" name="username" id="username" placeholder="Username" class="form-control"></div>',
            $text);
    }

    public function testInputWithParams()
    {
        $f = new FormBuilder();
        $output = $f->input('text', 'username', ['placeholder' => 'User Name']);
        $this->assertEquals('<div class="form-group"><input type="text" name="username" id="username" placeholder="User Name" class="form-control"></div>',
            $output);
    }

    public function testInputTextDefault()
    {
        $f = new FormBuilder();
        $output = $f->text('class_name');
        $this->assertEquals('<div class="form-group"><input type="text" name="class_name" id="class_name" placeholder="Class Name" class="form-control"></div>',
            $output);
    }

    public function testInputPasswordDefault()
    {
        $f = new FormBuilder();
        $output = $f->password('secret');
        $this->assertEquals('<div class="form-group"><input type="password" name="secret" id="secret" placeholder="Secret" class="form-control"></div>',
            $output);
    }

    public function testTextArea()
    {
        $f = new FormBuilder();
        $output = $f->textarea('details', 'lorem ipsum');
        $this->assertEquals('<div class="form-group"><textarea name="details" rows="3" cols="50" id="details" class="form-control">lorem ipsum</textarea></div>',
            $output);
    }

    public function testButton()
    {
        $f = new FormBuilder();
        $output = $f->button('Send');
        $this->assertEquals('<button type="submit" class="btn">Send</button>', $output);
    }

    public function testClose()
    {
        $f = new FormBuilder();
        $output = $f->close();
        $this->assertEquals('</form>', $output);
    }

    public function testSelect()
    {
        $f = new FormBuilder();
        $output = $f->select('chooses', ['One', 'Two', 'Three']);
        $this->assertEquals('<div class="form-group"><select name="chooses" id="chooses" class="form-control"><option value="0">One</option><option value="1">Two</option><option value="2">Three</option></select></div>',
            $output);
    }

    public function testCheckbox()
    {
        $f = new FormBuilder();
        $output = $f->checkbox('remember_me');
        $this->assertEquals('<div class="checkbox"><label><input type="checkbox" name="remember_me" id="remember_me">Remember Me</label></div>',
            $output);
    }

}