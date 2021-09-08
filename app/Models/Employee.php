<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = "employees";
    protected $fillable = [
        'e_name',
        'e_address',
        'e_contact_no',
        'e_email',
        'e_designation',
        'e_sallary'
    ];
}
