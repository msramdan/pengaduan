<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Laporan_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->fungsi->user_login()->level_id == 2) {
			$laporan = $this->Laporan_model->get_all_superadmin();
		} else {
			$laporan = $this->Laporan_model->get_all();
		}
		$data = array(
			'laporan_data' => $laporan,
		);
		$this->template->load('template', 'laporan/laporan_list', $data);
	}

	public function read($id)
	{
		$row = $this->Laporan_model->get_by_id(decrypt_url($id));
		if ($row) {
			$data = array(
				'laporan_id' => $row->laporan_id,
				'kode_laporan' => $row->kode_laporan,
				'jenis_laporan' => $row->jenis_laporan,
				'nama_laporan' => $row->nama_laporan,
				'nama_terlapor' => $row->nama_terlapor,
				'tanggal' => $row->tanggal,
				'deskripsi' => $row->deskripsi,
				'photo' => $row->photo,
				'status' => $row->status,
			);
			$this->template->load('template', 'laporan/laporan_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('laporan'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('laporan/create_action'),
			'laporan_id' => set_value('laporan_id'),
			'kode_laporan' => set_value('kode_laporan'),
			'jenis_laporan' => set_value('jenis_laporan'),
			'nama_laporan' => set_value('nama_laporan'),
			'tanggal' => set_value('tanggal'),
			'deskripsi' => set_value('deskripsi'),
			'photo' => set_value('photo'),
			'status' => set_value('status'),
		);
		$this->template->load('template', 'laporan/laporan_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'kode_laporan' => $this->input->post('kode_laporan', TRUE),
				'jenis_laporan' => $this->input->post('jenis_laporan', TRUE),
				'nama_laporan' => $this->input->post('nama_laporan', TRUE),
				'tanggal' => $this->input->post('tanggal', TRUE),
				'deskripsi' => $this->input->post('deskripsi', TRUE),
				'photo' => $this->input->post('photo', TRUE),
				'status' => $this->input->post('status', TRUE),
			);

			$this->Laporan_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('laporan'));
		}
	}

	public function update($id)
	{
		$row = $this->Laporan_model->get_by_id(decrypt_url($id));

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('laporan/update_action'),
				'laporan_id' => set_value('laporan_id', $row->laporan_id),
				'kode_laporan' => set_value('kode_laporan', $row->kode_laporan),
				'jenis_laporan' => set_value('jenis_laporan', $row->jenis_laporan),
				'nama_laporan' => set_value('nama_laporan', $row->nama_laporan),
				'tanggal' => set_value('tanggal', $row->tanggal),
				'deskripsi' => set_value('deskripsi', $row->deskripsi),
				'photo' => set_value('photo', $row->photo),
				'status' => set_value('status', $row->status),
			);
			$this->template->load('template', 'laporan/laporan_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('laporan'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('laporan_id', TRUE));
		} else {
			$data = array(
				'kode_laporan' => $this->input->post('kode_laporan', TRUE),
				'jenis_laporan' => $this->input->post('jenis_laporan', TRUE),
				'nama_laporan' => $this->input->post('nama_laporan', TRUE),
				'tanggal' => $this->input->post('tanggal', TRUE),
				'deskripsi' => $this->input->post('deskripsi', TRUE),
				'photo' => $this->input->post('photo', TRUE),
				'status' => $this->input->post('status', TRUE),
			);

			$this->Laporan_model->update($this->input->post('laporan_id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('laporan'));
		}
	}

	public function delete($id)
	{
		$row = $this->Laporan_model->get_by_id(decrypt_url($id));

		if ($row) {
			$this->Laporan_model->delete(decrypt_url($id));
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('laporan'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('laporan'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_laporan', 'kode laporan', 'trim|required');
		$this->form_validation->set_rules('jenis_laporan', 'jenis laporan', 'trim|required');
		$this->form_validation->set_rules('nama_laporan', 'nama laporan', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
		$this->form_validation->set_rules('photo', 'photo', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');

		$this->form_validation->set_rules('laporan_id', 'laporan_id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function approved($id)
	{
		$this->db->query("UPDATE laporan
        SET status='Process'
        WHERE laporan_id='$id'");
		$this->session->set_flashdata('message', 'laporan Berhasil di Approved');
		redirect(site_url('laporan'));
	}

	public function reject($id)
	{
		$this->db->query("UPDATE laporan
        SET status='Decline'
        WHERE laporan_id='$id'");
		$this->session->set_flashdata('message', 'laporan di Reject');
		redirect(site_url('laporan'));
	}

	
}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */
/* Please DO NOT modify this information : */
