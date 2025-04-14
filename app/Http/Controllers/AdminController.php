<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminController
{
    public function index()
    {
        $formFiles = File::files(base_path('form-definitions'));
        $forms = collect($formFiles)->map(function ($file) {
            $json = json_decode(file_get_contents($file), true);
            return [
                'key' => $file->getFilenameWithoutExtension(),
                'name' => $json['name'] ?? $file->getFilename()
            ];
        });

        return view('jsonform.admin.index', compact('forms'));
    }

    public function view($form)
    {
        $path = base_path("form-definitions/{$form}.json");
        if (!file_exists($path)) abort(404);

        $json = json_decode(file_get_contents($path), true);
        $data = DB::table($json['table'])->get();

        return view('jsonform.admin.view', [
            'formName' => $json['name'],
            'fields' => $json['fields'],
            'entries' => $data
        ]);
    }
}
