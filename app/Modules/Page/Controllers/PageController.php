<?php

namespace App\Modules\Page\Controllers;

use App\Http\Controllers\Controller;
use App\Contracts\PageRepositoryInterface;
use App\Contracts\ChannelRepositoryInterface;

class PageController extends Controller
{
    private $channels,$pages;
    public function __construct(ChannelRepositoryInterface $channels ,PageRepositoryInterface $pages)
    {
        $this->channels = $channels;
        $this->pages = $pages;

    }

    public function showChannelContent($id)
    {
        $checkChannel = $this->channels->fetchById($id);
        if ($checkChannel) {
            return view('Page::showCustomizePage', [
                'channel' => $checkChannel,


            ]);
        }

    }


    public function showChannelPage($id)
    {
        $checkpage = $this->pages->fetchPage($id);
        if ($checkpage) {
            return view('Page::showPage', [
                'page' => $checkpage,


            ]);
        }

    }
}
