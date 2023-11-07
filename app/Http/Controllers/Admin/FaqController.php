<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqStoreRequest;
use App\Models\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function index(): View
    {
        $faqs = Faq::query()->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {

    }

    public function store(FaqStoreRequest $request): RedirectResponse
    {
        Faq::query()->create($request->validated());
        return redirect()->route('admin.faqs.index');
    }

    public function edit(): View
    {

    }

    public function update()
    {

    }

    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete();
        return redirect()->back();
    }
}
