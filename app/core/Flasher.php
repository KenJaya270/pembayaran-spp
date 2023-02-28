<?php
class Flasher
{
    static function setFlash($tipe, $pesan)
    {
        $_SESSION['flash'] = [
            "tipe" => $tipe,
            "pesan" => $pesan
        ];
    }

    static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
            ' . $_SESSION['flash']['pesan'] . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }
        unset($_SESSION['flash']);
    }
}
