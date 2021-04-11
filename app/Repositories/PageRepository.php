<?php
namespace App\Repositories;

use App\Contracts\PageRepositoryInterface;
use App\Modules\Page\Models\Page;

class PageRepository implements PageRepositoryInterface
{

    public function load($page, $id)
    {

        $checkPage = Page::firstOrCreate(
            ['channel_id' => $id],
            [
                'channel_id' => $id,
                'assets' => $page['gjs-assets'] ?? null,
                'css' => $page['gjs-css'] ?? null,
                'styles' => $page['gjs-styles'] ?? null,
                'html' => $page['gjs-html'] ?? null,
                'components' => $page['gjs-components'] ?? null,

            ]
        );

        return
            [
            'gjs-assets' => $checkPage->getAttribute('assets'),
            'gjs-css' => $checkPage->getAttribute('css'),
            'gjs-styles' => $checkPage->getAttribute('styles'),
            'gjs-html' => $checkPage->getAttribute('html'),
            'gjs-components' => $checkPage->getAttribute('components'),
        ];

    }

    public function store($page, $id)
    {
        $checkPage = Page::updateOrCreate(
            ['channel_id' => $id],
            [
                'channel_id' => $id,
                'assets' => $page['gjs-assets'] ?? null,
                'css' => $page['gjs-css'] ?? null,
                'styles' => $page['gjs-styles'] ?? null,
                'html' => $page['gjs-html'] ?? null,
                'components' => $page['gjs-components'] ?? null,

            ]
        );

        return
            [
            'gjs-assets' => $checkPage->getAttribute('assets'),
            'gjs-css' => $checkPage->getAttribute('css'),
            'gjs-styles' => $checkPage->getAttribute('styles'),
            'gjs-html' => $checkPage->getAttribute('html'),
            'gjs-components' => $checkPage->getAttribute('components'),
        ];

    }

    public function fetchPage($id)
    {
        return Page::with('channel')->whereChannelId($id)->first();
    }

}
