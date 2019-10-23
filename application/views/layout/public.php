<?php

// Load Header
$this->load->view('templates/public_header');

// Echo Content from Controller
echo $content ?? '';

// Load Footer
$this->load->view('templates/public_footer');