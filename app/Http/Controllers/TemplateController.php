<?php

namespace App\Http\Controllers;

use App\Http\Resources\TemplateResource;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        $template = Template::get();

        return TemplateResource::collection($template);
    }

    public function show($template)
    {
        $templates = Template::findOrFail($template);

        return new TemplateResource($templates);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'context' => 'required',
        ]);
        $template = Template::create($validated);

        return new TemplateResource($template);
    }

    public function update(Request $request, Template $template)
    {
        $validated = $request->validate([
            'name' => 'required',
            'context' => 'required',
        ]);
        $template->update($validated);

        return new TemplateResource($template);
    }

    public function destroy(Template $template)
    {
        $template->delete();

        return TemplateResource::collection(Template::all());
    }
}
