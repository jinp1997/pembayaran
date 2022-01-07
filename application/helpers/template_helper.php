<?php

function format_hari_tanggal($waktu) {    
    $hari_array = array(
        'Minggu',
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu'
    );
    $hr = date('w', strtotime($waktu));
    $hari = $hari_array[$hr];
    
    $tanggal = date('j', strtotime($waktu));

    $bulan_array = array(
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    );
    $bl = date('n', strtotime($waktu));
    $bulan = $bulan_array[$bl];

    $tahun = date('Y', strtotime($waktu));

    return "$hari, $tanggal $bulan $tahun";
}

function format_tanggal($waktu) {
    $tanggal = date('j', strtotime($waktu));
    
    $bulan_array = array(
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    );
    $bl = date('n', strtotime($waktu));
    $bulan = $bulan_array[$bl];

    $tahun = date('Y', strtotime($waktu));

    return "$tanggal $bulan $tahun";
}

function getDropdownList($table, $columns)
{
    $CI =& get_instance();
    $query = $CI->db->select($columns)->from($table)->get();

    if ($query->num_rows() >= 1) {
        $options1 = ['' => '- Pilih -'];
        $options2 = array_column($query->result_array(), $columns[1], $columns[0]);
        $options = $options1 + $options2;
        return $options;
    }

    return $options = ['' => '- Pilih -'];
}

function formatRupiah($angka){
    $hasil =  'Rp. ' . number_format($angka,0,',','.') . ',00';
    return $hasil;   
}

function _autonumber($field, $table, $Parse, $Digit_Count) {
    $NOL = "0";
    $query = "Select " . $field . " from " . $table . " where " . $field . " like '" . $Parse . "%' order by " . $field . " DESC LIMIT 0,2";

    $identifier = &get_instance();
    $data = $identifier->db->query($query)->result_array();

    $counter = 2;
    if (sizeof($data) == 0) {
        while ($counter < $Digit_Count) {
            $NOL = "0" . $NOL;
            $counter++;
        }

        return $Parse . $NOL . "1";
    } else {
        $R = $data[0][$field];
        $K = sprintf("%d", substr($R, -$Digit_Count));
        $K = $K + 1;
        $L = $K;
        
        while (strlen($L) != $Digit_Count) {
            $L = $NOL . $L;
        }

        return $Parse . $L;
    }
}

function random_word($id = 20) {
    $pool = '1234567890abcdefghijkmnpqrstuvwxyz';
    
    $word = '';
    for ($i = 0; $i < $id; $i++){
        $word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
    }
    return $word; 
}

function waktu_lalu($timestamp) {
    $selisih = time() - strtotime($timestamp) ;
 
    $detik = $selisih ;
    $menit = round($selisih / 60 );
    $jam = round($selisih / 3600 );
    $hari = round($selisih / 86400 );
    $minggu = round($selisih / 604800 );
    $bulan = round($selisih / 2419200 );
    $tahun = round($selisih / 29030400 );
 
    if ($detik <= 60) {
        $waktu = $detik.' detik yang lalu';
    } else if ($menit <= 60) {
        $waktu = $menit.' menit yang lalu';
    } else if ($jam <= 24) {
        $waktu = $jam.' jam yang lalu';
    } else if ($hari <= 7) {
        $waktu = $hari.' hari yang lalu';
    } else if ($minggu <= 4) {
        $waktu = $minggu.' minggu yang lalu';
    } else if ($bulan <= 12) {
        $waktu = $bulan.' bulan yang lalu';
    } else {
        $waktu = $tahun.' tahun yang lalu';
    }
    
    return $waktu;
}

if ( ! function_exists('field_enums'))
{
    function field_enums($table = '', $field = '')
    {
        $enums = array();
        if ($table == '' || $field == '') return $enums;
        $CI =& get_instance();
        preg_match_all("/'(.*?)'/", $CI->db->query("SHOW COLUMNS FROM {$table} LIKE '{$field}'")->row()->Type, $matches);
        foreach ($matches[1] as $key => $value) {
            $enums[$value] = $value; 
        }
        return $enums;
    }  
}