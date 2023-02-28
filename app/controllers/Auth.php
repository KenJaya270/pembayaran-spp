<?php
class Auth extends Controller
{
    public function index()
    {
        $data['judul'] = 'Login';
        $this->view('templates/header', $data);
        $this->view('auth/index');
        $this->view('templates/footer');
    }

    public function userValidates()
    {
        $siswa = $this->model('siswa_model')->getSiswa();
        $petugas = $this->model('petugas_model')->getPetugas();

        if ($siswa == false) {
            if ($petugas) {
                if ($petugas['level'] == 'admin') {
                    $_SESSION['spp'] = $petugas;
                    Redirect::to('admin/index');
                } else if ($petugas['level'] == 'petugas') {
                    $_SESSION['spp'] = $petugas;
                    Redirect::to('petugas/index');
                }
            } else {
                Flasher::setFlash('Danger', 'Username/NIS atau Password/NISN salah');
                Redirect::to('');
            }
        } else {
            $_SESSION['spp'] = $siswa;
            Redirect::to('siswa');
        }
    }

    public function logout()
    {
        session_destroy();
        session_unset();
        Redirect::back();
    }
}
