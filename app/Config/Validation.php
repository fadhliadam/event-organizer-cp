<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public array $login = [
        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Email harus diisi',
                'valid_email' => 'Email tidak valid'
            ]
        ],
        'password' => [
            'rules' => 'required|min_length[8]',
            'errors' => [
                'required' => 'Password harus diisi',
                'min_length' => 'Password setidaknya terdiri dari 8 karakter',
            ]
        ],
    ];

    public array $addUser = [
        'username' => [
            'rules' => 'required|min_length[5]',
            'errors' => [
                'required' => 'Username tidak boleh kosong',
                'min_length' => 'Username setidaknya terdiri dari 5 karakter',
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email|is_unique[users.email]',
            'errors' => [
                'required' => 'Email tidak boleh kosong',
                'valid_email' => 'Email tidak valid',
                'is_unique' => 'Email sudah digunakan'
            ]
        ],
        'password' => [
            'rules' => 'required|min_length[8]',
            'errors' => [
                'required' => 'Password tidak boleh kosong',
                'min_length' => 'Password setidaknya terdiri dari 8 karakter',
            ]
        ],
        'role' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Role tidak boleh kosong',
            ]
        ],
        'image' => [
            'rules' => 'max_size[image,2048]|mime_in[image,image/png,image/jpeg,image/jpg]|ext_in[image,png,jpg,jpeg]',
            'errors' => [
                'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                'mime_in' => 'Mime type tidak valid',
                'ext_in' => 'Gambar harus berekstensi png, jpg, atau jpeg'
            ]
        ]
    ];

    public array $updateUser = [
        'username' => [
            'rules' => 'required|min_length[5]',
            'errors' => [
                'required' => 'Username tidak boleh kosong',
                'min_length' => 'Username setidaknya terdiri dari 5 karakter',
            ]
        ],
        'password' => [
            'rules' => 'required|min_length[8]',
            'errors' => [
                'required' => 'Password tidak boleh kosong',
                'min_length' => 'Password setidaknya terdiri dari 8 karakter',
            ]
        ],
        'role' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Role tidak boleh kosong',
            ]
        ],
        'image' => [
            'rules' => 'max_size[image,2048]|mime_in[image,image/png,image/jpeg,image/jpg]|ext_in[image,png,jpg,jpeg]',
            'errors' => [
                'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                'mime_in' => 'Mime type tidak valid',
                'ext_in' => 'Gambar harus berekstensi png, jpg, atau jpeg'
            ]
        ]
    ];
}
