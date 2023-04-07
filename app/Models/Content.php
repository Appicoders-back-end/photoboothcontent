<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    public const IMAGE = 'image';
    public const VIDEO = 'video';
    public const DOCUMENT = 'document';
    public const AUDIO = 'audio';

    public const ACTIVE = 'active';
    public const INACTIVE = 'inactive';
}
