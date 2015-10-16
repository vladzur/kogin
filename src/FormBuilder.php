<?php
/**
 * Created by vladzur.
 * Date: 29-09-15
 * Time: 07:14 PM
 */

namespace Vladzur\Kogin;


class FormBuilder
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
            'id' => "input_{$name}",
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
            'cols' => 50
        ];
        $options = $this->mergeOptions($default, $params);
        return "<textarea {$options}>{$text}</textarea>";
    }

    public function button($text = 'Submit', $params = [])
    {
        $default = [
            'type' => 'submit'
        ];
        $options = $this->mergeOptions($default, $params);
        return "<button $options>{$text}</button>";
    }

    public function checkbox($name, $text = null, $params = [])
    {
        $out = $this->input('checkbox', $name, $params);
        if (!isset($text)) {
            $text = $this->upperCaseName($name);
        }
        return $out . $text;
    }

    protected function mergeOptions($default, $params)
    {
        $options = array_merge($default, $params);
        $form_options = [];
        foreach ($options as $key => $value) {
            $form_options [] = "{$key}=\"{$value}\"";
        }
        $string_options = implode(' ', $form_options);
        return $string_options;
    }

    protected function upperCaseName($string)
    {
        $string = str_replace('_', ' ', strtolower($string));
        $string = ucwords($string);
        return $string;
    }

}