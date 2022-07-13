<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addressbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user',
        'password',
        'server_ip',
        'server_port',
        'addressbook_hash',
    ];

}
