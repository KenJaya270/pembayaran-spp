<?php
class Middleware
{
    static function auth()
    {
        if (!isset($_SESSION['spp'])) {
            Redirect::to('auth');
        }
    }
}
