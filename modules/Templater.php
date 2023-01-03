<?php
    function render_template($template, $item)
    {
        $string = file_get_contents($template);
        if($string !== false)
        {
            echo $string;
        }
    }
?>