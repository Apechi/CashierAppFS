<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'types' => [
        'name' => 'Types',
        'index_title' => 'Types List',
        'new_title' => 'New Type',
        'create_title' => 'Create Type',
        'edit_title' => 'Edit Type',
        'show_title' => 'Show Type',
        'inputs' => [
            'name' => 'Nama',
            'icon' => 'Icon',
            'category_id' => 'Kategori',
        ],
    ],

    'customers' => [
        'name' => 'Customers',
        'index_title' => 'Customers List',
        'new_title' => 'New Customer',
        'create_title' => 'Create Customer',
        'edit_title' => 'Edit Customer',
        'show_title' => 'Show Customer',
        'inputs' => [
            'name' => 'Nama',
            'email' => 'Email',
            'no_telp' => 'No Telp',
            'address' => 'Alamat',
        ],
    ],

    'tables' => [
        'name' => 'Tables',
        'index_title' => 'Tables List',
        'new_title' => 'New Table',
        'create_title' => 'Create Table',
        'edit_title' => 'Edit Table',
        'show_title' => 'Show Table',
        'inputs' => [
            'table_number' => 'Nomor Meja',
            'capacity' => 'Kapasitas',
            'status' => 'Status Meja',
        ],
    ],

    'stocks' => [
        'name' => 'Stocks',
        'index_title' => 'Stocks List',
        'new_title' => 'New Stock',
        'create_title' => 'Create Stock',
        'edit_title' => 'Edit Stock',
        'show_title' => 'Show Stock',
        'inputs' => [
            'menu_id' => 'Pilih Menu',
            'quantity' => 'Kuantitas',
        ],
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ],
    ],

    'bookings' => [
        'name' => 'Bookings',
        'index_title' => 'Bookings List',
        'new_title' => 'New Booking',
        'create_title' => 'Create Booking',
        'edit_title' => 'Edit Booking',
        'show_title' => 'Show Booking',
        'inputs' => [
            'bookers_name' => 'Nama Pemesan',
            'date' => 'Tanggal Booking',
            'table_id' => 'Meja',
            'start_time' => 'Jam Mulai',
            'end_time' => 'Jam Akhir',
            'total_customer' => 'Total Pelanggan',
        ],
    ],

    'categories' => [
        'name' => 'Categories',
        'index_title' => 'List Kategori',
        'new_title' => 'Kategori Baru',
        'create_title' => 'Tambah Kategori',
        'edit_title' => 'Edit Kategori',
        'show_title' => 'Lihat Kategori',
        'inputs' => [
            'name' => 'Nama',
            'icon' => 'Icon',
        ],
    ],

    'menus' => [
        'name' => 'Menus',
        'index_title' => 'Menus List',
        'new_title' => 'New Menu',
        'create_title' => 'Create Menu',
        'edit_title' => 'Edit Menu',
        'show_title' => 'Show Menu',
        'inputs' => [
            'name' => 'Nama',
            'price' => 'Harga',
            'image' => 'Gambar Menu',
            'description' => 'Deskripsi',
            'type_id' => 'Tipe Menu',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
