<?php

namespace App\Http\View\Composers;

use App\Models\Status;
use Illuminate\View\View;

class StatusesComposer
{
    public function compose(View $view)
    {
        $view->with(Status::query()->get());
    }

}
