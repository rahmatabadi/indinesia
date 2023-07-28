<?php

function is_cekLogin()
{
    $ci = get_instance();
    if (!$ci->session->username) {
        redirect('auth');
    }
}