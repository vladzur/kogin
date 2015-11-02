<?php
/**
 * Created by vladzur.
 * Date: 01-11-15
 * Time: 10:26 PM
 */

namespace Vladzur\Kogin;


class Kogin
{
    /**
     * Merge default options with custom options
     * @param $default
     * @param $params
     * @return string
     */
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

    /**
     * Transform an underscored string to Upper Cased Word string
     * @param $string
     * @return mixed|string
     */
    protected function upperCaseName($string)
    {
        $string = str_replace('_', ' ', strtolower($string));
        $string = ucwords($string);
        return $string;
    }

}