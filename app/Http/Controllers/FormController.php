<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public function show($form)
    {
        $formJson = $this->loadForm($form);
        $html = view('jsonform.form', compact('formJson'))->render();
        return view('jsonform.wrapper', compact('html'));
    }

    public function submit(Request $request, $form)
    {
        $formJson = $this->loadForm($form);
        $rules = [];
        foreach ($formJson['fields'] as $field) {
            if (isset($field['validation'])) {
                $rules[$field['name']] = $field['validation'];
            }
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (!Schema::hasTable($formJson['table'])) {
            Schema::create($formJson['table'], function ($table) use ($formJson) {
                $table->id();
                foreach ($formJson['fields'] as $field) {
                    $table->string($field['name'])->nullable();
                }
                $table->timestamps();
            });
        }

        $data = [];
        foreach ($formJson['fields'] as $field) {
            $data[$field['name']] = $request->input($field['name']);
        }

        DB::table($formJson['table'])->insert($data);

        return redirect()->back()->with('success', 'Form submitted!');
    }

    private function loadForm($form)
    {
        $path = base_path("form-definitions/{$form}.json");
        if (!file_exists($path)) abort(404);
        return json_decode(file_get_contents($path), true);
    }
}
