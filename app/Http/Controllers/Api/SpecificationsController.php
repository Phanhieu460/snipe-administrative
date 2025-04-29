<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Transformers\SelectlistTransformer;
use App\Models\Specification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;

class SpecificationsController extends Controller
{
    public function index(Request $request): JsonResponse | array
    {
        $this->authorize('view', Specification::class);

        $query = Specification::query();

        if ($request->filled('search')) {
            $query->where('name', 'LIKE', '%'.$request->get('search').'%');
        }

        $total = $query->count();

        $query->orderBy('name', 'asc');

        $specifications = $query->paginate(50);

        return [
            'total' => $total,
            'rows' => $specifications->items()
        ];
    }

    public function selectlist(Request $request): array
    {
        $this->authorize('view.selectlists');

        $specifications = Specification::select(['id', 'name']);

        if ($request->filled('search')) {
            $specifications = $specifications->where('name', 'LIKE', '%'.$request->get('search').'%');
        }

        $specifications = $specifications->orderBy('name', 'ASC')->paginate(50);

        foreach ($specifications as $specification) {
            $specification->use_image = null;
        }

        return (new SelectlistTransformer)->transformSelectlist($specifications);
    }

    public function show($id): array
    {
        $this->authorize('view', Specification::class);
        $specification = Specification::findOrFail($id);
        return [
            'id' => $specification->id,
            'name' => $specification->name,
        ];
    }
}
