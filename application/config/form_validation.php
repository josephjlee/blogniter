<?php

$config = [

  'login' => [
        [
            'field' => 'email', 
            'label' => 'Email', 
            'rules' => 'required|trim|valid_email'
        ],
        [
            'field' => 'password', 
            'label' => 'Password', 
            'rules' => 'required|trim'
        ]
    ],

    'register' => [
        [
            'field' => 'name', 
            'label' => 'Name', 
            'rules' => 'required|trim'
        ],
        [
            'field' => 'email', 
            'label' => 'Email', 
            'rules' => 'required|trim|valid_email|is_unique[users.email]',
            'errors'  => [
              'is_unique' => 'This email has already registered!'
            ]
        ],
        [
            'field' => 'password1', 
            'label' => 'Password', 
            'rules' => 'required|trim|min_length[3]|matches[password2]',
            'errors'  => [
              'matches' 		=> 'Password is not match!',
              'min_length'	=> 'Password is too short!'
            ]
        ],
        [
            'field' => 'password2', 
            'label' => 'Password', 
            'rules' => 'required|trim|matches[password1]'
        ]
    ],

    'edit_profile' => [
        [
            'field' => 'name', 
            'label' => 'Name', 
            'rules' => 'required|trim'
        ]
    ],

    'change_password' => [
        [
            'field' => 'current-password', 
            'label' => 'Current Password', 
            'rules' => 'required|trim'
        ],

        [
            'field' => 'new-password-1', 
            'label' => 'New Password', 
            'rules' => 'required|trim|min_length[4]|matches[new-password-2]'
        ],

        [
            'field' => 'new-password-2', 
            'label' => 'Repeat New Password', 
            'rules' => 'required|trim|min_length[4]|matches[new-password-1]'
        ] 
    ],

    'categories_form' => [
        [
            'field' => 'name', 
            'label' => 'Name', 
            'rules' => 'required',
            'errors'  => [
              'required' => 'Name must not be empty'
            ]          
        ],
        [
            'field' => 'description', 
            'label' => 'Description', 
            'rules' => 'required', 'min_length[100]'
        ]
    ],

    'post_form' => [  
        [
            'field' => 'title', 
            'label' => 'Title', 
            'rules' => 'required', 
            'errors' => [
              'required' => 'Title must not be empty'
            ]
        ],
        [
            'field' => 'body', 
            'label' => 'Content', 
            'rules' => 'required|min_length[100]', 
            'errors' => [
              'required'   => 'Content must not be empty',
              'min_length' => 'Content is too short',
            ]
        ]
    ],

    'create_user' => [
        [
            'field' => 'role',
            'label' => 'Role',
            'rules' => 'less_than[3]',
            'errors'  => [
              'less_than' => 'Select a Role.'
            ]
        ],
        [
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|trim|valid_email'
        ],
        [
            'field' => 'password1',
            'label' => 'Password',
            'rules' => 'required|trim|min_length[3]|matches[password2]'
        ],
        [
            'field' => 'password2',
            'label' => 'Password',
            'rules' => 'required|trim|matches[password1]'
        ]
    ],

    'update_user' => [
        [
            'field' => 'role',
            'label' => 'Role',
            'rules' => 'numeric',
            'errors'  => [
              'numeric' => 'Select a Role.'
            ]
        ],
        [
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required|trim'
        ],
        [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|trim|valid_email'
        ]
    ],

    'upload_image' => [
        [
            'field' => 'title', 
            'label' => 'Title', 
            'rules' => 'required|trim'
        ],
        [
            'field' => 'alt', 
            'label' => 'Alt Text', 
            'rules' => 'required|trim'
        ]
    ]

];