<?php

// Load Header
$this->load->view('templates/dashboard_header');

// Load Sidebar
$this->load->view('templates/dashboard_sidebar');

// Load Topbar
$this->load->view('templates/dashboard_topbar');

// Echo Content from Controller
echo $content ?? '';

// Load Footer
$this->load->view('templates/dashboard_footer');