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
        return view('admin.faqs.create');
    }

    public function store(FaqStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        Faq::query()->create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Faq created successfully'
        ]);
    }

    public function edit(): View
    {

    }

    public function update()
    {

    }

    public function destroy(Faq $faq): \Illuminate\Http\JsonResponse
    {
        $faq->delete();
        return response()->json([
            'success' => true,
            'message' => 'Faq Deleted successfully'
        ]);
    }
}
