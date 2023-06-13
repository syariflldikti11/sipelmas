<?php
//warungcode.com
//$name = nama select options
//$table = nama table yang akan di ambil datanya
//$field = nama field yang akan di tampilkan pada selected
//$selected = id yang akan di select biasanya di gunakan saat edit datanya
//$class = nama class $option_tamabahan
//$extra = untuk menambahkan id atau yang lainnya
//opion_tambahan = untuk menambah option tambahan seperti Pilih Nama siswa
function select_option($name, $table, $field, $pk, $selected = null,$class = null, $extra = null, $option_tamabahan = null) {
    $ci = & get_instance();
    $cmb = "<select name='$name' class='form-control select data-live-search='true' $class  ' $extra>";
    $cmb .= $option_tamabahan;
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {
        $cmb .="<option value='" . $row->$pk . "'";
        $cmb .= $selected == $row->$pk ? 'selected' : '';
        $cmb .=">" . $row->$field . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}