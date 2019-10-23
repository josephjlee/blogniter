<?php

// Load Header
$this->load->view('templates/auth_header');

// Echo Content from Controller
echo $content ?? '';

// Load Footer
$this->load->view('templates/auth_footer');