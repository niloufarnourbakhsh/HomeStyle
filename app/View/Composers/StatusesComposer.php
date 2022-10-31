<?php

namespace App\View\Composers;

use App\Models\Status;
use Illuminate\View\View;

class StatusesComposer
{
    public function compose(View $view)
    {
        $view->with('statuses',Status::query()->get());
    }

}
