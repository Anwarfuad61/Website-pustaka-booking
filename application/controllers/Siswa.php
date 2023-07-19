<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    // Region Siswa
    public function index()
    {
        $data['judul'] = 'Data Siswa';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->ModelSiswa->getSiswa()->result_array();

        $this->form_validation->set_rules(
            'nis',
            'NIS',
            'required|min_length[3]|numeric',
            [
                'required' => 'NIS harus diisi',
                'min_length' => 'NIS terlalu pendek',
                'numeric' => 'Hanya boleh diisi angka'
            ]
        );
        $this->form_validation->set_rules(
            'nama',
            'Nama Siswa',
            'required|min_length[3]',
            [
                'required' => 'Nama Siswa harus diisi',
                'min_length' => 'Nama Siswa terlalu pendek'
            ]
        );
        $this->form_validation->set_rules(
            'kelas',
            'Kelas',
            'required|min_length[3]',
            [
                'required' => 'Kelas harus diisi',
                'min_length' => 'Kelas terlalu pendek'
            ]
        );
        $this->form_validation->set_rules(
            'tanggal_lahir',
            'Tanggal Lahir',
            'required|min_length[3]',
            [
                'required' => 'Tahun terbit harus diisi',
                'min_length' => 'Tahun terbit terlalu pendek',
            ]
        );
        $this->form_validation->set_rules(
            'tempat_lahir',
            'Tempat Lahir',
            'required|min_length[3]',
            [
                'required' => 'Tempat lahir harus diisi',
                'min_length' => 'Tempat lahir terlalu pendek'
            ]
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required|min_length[3]',
            [
                'required' => 'Alamat harus diisi',
                'min_length' => 'Alamat terlalu pendek'
            ]
        );
        $this->form_validation->set_rules(
            'gender',
            'Jenis Kelamin',
            'required',
            [
                'required' => 'Jenis Kelamin harus diisi'
            ]
        );
        $this->form_validation->set_rules('agama', 'Agama', 'required', [
            'required' => 'Agama harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('siswa/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nis' => $this->input->post('nis', true),
                'nama' => $this->input->post('nama', true),
                'kelas' => $this->input->post('kelas', true),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                'tempat_lahir' => $this->input->post('tempat_lahir', true),
                'alamat' => $this->input->post('alamat', true),
                'gender' => $this->input->post('gender', true),
                'agama' => $this->input->post('agama', true)
            ];

            $this->ModelSiswa->simpanSiswa($data);
            redirect('siswa');
        }
    }

    public function updateSiswa()
    {
        $data['judul'] = 'Ubah Data Siswa';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->ModelSiswa->siswaWhere(['nis' => $this->uri->segment(3)])->result_array();
        // $data['siswa'] = $this->ModelSiswa->getSiswa()->result_array();
        $data['agama'] = ['Islam', 'Kristen', 'Katolik', 'Budha', 'Hindu', 'Protestan', 'Khonghucu'];


        $this->form_validation->set_rules(
            'nis',
            'NIS',
            'required|min_length[3]|numeric',
            [
                'required' => 'NIS harus diisi',
                'min_length' => 'NIS terlalu pendek',
                'numeric' => 'Hanya boleh diisi angka'
            ]
        );
        $this->form_validation->set_rules(
            'nama',
            'Nama Siswa',
            'required|min_length[3]',
            [
                'required' => 'Nama Siswa harus diisi',
                'min_length' => 'Nama Siswa terlalu pendek'
            ]
        );
        $this->form_validation->set_rules(
            'kelas',
            'Kelas',
            'required|min_length[3]',
            [
                'required' => 'Kelas harus diisi',
                'min_length' => 'Kelas terlalu pendek'
            ]
        );
        $this->form_validation->set_rules(
            'tanggal_lahir',
            'Tanggal Lahir',
            'required|min_length[3]',
            [
                'required' => 'Tahun terbit harus diisi',
                'min_length' => 'Tahun terbit terlalu pendek',
            ]
        );
        $this->form_validation->set_rules(
            'tempat_lahir',
            'Tempat Lahir',
            'required|min_length[3]',
            [
                'required' => 'Tempat lahir harus diisi',
                'min_length' => 'Tempat lahir terlalu pendek'
            ]
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required|min_length[3]',
            [
                'required' => 'Alamat harus diisi',
                'min_length' => 'Alamat terlalu pendek'
            ]
        );
        $this->form_validation->set_rules(
            'gender',
            'Jenis Kelamin',
            'required',
            [
                'required' => 'Jenis Kelamin harus diisi'
            ]
        );
        $this->form_validation->set_rules(
            'agama',
            'Agama',
            'required',
            [
                'required' => 'Agama harus diisi'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('siswa/ubah_siswa', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nis' => $this->input->post('nis', true),
                'nama' => $this->input->post('nama', true),
                'kelas' => $this->input->post('kelas', true),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                'tempat_lahir' => $this->input->post('tempat_lahir', true),
                'alamat' => $this->input->post('alamat', true),
                'gender' => $this->input->post('gender', true),
                'agama' => $this->input->post('agama', true)
            ];

            $this->ModelSiswa->updateSiswa($data, ['nis' => $this->input->post('nis')]);
            redirect('siswa');
        }
    }

    public function hapusSiswa()
    {
        $where = ['nis' => $this->uri->segment(3)];
        $this->ModelSiswa->hapusSiswa($where);
        redirect('siswa');
    }
}
