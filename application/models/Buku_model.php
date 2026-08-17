<?php

class Buku_model extends CI_Model
{
    public function get_all($limit = null, $start = null)
    {
        if ($limit !== null) {
            $this->db->limit($limit, $start);
        }

        return $this->db->get('buku')->result();
    }

    public function count_all()
    {
        return $this->db->count_all('buku');
    }

    public function search($keyword, $limit = null, $start = null)
    {
        $this->db->group_start();
        $this->db->like('judul', $keyword);
        $this->db->or_like('penulis', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->group_end();

        if ($limit !== null) {
            $this->db->limit($limit, $start);
        }

        return $this->db->get('buku')->result();
    }

    public function count_search($keyword)
    {
        $this->db->group_start();
        $this->db->like('judul', $keyword);
        $this->db->or_like('penulis', $keyword);
        $this->db->or_like('kategori', $keyword);
        $this->db->group_end();

        return $this->db->count_all_results('buku');
    }

    public function insert($data)
    {
        return $this->db->insert('buku', $data);
    }

    public function get_by_id($id)
    {
        return $this->db
            ->get_where('buku', array('id' => $id))
            ->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);

        return $this->db->update('buku', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);

        return $this->db->delete('buku');
    }
}