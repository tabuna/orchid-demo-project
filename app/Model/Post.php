<?php

namespace App\Model;

use App\Orchid\Filters\QueryFilter;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Post extends Model
{
    use AsSource,
        Filterable;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'body',
        'author',
    ];

    /**
     * @var array
     */
    protected $allowedFilters = [
        'title',
        'description',
        'author',
        'created_at',
        'updated_at',
    ];

    protected $allowedSorts = [
        'title',
        'description',
        'author',
        'created_at',
        'updated_at',
    ];

    public function authorUser()
    {
        return $this->belongsTo(User::class, 'author');
    }
}
