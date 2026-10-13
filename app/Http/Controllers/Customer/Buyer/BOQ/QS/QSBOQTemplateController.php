<?php

namespace App\Http\Controllers\Customer\Buyer\BOQ\QS;

use App\Http\Controllers\Controller;
use App\Repositories\Customer\BoqTemplateRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QSBOQTemplateController extends Controller
{
    public function __construct(private BoqTemplateRepository $boqTemplateRepository)
    {
    }

    protected function boqSourceForUser($user): string
    {
        return in_array($user->account_type, ['Architect', 'Developer']) ? 'architect' : 'qs';
    }

    protected function redirectAfterTemplateImport($user, int $boqId): string
    {
        if (in_array($user->account_type, ['Architect', 'Developer'])) {
            return route('buyer.edit-boq', $boqId);
        }

        return route('buyer.add-project-quantity', $boqId);
    }

    public function index()
    {
        $user = Auth::guard('buyer')->user();
        $templates = $this->boqTemplateRepository->getTemplatesForUser($user->id);

        return view('customer.buyer.boq.qs.my-templates', compact('templates'));
    }

    public function show($template_id)
    {
        $user = Auth::guard('buyer')->user();
        $template = $this->boqTemplateRepository->getTemplateForUser((int) $template_id, $user->id);

        return view('customer.buyer.boq.qs.show-template', compact('template'));
    }

    public function listForSelect()
    {
        try {
            $user = Auth::guard('buyer')->user();
            $templates = $this->boqTemplateRepository->getTemplatesForUser($user->id);

            return $this->successResponse($templates, 'Templates loaded.');
        } catch (\Throwable $e) {
            return $this->errorResponse([], $e->getMessage(), 422);
        }
    }

    public function saveFromBoq(Request $request)
    {
        $request->validate([
            'boq_id'        => 'nullable|integer',
            'name'          => 'required|string|max:255',
            'template_type' => 'nullable|string|max:255',
            'items'         => 'nullable|array',
        ]);

        try {
            $user = Auth::guard('buyer')->user();
            $userId = (int) $user->id;
            $source = $this->boqSourceForUser($user);

            $template = $this->boqTemplateRepository->saveFromProjectBoq(
                (int) ($request->boq_id ?? 0),
                $userId,
                $request->name,
                $request->template_type,
                $request->input('items'),
                $request,
                $source
            );

            return $this->successResponse($template, 'BOQ saved as template successfully.');
        } catch (\Throwable $e) {
            return $this->errorResponse([], $e->getMessage(), 422);
        }
    }

    public function create()
    {
        return view('customer.buyer.boq.qs.template-editor');
    }

    public function edit($template_id)
    {
        $user = Auth::guard('buyer')->user();
        $template = $this->boqTemplateRepository->getTemplateForUser((int) $template_id, $user->id);

        return view('customer.buyer.boq.qs.template-editor', compact('template'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'template_type' => 'nullable|string|max:255',
            'items'         => 'required|array',
        ]);

        try {
            $user = Auth::guard('buyer')->user();
            $template = $this->boqTemplateRepository->createTemplateFromItems(
                (int) $user->id,
                $request->name,
                $request->template_type,
                $request->input('items', []),
                $request
            );

            return $this->successResponse(
                ['redirect' => route('buyer.boq-template-edit', $template->id)],
                'Template created successfully.'
            );
        } catch (\Throwable $e) {
            return $this->errorResponse([], $e->getMessage(), 422);
        }
    }

    public function update(Request $request, $template_id)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'template_type' => 'nullable|string|max:255',
            'items'         => 'required|array',
        ]);

        try {
            $user = Auth::guard('buyer')->user();
            $this->boqTemplateRepository->updateTemplateFromItems(
                (int) $template_id,
                (int) $user->id,
                $request->name,
                $request->template_type,
                $request->input('items', []),
                $request
            );

            return $this->successResponse([], 'Template updated successfully.');
        } catch (\Throwable $e) {
            return $this->errorResponse([], $e->getMessage(), 422);
        }
    }

    public function importToBoq(Request $request, $boq_id)
    {
        $request->validate([
            'template_id' => 'required|integer',
        ]);

        try {
            $user = Auth::guard('buyer')->user();
            $source = $this->boqSourceForUser($user);

            $this->boqTemplateRepository->importToProjectBoq(
                (int) $request->template_id,
                (int) $boq_id,
                $user->id,
                $source
            );

            session(['boq_editing_' . $boq_id => true]);

            return $this->successResponse(
                ['redirect' => $this->redirectAfterTemplateImport($user, (int) $boq_id)],
                'Template imported successfully.'
            );
        } catch (\Throwable $e) {
            return $this->errorResponse([], $e->getMessage(), 422);
        }
    }

    public function removeFromBoq($boq_id)
    {
        try {
            $user = Auth::guard('buyer')->user();
            $source = $this->boqSourceForUser($user);

            $this->boqTemplateRepository->removeAppliedTemplateFromProjectBoq(
                (int) $boq_id,
                (int) $user->id,
                $source
            );

            session()->forget('boq_editing_' . (int) $boq_id);

            return $this->successResponse([], 'Applied template removed from BOQ.');
        } catch (\Throwable $e) {
            return $this->errorResponse([], $e->getMessage(), 422);
        }
    }

    public function duplicate($template_id)
    {
        try {
            $user = Auth::guard('buyer')->user();
            $template = $this->boqTemplateRepository->duplicateTemplate(
                (int) $template_id,
                $user->id
            );

            return $this->successResponse(
                ['redirect' => route('buyer.boq-templates')],
                'Template duplicated successfully.'
            );
        } catch (\Throwable $e) {
            return $this->errorResponse([], $e->getMessage(), 422);
        }
    }

    public function destroy($template_id)
    {
        try {
            $user = Auth::guard('buyer')->user();
            $this->boqTemplateRepository->deleteTemplate((int) $template_id, $user->id);

            return $this->successResponse([], 'Template deleted successfully.');
        } catch (\Throwable $e) {
            return $this->errorResponse([], $e->getMessage(), 422);
        }
    }
}
