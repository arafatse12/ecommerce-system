<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;

trait Helper
{

    public $perPage = 20;

    public function __construct()
    {
        if (request()->input('per_page')) {
            $this->perPage = request()->input('per_page');
        }
    }

    public function returnData($status_code = null, $result = null, $message = null)
    {
        $data = [];
        if ($status_code) {
            $data['status'] = $status_code;
        }
        if ($result) {
            $data['result'] = $result;
        }
        if ($message) {
            $data['message'] = $message;
        }
        $data['date'] = Session::get('0');

        return $data;
    }
}
