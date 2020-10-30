<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientComment extends Model
{
    protected $fillable=[
        'client_comment_serial',
        'client_comment_name',
        'image',
        'client_comment_desc',
        'client_comment_status'
];

}
