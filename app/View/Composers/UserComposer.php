<?php

namespace App\View\Composers;


use App\Models\User;
use Illuminate\View\View;


class UserComposer
{
    public function __construct(
        protected User $users,
    ) {}
 
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        // dd($this->users->get());
        $view->with('UsersCount', $this->users->count());
    }
}
