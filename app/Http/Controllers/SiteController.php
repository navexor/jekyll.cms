<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    public function __construct()
    {

    }

    public function rebuild()
    {
        $ret = '';

        $folder = config('blog.file.main_dir');
        $command = config('blog.jekyll.bin') . config('blog.jekyll.rebuild');

        /*$jekyllBin = \SystemHelper::whichJekyll();
        if (empty($jekyllBin)) {
            return "<pre class='alert-success'>Jekyll command not found</pre>";
        }*/

        $out = \SystemHelper::exec("cd {$folder} && {$command}");
        if ($error = array_get($out, 'stderr')) {
            $ret .= "<pre class='alert-danger'>$error</pre>";
        }

        if ($data = array_get($out, 'stdout')) {
            if ($data !== '') {
                $ret .= "<pre class='alert-success'>$data</pre>";
            }
        }

        return $ret;
    }

}
