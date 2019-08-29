<?php

namespace App\Orchid\Screens;

use App\Model\Post;
use App\Orchid\Layouts\PostListLayout;
use App\Orchid\Layouts\PostFiltersLayout;
use Orchid\Screen\Layout;
use Orchid\Screen\Link;
use Orchid\Screen\Screen;

class PostListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Blog post';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'All blog posts';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'posts' => Post::query()
                           ->filters()
                           ->filtersApplySelection(PostFiltersLayout::class)
                           ->paginate(),
        ];
    }

    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar(): array
    {
        return [
            Link::name('Create new')
                ->icon('icon-pencil')
                ->link(route('platform.post.edit')),
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            PostFiltersLayout::class,
            PostListLayout::class,
        ];
    }
}
