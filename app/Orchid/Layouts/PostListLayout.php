<?php

namespace App\Orchid\Layouts;

use App\Model\Post;
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;

class PostListLayout extends Table
{
    /**
     * Data source.
     *
     * @var string
     */
    public $data = 'posts';

    /**
     * @return TD[]
     */
    public function fields(): array
    {
        return [
            // TD::set('title', 'Title')->link('platform.post.edit', 'id', 'title'),
            // or
            TD::set('title', 'Title')
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->render(function (Post $post) {
                    // Please use view('path')
                    $route = route('platform.post.edit', $post);
                    $title = e($post->title);

                    return "<a href='{$route}'>{$title}</a>";
                }),

            TD::set('description', 'Description')
                ->sort()
                ->filter(TD::FILTER_TEXT)
            ,
            TD::set('author', 'Author')
                ->sort()
                ->render(function (Post $post) {
                    return $post->authorUser->name;
                })
            ,
            TD::set('created_at', 'Created')
                ->sort()
                ->filter(TD::FILTER_DATE)
            ,
            TD::set('updated_at', 'Last edit')
                ->sort()
                ->filter(TD::FILTER_DATE)
            ,
        ];
    }
}
