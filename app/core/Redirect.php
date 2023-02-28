<?php
class Redirect
{
    static function back()
    {
        echo '<script>javascript:history.go(-1);</script>';
    }

    static function to($url)
    {
        header('Location: ' . BASEURL . '/' . $url);
        exit;
    }
}
