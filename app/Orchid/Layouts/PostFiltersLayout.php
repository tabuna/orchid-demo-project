<?php

namespace App\Orchid\Layouts;

use App\Orchid\Filters\QueryFilter;
use Orchid\Filters\Filter;
use App\Orchid\Filters\RoleFilter;
use Orchid\Screen\Layouts\Selection;

class PostFiltersLayout extends Selection
{
    /**
     * @return Filter[]
     */
    public function filters(): array
    {
        return [
            QueryFilter::class,
        ];
    }
}
