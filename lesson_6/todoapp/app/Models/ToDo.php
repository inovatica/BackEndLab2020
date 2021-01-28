<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ToDo extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = "to_do";
    protected $hidden = ["deadline", "file_id", "parent_id", "created_at", "deleted_at"];
    protected $fillable = ["title", "description", "progress", "priority", "parent_id", "owner_id"];

    /**
     * Return parent record
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parent()
    {
        return $this->hasOne(ToDo::class, "id", "parent_id");
    }

    /**
     * Return list of children
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(ToDo::class, "parent_id", "id");
    }

    /**
     * Return owner
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return toDo File
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function file()
    {
        return $this->hasOne(File::class, "id", "file_id");
    }
}
