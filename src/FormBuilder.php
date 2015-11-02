<?php
/**
 * Kogin <vladzur@gmail.com>
 * Copyright (c) 2015 Vladimir Zurita <vladzur@gmail.com>
 *
 * This file is part of Kogin.
 * Kogin is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
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