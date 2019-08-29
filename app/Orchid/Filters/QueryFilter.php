<?php

namespace App\Orchid\Filters;

use Orchid\Screen\Field;
use Orchid\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Screen\Fields\Input;

class QueryFilter extends Filter
{
    /**
     * @var array
     */
    public $parameters = ['query'];

    /**
     * @var bool
     */
    // public $dashboard = false;

    /**
     * @return string
     */
    public function name(): string
    {
        return '';
    }

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        $q =  '%'. $this->request->get('query') . '%';
        return $builder
            ->where('title', 'ILIKE' , $q)
            ->orWhere('body', 'ILIKE' , $q)
            ->orWhere('description', 'ILIKE' , $q)
            ;
    }

    /**
     * @return Field[]
     */
    public function display(): array
    {
        return [
            Input::make('query')
                    ->type('text')
                    ->value($this->request->get('query'))
                    ->placeholder('Найти...')
                    ->title('Поиск по всему'),
            ];
    }
}
