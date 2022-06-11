<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pengaduan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Laporan_model');
	}

	public function index()
	{

		$laporan = $this->Laporan_model->get_all();
		$kode = $this->Laporan_model->generatekodeReq();

		$data = array(
			'button' => 'Create',
			'action' => site_url('pengaduan/create_action'),
			'laporan_id' => set_value('laporan_id'),
			'kode_laporan' => set_value('kode_laporan'),
			'jenis_laporan' => set_value('jenis_laporan'),
			'nama_laporan' => set_value('nama_laporan'),
			'tanggal' => set_value('tanggal'),
			'deskripsi' => set_value('deskripsi'),
			'nama_terlapor' => set_value('nama_terlapor'),
			'photo' => set_value('photo'),
			'status' => set_value('status'),
			'laporan_data' => $laporan,
			'kode' => $kode,
		);


		$this->load->view('pengaduan', $data);
	}

	public function create_action()
	{
		$config['upload_path']      = './temp/assets/berkas';
		$config['allowed_types']    = 'jpg|png|jpeg|pdf';
		$config['max_size']         = 10048;
		$config['file_name']        = 'File-' . date('ymd') . '-' . substr(sha1(rand()), 0, 10);
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->do_upload("photo");
		$data = $this->upload->data();
		$photo = $data['file_name'];

		$data = array(
			'kode_laporan' => $this->input->post('kode_laporan', TRUE),
			'jenis_laporan' => $this->input->post('jenis_laporan', TRUE),
			'nama_laporan' => $this->input->post('nama_laporan', TRUE),
			'nama_terlapor' => $this->input->post('nama_terlapor', TRUE),
			'tanggal' => date('Y-m-d'),
			'deskripsi' => $this->input->post('deskripsi', TRUE),
			'photo' => $photo,
			'status' => "In Review",
		);

		$this->Laporan_model->insert($data);
		$this->session->set_flashdata('message', 'Pengaduan berhasil terkirim');
		redirect(site_url('pengaduan'));
	}
}
