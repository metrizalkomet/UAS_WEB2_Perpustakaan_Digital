<?php

class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('Buku_model');
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');

        $limit = 5;

        $start = $this->input->get('per_page');

        if (!$start) {
            $start = 0;
        }

        $config['base_url'] = base_url('index.php/buku/index');
        $config['per_page'] = $limit;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'per_page';

        if (!empty($keyword)) {

            $config['total_rows'] =
                $this->Buku_model->count_search($keyword);

            $data['buku'] =
                $this->Buku_model->search(
                    $keyword,
                    $limit,
                    $start
                );

            $config['suffix'] =
                '&keyword=' . urlencode($keyword);

        } else {

            $config['total_rows'] =
                $this->Buku_model->count_all();

            $data['buku'] =
                $this->Buku_model->get_all(
                    $limit,
                    $start
                );
        }

        $config['full_tag_open'] =
            '<div class="pagination">';

        $config['full_tag_close'] =
            '</div>';

        $config['first_link'] =
            'Pertama';

        $config['last_link'] =
            'Terakhir';

        $config['next_link'] =
            'Berikutnya';

        $config['prev_link'] =
            'Sebelumnya';

        $this->pagination->initialize($config);

        $data['pagination'] =
            $this->pagination->create_links();

        $data['keyword'] = $keyword;

        $this->load->view(
            'buku/index',
            $data
        );
    }

    public function tambah()
    {
        $this->form_validation->set_rules(
            'judul',
            'Judul Buku',
            'required'
        );

        $this->form_validation->set_rules(
            'penulis',
            'Penulis',
            'required'
        );

        $this->form_validation->set_rules(
            'penerbit',
            'Penerbit',
            'required'
        );

        $this->form_validation->set_rules(
            'tahun_terbit',
            'Tahun Terbit',
            'required|numeric|greater_than[1899]|less_than[2027]',
            array(
                'required' =>
                    'Tahun Terbit wajib diisi.',

                'numeric' =>
                    'Tahun Terbit harus berupa angka.',

                'greater_than' =>
                    'Tahun Terbit harus lebih besar dari 1899.',

                'less_than' =>
                    'Tahun Terbit tidak boleh lebih dari 2026.'
            )
        );

        $this->form_validation->set_rules(
            'kategori',
            'Kategori',
            'required'
        );

        $this->form_validation->set_rules(
            'jumlah',
            'Jumlah',
            'required|numeric|greater_than[0]',
            array(
                'required' =>
                    'Jumlah wajib diisi.',

                'numeric' =>
                    'Jumlah harus berupa angka.',

                'greater_than' =>
                    'Jumlah harus lebih dari 0.'
            )
        );

        if ($this->input->post()) {

            if ($this->form_validation->run() == TRUE) {

                $data = array(
                    'judul' =>
                        $this->input->post('judul'),

                    'penulis' =>
                        $this->input->post('penulis'),

                    'penerbit' =>
                        $this->input->post('penerbit'),

                    'tahun_terbit' =>
                        $this->input->post('tahun_terbit'),

                    'kategori' =>
                        $this->input->post('kategori'),

                    'jumlah' =>
                        $this->input->post('jumlah')
                );

                $this->Buku_model->insert($data);

                $this->session->set_flashdata(
                    'success',
                    'Buku berhasil ditambahkan.'
                );

                redirect('buku');
            }
        }

        $this->load->view(
            'buku/tambah'
        );
    }

    public function edit($id)
    {
        $this->form_validation->set_rules(
            'judul',
            'Judul Buku',
            'required'
        );

        $this->form_validation->set_rules(
            'penulis',
            'Penulis',
            'required'
        );

        $this->form_validation->set_rules(
            'penerbit',
            'Penerbit',
            'required'
        );

        $this->form_validation->set_rules(
            'tahun_terbit',
            'Tahun Terbit',
            'required|numeric|greater_than[1899]|less_than[2027]',
            array(
                'required' =>
                    'Tahun Terbit wajib diisi.',

                'numeric' =>
                    'Tahun Terbit harus berupa angka.',

                'greater_than' =>
                    'Tahun Terbit harus lebih besar dari 1899.',

                'less_than' =>
                    'Tahun Terbit tidak boleh lebih dari 2026.'
            )
        );

        $this->form_validation->set_rules(
            'kategori',
            'Kategori',
            'required'
        );

        $this->form_validation->set_rules(
            'jumlah',
            'Jumlah',
            'required|numeric|greater_than[0]',
            array(
                'required' =>
                    'Jumlah wajib diisi.',

                'numeric' =>
                    'Jumlah harus berupa angka.',

                'greater_than' =>
                    'Jumlah harus lebih dari 0.'
            )
        );

        if ($this->input->post()) {

            if ($this->form_validation->run() == TRUE) {

                $data = array(
                    'judul' =>
                        $this->input->post('judul'),

                    'penulis' =>
                        $this->input->post('penulis'),

                    'penerbit' =>
                        $this->input->post('penerbit'),

                    'tahun_terbit' =>
                        $this->input->post('tahun_terbit'),

                    'kategori' =>
                        $this->input->post('kategori'),

                    'jumlah' =>
                        $this->input->post('jumlah')
                );

                $this->Buku_model->update(
                    $id,
                    $data
                );

                $this->session->set_flashdata(
                    'success',
                    'Buku berhasil diperbarui.'
                );

                redirect('buku');
            }
        }

        $data['buku'] =
            $this->Buku_model->get_by_id($id);

        $this->load->view(
            'buku/edit',
            $data
        );
    }

    public function hapus($id)
    {
        $this->Buku_model->delete($id);

        $this->session->set_flashdata(
            'success',
            'Buku berhasil dihapus.'
        );

        redirect('buku');
    }
}