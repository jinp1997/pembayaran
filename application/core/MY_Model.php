<?php
class MY_Model extends CI_Model
{
    protected $table          = '';
    protected $perPage        = 0;

    public function __construct()
    {
        parent::__construct();

        if (!$this->table) {
            $this->table = strtolower(str_replace('_model', '', get_class($this)));
        }
    }

    public function getNumRows() {
      return $this->db->get($this->table)->num_rows();
   }

    public function query($sql)
    {
        return $this->db->query($sql);
    }

    public function get()
    {
        return $this->db->get($this->table)->row();
    }

    public function getLimit($limit)
    {
        return $this->db->limit($limit)->get($this->table)->row();
    }

    public function getArray()
    {
        return $this->db->get($this->table)->row_array();
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function paginate($page)
    {
        $this->db->limit($this->perPage, $this->calculateRealOffset($page));
        return $this;
    }

    public function calculateRealOffset($page)
    {
        if (is_null($page) || empty($page)) {
            $offset = 0;
        } else {
            $offset = ($page * $this->perPage) - $this->perPage;
        }

        return $offset;
    }

    public function select($columns)
    {
        $this->db->select($columns);
        return $this;
    }

    public function where($column, $condition)
    {
        $this->db->where($column, $condition);
        return $this;
    }

    public function orLike($column, $condition)
    {
        $this->db->or_like($column, $condition);
        return $this;
    }
    public function validate()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="form-error">', '</p>');
        $validationRules = $this->getValidationRules();
        $this->form_validation->set_rules($validationRules);
        return $this->form_validation->run();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($data)
    {
        return $this->db->update($this->table, $data);
    }

    public function delete()
    {
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function join($table, $type = 'left')
    {
        $this->db->join($table, "$this->table.id_$table = $table.id_$table", $type);
        return $this;
    }

    public function joinId($table, $type = 'left')
    {
        $this->db->join($table, "$this->table.id_$table = $table.id_$table", $type);
        return $this;
    }

    public function orderByAsc($kolom, $order = 'asc')
    {
        $this->db->order_by($kolom, $order);
        return $this;
    }

    public function orderByDesc($kolom, $order = 'desc')
    {
        $this->db->order_by($kolom, $order);
        return $this;
    }

    public function makePagination($baseURL, $uriSegment, $totalRows = null)
    {
        $args = func_get_args();

        $this->load->library('pagination');

        $config = [
            'base_url'         => $baseURL,
            'uri_segment'      => $uriSegment,
            'per_page'         => $this->perPage,
            'total_rows'       => $totalRows,
            'use_page_numbers' => true,
            'num_links'        => 5,
            
            'full_tag_open'   => '<nav><ul class="pagination" style="margin-top:0px">',
            'full_tag_close'  => '</ul></nav>',

            'first_link'      => 'First',
            'first_tag_open'  => '<li>',
            'first_tag_close' => '</li>',

            'last_link'       => 'Last',
            'last_tag_open'   => '<li>',
            'last_tag_close'  => '</li>',

            'next_link'       => 'Next',
            'next_tag_open'   => '<li>',
            'next_tag_close'  => '</li>',

            'prev_link'       => 'Prev',
            'prev_tag_open'   => '<li>',
            'prev_tag_close'  => '</li>',

            'cur_tag_open'    => '<li class="active"><a>',
            'cur_tag_close'   => '</a></li>',

            'num_tag_open'    => '<li>',
            'num_tag_close'   => '</li>',
        ];


        if (count($_GET) > 0) {
            $config['suffix']    = '?' . http_build_query($_GET, '', "&");
            $config['first_url'] = $config['base_url'] . '?' . http_build_query($_GET);
        } else {
            $config['suffix']    = http_build_query($_GET, '', "&");
            $config['first_url'] = $config['base_url'];
        }

        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }
}