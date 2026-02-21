<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    public const TYPE_STUDENT = 'student';
    public const TYPE_LEADER = 'leader';

    public const STATUS_NEW = 'new';
    public const STATUS_CONTACTED = 'contacted';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_REJECTED = 'rejected';

    protected $fillable = [
        'type',
        'full_name',
        'email',
        'phone',
        'age',
        'school_name',
        'grade_level',
        'church_name',
        'years_serving',
        'ministry_area',
        'message',
        'status',
        'ip_address',
        'user_agent',
    ];
}
