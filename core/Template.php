<?php
/**
 * Created by Seçkin Kılınç.
 */

// Core/Template.php (Template Engine)

/**
 * Template engine, `{{ variable }}` formatındaki değişkenleri işler.
 */
class Template
{
    public static function render($template, $data = [])
    {
        $content = file_get_contents("views/$template.php");
        foreach ($data as $key => $value) {
            $content = str_replace("{{ " . $key . " }}", htmlspecialchars($value), $content);
        }
        return $content;
    }
}