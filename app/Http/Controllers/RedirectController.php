<?php

namespace App\Http\Controllers;

use App\Models\Module;

class RedirectController extends Controller
{
    public function __invoke()
    {
        return redirect('/admin/dashboard');
    }
}
