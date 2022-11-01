<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChecklistGroup extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $table = 'checklist_groups';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public function checklists()
    {
        return $this->hasMany(Checklist::class);
    }
}
