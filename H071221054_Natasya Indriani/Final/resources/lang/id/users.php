<?php
/*
language : Indonesia
*/
return [
    'title' => [
        'index' => 'Pengguna',
        'create' => 'Tambah pengguna',
        'edit' => 'Ubah pengguna',
    ],
    'form_control' => [
        'input' => [
            'name' => [
                'label' => 'Nama',
                'placeholder' => 'Masukkan nama',
                'attribute' => 'nama'
            ],
            'email' => [
                'label' => 'Email',
                'placeholder' => 'Masukkan email',
                'attribute' => 'email'
            ],
            'password' => [
                'label' => 'Password',
                'placeholder' => 'Masukkan password',
                'attribute' => 'password'
            ],
            'password_confirmation' => [
                'label' => 'Konfirmasi password',
                'placeholder' => 'Ketik ulang password',
                'attribute' => 'konfirmasi password'
            ],
            'search' => [
                'label' => 'Cari',
                'placeholder' => 'Cari pengguna',
                'attribute' => 'cari'
            ]
        ],
        'select' => [
            'role' => [
                'label' => 'Wewenang',
                'placeholder' => 'Pilih wewenang',
                'attribute' => 'wewenang'
            ]
        ]
    ],
    'label' => [
        'name' => 'Nama',
        'email' => 'Email',
        'role' => 'Wewenang',
        'no_data' => [
            'fetch' => "Data pengguna belum ada",
            'search' => "Pengguna :keyword tidak ditemukan",
        ],
    ],
    'button' => [
        'create' => [
            'value' => 'Tambah'
        ],
        'save' => [
            'value' => 'Simpan'
        ],
        'edit' => [
            'value' => 'Ubah'
        ],
        'delete' => [
            'value' => 'Hapus'
        ],
        'cancel' => [
            'value' => 'Batal'
        ],
        'back' => [
            'value' => 'Kembali'
        ],
    ],
    'alert' => [
        'create' => [
            'title' => "Tambah pengguna",
            'message' => [
                'success' => "Pengguna berhasil disimpan.",
                'error' => "Terjadi kesalahan saat menyimpan pengguna. :error"
            ]
        ],
        'update' => [
            'title' => 'Ubah pengguna',
            'message' => [
                'success' => "Pengguna berhasil diperbaharui.",
                'error' => "Terjadi kesalahan saat perbarui pengguna. :error"
            ]
        ],
        'delete' => [
            'title' => 'Hapus pengguna',
            'message' => [
                'confirm' => "Yakin akan menghapus pengguna :name ?",
                'success' => "Pengguna berhasil dihapus",
                'error' => "Terjadi kesalahan saat menghapus pengguna. :error"
            ]
        ],
    ]
];