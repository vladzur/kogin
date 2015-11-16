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
        $string_sub = str_replace('_', ' ', strtolower($string));
        $string_up = ucwords($string_sub);
        return $string_up;
    }

}