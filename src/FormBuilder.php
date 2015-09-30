<?php
/**
 * Created by vladzur.
 * Date: 29-09-15
 * Time: 07:14 PM
 */

namespace Vladzur\Kogin;


class FormBuilder
{

    public function open($params = [])
    {
        $default = [
            'method' => 'post',
            'action' => ''
        ];
        $options = $this->mergeOptions($default, $params);
        return "<form {$options}>";
    }

    public function input($type, $name, $params = [])
    {
        $default = [
            'type' => $type,
            'name' => $name
        ];
        $options = $this->mergeOptions($default, $params);
        return "<input {$options}>";
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

}