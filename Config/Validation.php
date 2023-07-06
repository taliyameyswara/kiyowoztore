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

    public $barang = [
        'nama' => [
            'rules' => 'required|min_length[5]',
        ],
        'harga' => [
            'rules' => 'required|integer',
        ],
        'jumlah'=>[
            'rules' => 'required|integer',
        ],
    ];

    public $barang_errors = [
        'nama' => [
            'required' =>'{field} must be filled',
            'min_length' => '{field} minimum 5 characters',
        ],
        'harga' => [
            'required' => '{field} must be filled',
            'integer' => '{field} must be in numeric format'
        ],
        'jumlah'=>[
            'required' => '{field} must be filled',
            'integer' => '{field} must be in numeric format'
        ],
    ];

    public $user = [
        'username' => [
            'rules' => 'required|min_length[5]',
        ],
        'password' => [
            'rules' => 'required|min_length[5]',
        ]
    ];

    public $user_errors = [
        'username' => [
            'required' =>'{field} must be filled',
            'min_length' => '{field} minimum 5 characters',
        ],
        'password' => [
            'required' => '{field} must be filled',
            'min_length' => '{field} minimum 5 characters'
        ]
    ];



   
}
