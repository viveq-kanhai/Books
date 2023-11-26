<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'author',
        'price',
        'subject_id',
        'file_path'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'book_users', 'book_id', 'user_id');

    }

    public function subject(): BelongsTo{
        return $this->belongsTo(Subject::class, 'subject_id', 'id' );
    }

    protected static function booted(): void
    {
        static::deleting(function ($book) {
            $bookUsers = BookUser::where('book_id', $book->id)->get();
            foreach ($bookUsers as $b)
                $b->delete();
        });
    }
}
