<?php
/**
 * Created by vladzur.
 * Date: 29-09-15
 * Time: 07:14 PM
 */

namespace Vladzur\Kogin;


class FormBuilder extends Kogin
{
    public $div_open = '<div class="form-group">';
    public $div_close = '</div>';

    public function open($params = [])
    {
        $default = [
            'method' => 'post',
            'action' => ''
        ];
        $options = $this->mergeOptions($default, $params);
        return "<form {$options}>";
    }

    public function close()
    {
        return "</form>";
    }

    public function input($type, $name, $params = [])
    {
        $default = [
            'type' => $type,
            'name' => $name,
            'id' => $name,
            'placeholder' => $this->upperCaseName($name),
            'class' => 'form-control'
        ];
        $options = $this->mergeOptions($default, $params);
        return "{$this->div_open}<input {$options}>{$this->div_close}";
    }

    public function text($name, $params = [])
    {
        return $this->input('text', $name, $params);
    }

    public function password($name, $params = [])
    {
        return $this->input('password', $name, $params);
    }

    public function email($name, $params = [])
    {
        return $this->input('email', $name, $params);
    }

    public function textarea($name, $text, $params = [])
    {
        $default = [
            'name' => $name,
            'rows' => 3,
            'cols' => 50,
            'id' => $name,
            'class' => 'form-control'
        ];
        $options = $this->mergeOptions($default, $params);
        return "{$this->div_open}<textarea {$options}>{$text}</textarea>{$this->div_close}";
    }

    public function button($text = 'Submit', $params = [])
    {
        $default = [
            'type' => 'submit',
            'class' => 'btn'
        ];
        $options = $this->mergeOptions($default, $params);
        return "<button $options>{$text}</button>";
    }

    public function checkbox($name, $text = null, $params = [])
    {
        $default = [
            'type' => 'checkbox',
            'name' => $name,
            'id' => $name
        ];
        $options = $this->mergeOptions($default, $params);
        $input = "<input {$options}>";
        if (!isset($text)) {
            $text = $this->upperCaseName($name);
        }
        return "<div class=\"checkbox\"><label>{$input}{$text}</label></div>";
    }

    public function select($name, $items, $params = [])
    {
        $default = [
            'name' => $name,
            'id' => $name,
            'class' => 'form-control'
        ];
        $options = $this->mergeOptions($default, $params);
        $out = "{$this->div_open}<select {$options}>";
        foreach ($items as $key => $value) {
            $out .= "<option value=\"{$key}\">{$value}</option>";
        }
        $out .= "</select>{$this->div_close}";
        return $out;
    }

}