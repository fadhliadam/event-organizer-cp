<?php

namespace Config;

use App\Validation\UserValidation;
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
        UserValidation::class
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

    public array $addEvent = [
        'name' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama event tidak boleh kosong',
            ]
        ],
        'description' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Deskripsi tidak boleh kosong',
            ]
        ],
        'banner' => [
            'rules' => 'uploaded[banner]|max_size[banner,2048]|mime_in[banner,image/png,image/jpeg,image/jpg]|ext_in[banner,png,jpg,jpeg]',
            'errors' => [
                'uploaded' => 'Gambar harus diupload',
                'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                'mime_in' => 'Mime type tidak valid',
                'ext_in' => 'Gambar harus berekstensi png, jpg, atau jpeg'
            ]
        ],
        'target_audience' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Target audience tidak boleh kosong',
            ]
        ],
        'quota' => [
            'rules' => 'required|max_length[5]',
            'errors' => [
                'required' => 'Target audience tidak boleh kosong',
                'max_length' => 'Target audience maksimal 5 digit',
            ]
        ],
        'event_type' => [
            'rules' => 'required|in_list[0,1]',
            'errors' => [
                'required' => 'Tipe event harus dipilih',
                'in_list' => 'Tipe event harus bernilai 0 (online) atau 1 (offline)'
            ]
        ],
        'price' => [
            'rules' => 'required|max_length[10]',
            'errors' => [
                'required' => 'Harga event tidak boleh kosong',
                'max_length' => 'Harga maksimal 10 digit'
            ]
        ],
        'date' => [
            'rules' => 'required|valid_date',
            'errors' => [
                'required' => 'Tanggal event harus dipilih',
                'valid_date' => 'Tanggal event tidak valid'
            ]
        ],
        'country' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama negara tidak boleh kosong',
            ]
        ],
        'province' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama provinsi tidak boleh kosong',
            ]
        ],
        'city' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama kota tidak boleh kosong',
            ]
        ],
        'postal_code' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Kode pos tidak boleh kosong',
                'numeric' => 'Kode pos tidak valid',
            ]
        ],
        'street' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Jalan tidak boleh kosong',
            ]
        ],
        'host' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama host tidak boleh kosong',
            ]
        ],
        'host_email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Email host tidak boleh kosong',
                'valid_email' => 'Email host tidak valid',
            ]
        ],
        'category_id' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kategori harus dipilih',
            ]
        ],
        'collaborator' => [
            'rules' => 'collaborator_valid_email',
            'errors' => [
                'collaborator_valid_email' => 'Email ini tidak ditemukan di database atau tidak berhak sebagai collaborator',
            ]
        ],
        'owner' => [
            'rules' => 'required|valid_email|admin_valid_email',
            'errors' => [
                'required' => 'Email pemilik tidak boleh kosong',
                'valid_email' => 'Email pemilik tidak valid',
                'admin_valid_email' => 'Email ini tidak ditemukan di database atau tidak berhak sebagai owner',
            ]
        ]
    ];
    public array $addEventAdmin = [
        'name' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama event tidak boleh kosong',
            ]
        ],
        'description' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Deskripsi tidak boleh kosong',
            ]
        ],
        'banner' => [
            'rules' => 'uploaded[banner]|max_size[banner,2048]|mime_in[banner,image/png,image/jpeg,image/jpg]|ext_in[banner,png,jpg,jpeg]',
            'errors' => [
                'uploaded' => 'Gambar harus diupload',
                'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                'mime_in' => 'Mime type tidak valid',
                'ext_in' => 'Gambar harus berekstensi png, jpg, atau jpeg'
            ]
        ],
        'target_audience' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Target audience tidak boleh kosong',
            ]
        ],
        'quota' => [
            'rules' => 'required|max_length[5]',
            'errors' => [
                'required' => 'Target audience tidak boleh kosong',
                'max_length' => 'Target audience maksimal 5 digit',
            ]
        ],
        'event_type' => [
            'rules' => 'required|in_list[0,1]',
            'errors' => [
                'required' => 'Tipe event harus dipilih',
                'in_list' => 'Tipe event harus bernilai 0 (online) atau 1 (offline)'
            ]
        ],
        'price' => [
            'rules' => 'required|max_length[10]',
            'errors' => [
                'required' => 'Harga event tidak boleh kosong',
                'max_length' => 'Harga maksimal 10 digit'
            ]
        ],
        'date' => [
            'rules' => 'required|valid_date',
            'errors' => [
                'required' => 'Tanggal event harus dipilih',
                'valid_date' => 'Tanggal event tidak valid'
            ]
        ],
        'country' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama negara tidak boleh kosong',
            ]
        ],
        'province' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama provinsi tidak boleh kosong',
            ]
        ],
        'city' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama kota tidak boleh kosong',
            ]
        ],
        'postal_code' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Kode pos tidak boleh kosong',
                'numeric' => 'Kode pos tidak valid',
            ]
        ],
        'street' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Jalan tidak boleh kosong',
            ]
        ],
        'host' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama host tidak boleh kosong',
            ]
        ],
        'host_email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Email host tidak boleh kosong',
                'valid_email' => 'Email host tidak valid',
            ]
        ],
        'category_id' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kategori harus dipilih',
            ]
        ],
        'collaborator' => [
            'rules' => 'collaborator_valid_email',
            'errors' => [
                'valid_email' => 'Email kolaborator tidak valid',
                'collaborator_valid_email' => 'Email ini tidak ditemukan di database atau tidak berhak sebagai collaborator',
            ]
        ]
    ];

    public array $updateEvent = [
        'name' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama event tidak boleh kosong',
            ]
        ],
        'description' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Deskripsi tidak boleh kosong',
            ]
        ],
        'banner' => [
            'rules' => 'max_size[banner,2048]|mime_in[banner,image/png,image/jpeg,image/jpg]|ext_in[banner,png,jpg,jpeg]',
            'errors' => [
                'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                'mime_in' => 'Mime type tidak valid',
                'ext_in' => 'Gambar harus berekstensi png, jpg, atau jpeg'
            ]
        ],
        'target_audience' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Target audience tidak boleh kosong',
            ]
        ],
        'quota' => [
            'rules' => 'required|max_length[5]',
            'errors' => [
                'required' => 'Target audience tidak boleh kosong',
                'max_length' => 'Target audience maksimal 5 digit',
            ]
        ],
        'event_type' => [
            'rules' => 'required|in_list[0,1]',
            'errors' => [
                'required' => 'Tipe event harus dipilih',
                'in_list' => 'Tipe event harus bernilai 0 (online) atau 1 (offline)'
            ]
        ],
        'price' => [
            'rules' => 'required|max_length[10]',
            'errors' => [
                'required' => 'Harga event tidak boleh kosong',
                'max_length' => 'Harga maksimal 10 digit'
            ]
        ],
        'date' => [
            'rules' => 'required|valid_date',
            'errors' => [
                'required' => 'Tanggal event harus dipilih',
                'valid_date' => 'Tanggal event tidak valid'
            ]
        ],
        'country' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama negara tidak boleh kosong',
            ]
        ],
        'province' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama provinsi tidak boleh kosong',
            ]
        ],
        'city' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama kota tidak boleh kosong',
            ]
        ],
        'postal_code' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Kode pos tidak boleh kosong',
                'numeric' => 'Kode pos tidak valid',
            ]
        ],
        'street' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Jalan tidak boleh kosong',
            ]
        ],
        'host' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama host tidak boleh kosong',
            ]
        ],
        'host_email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Email host tidak boleh kosong',
                'valid_email' => 'Email host tidak valid',
            ]
        ],
        'category_id' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kategori harus dipilih',
            ]
        ],
        'collaborator' => [
            'rules' => 'collaborator_valid_email',
            'errors' => [
                'collaborator_valid_email' => 'Email ini tidak ditemukan di database atau tidak berhak sebagai collaborator',
            ]
        ],
    ];
    public array $updateEventAdmin = [
        'name' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama event tidak boleh kosong',
            ]
        ],
        'description' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Deskripsi tidak boleh kosong',
            ]
        ],
        'banner' => [
            'rules' => 'max_size[banner,2048]|mime_in[banner,image/png,image/jpeg,image/jpg]|ext_in[banner,png,jpg,jpeg]',
            'errors' => [
                'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                'mime_in' => 'Mime type tidak valid',
                'ext_in' => 'Gambar harus berekstensi png, jpg, atau jpeg'
            ]
        ],
        'target_audience' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Target audience tidak boleh kosong',
            ]
        ],
        'quota' => [
            'rules' => 'required|max_length[5]',
            'errors' => [
                'required' => 'Target audience tidak boleh kosong',
                'max_length' => 'Target audience maksimal 5 digit',
            ]
        ],
        'event_type' => [
            'rules' => 'required|in_list[0,1]',
            'errors' => [
                'required' => 'Tipe event harus dipilih',
                'in_list' => 'Tipe event harus bernilai 0 (online) atau 1 (offline)'
            ]
        ],
        'price' => [
            'rules' => 'required|max_length[10]',
            'errors' => [
                'required' => 'Harga event tidak boleh kosong',
                'max_length' => 'Harga maksimal 10 digit'
            ]
        ],
        'date' => [
            'rules' => 'required|valid_date',
            'errors' => [
                'required' => 'Tanggal event harus dipilih',
                'valid_date' => 'Tanggal event tidak valid'
            ]
        ],
        'country' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama negara tidak boleh kosong',
            ]
        ],
        'province' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama provinsi tidak boleh kosong',
            ]
        ],
        'city' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama kota tidak boleh kosong',
            ]
        ],
        'postal_code' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Kode pos tidak boleh kosong',
                'numeric' => 'Kode pos tidak valid',
            ]
        ],
        'street' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Jalan tidak boleh kosong',
            ]
        ],
        'host' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama host tidak boleh kosong',
            ]
        ],
        'host_email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Email host tidak boleh kosong',
                'valid_email' => 'Email host tidak valid',
            ]
        ],
        'category_id' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Kategori harus dipilih',
            ]
        ],
        'collaborator' => [
            'rules' => 'collaborator_valid_email',
            'errors' => [
                'collaborator_valid_email' => 'Email ini tidak ditemukan di database atau tidak berhak sebagai collaborator',
            ]
        ],
    ];
}
