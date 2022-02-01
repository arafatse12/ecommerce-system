<?php


if (!function_exists('app_name')) {
    function app_name()
    {
        $app_name = env('APP_NAME') ? env('APP_NAME') : 'E-commerce';
        return $app_name;
    }
}

if (!function_exists('assets')) {
    function assets($filepath = '')
    {
        $env_path = env('PUBLIC_PATH');
        return "$env_path/$filepath";
    }
}


if (!function_exists('returnData')) {
    function returnData($status_code = 2000, $result = null, $message = null)
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
        return $data;
    }
}

if (!function_exists('sortBy')) {
    function sortBy($request, $default = 'id', $dafaultSort = 'desc')
    {
        if ($request->sort_column && $request->sort) {
            return (object)[
                'column' => $request->sort_column,
                'sort' => $request->sort
            ];
        } else {
            return (object)[
                'column' => $default,
                'sort' => $dafaultSort
            ];
        }
    }
}

if (!function_exists('cacheClear')) {
    function cacheClear(array $caches)
    {
        foreach ($caches as $cache) {
            Cache::forget($cache);
        }
    }
}



