<?php

namespace App\Http\Controllers;

use App\Models\BusinessInsight;
use Illuminate\Http\Request;

class SaveInsightsController extends Controller
{

    public function index()
    {
        $insights = auth()->user()->insights()
            ->latest()
            ->paginate(10);

        return view('insights.index', compact('insights'));
    }

    public function show(BusinessInsight $insight)
    {
        if ($insight->user_id !== auth()->id()) {
            abort(403);
        }

        return view('insights.show', compact('insight'));
    }

    public function delete($id)
    {
        dump($id);
        $insight = BusinessInsight::find($id);
        dump($insight);

        if ($insight->user_id !== auth()->id()) {
            return response()->json([
                'error' => 'Unauthorized'
            ], 403);
        }

        $insight->delete();

        return response()->json([
            'message' => 'Insight deleted successfully'
        ]);
    }
}
