<?php

function belumlogin()
{
    $cek = get_instance();
    if (!$cek->session->userdata('email')) {
        redirect('auth');
    }
}


function sudahlogin()
{
    $cek = get_instance();
    if ($cek->session->userdata('email')) {
        redirect('admin');
    }
}

function cekadmin()
{
    $cek = get_instance();
    $data = $cek->session->userdata('email');

    $user = $cek->db->get_where('user', ['email' => $data])->row_array();
    if ($user['level'] == 2) {
        redirect('user');
    }
}
