<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Mahasiswa extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Mahasiswa', 'mhs');
    }

    public function index_get()
    {
        $nrp = $this->get('nrp');

        if ($nrp === null) {
            $mhs = $this->mhs->getMhs();
        } else {
            $mhs = $this->mhs->getMhs($nrp);
        }

        if ($mhs) {
            $this->response([
                'status' => true,
                'data' => $mhs
            ], 200);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Tidak ada data dosen yang ditemukan'
            ], 404);
        }
    }
}
