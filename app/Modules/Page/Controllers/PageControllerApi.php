<?php

namespace App\Modules\Page\Controllers;

use App\Contracts\PageRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageControllerApi extends Controller
{
    private $pages;
    public function __construct(PageRepositoryInterface $pages)
    {
        $this->pages = $pages;

    }

    public function handleLoadChannelContent(Request $request, $id)
    {

        $channelContent = $this->pages->load($request->all(), $id);
        if ($channelContent) {
            return response()->json($channelContent);
        }
        return response()->json([], 404);

    }

    public function handleStoreChannelContent(Request $request, $id)
    {


        $channelContent = $this->pages->store($request->all(), $id);
        if ($channelContent) {
            return redirect()->back();
        }
        return response()->json([], 404);
    }
}
