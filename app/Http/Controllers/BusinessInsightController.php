<?php

namespace App\Http\Controllers;

use App\Models\BusinessInsight;
use Illuminate\Http\Request;


class BusinessInsightController extends Controller
{
    public function generate(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'message' => 'User not authenticated'
            ], 401);
        }

        if (!($user->canGenerate())) {
            return response()->json([
                'limit' => 'Daily limit reached'
            ], 403);
        }

        try {
            if ($user->role === 'user') {
                $user->increment('daily_generations');
            }

            $validated = $request->validate([
                'user_id' => ['required'],
                'business_field' => 'required|string|max:255',
                'target_market' => 'required|string|max:255',
                'insight' => 'required|string',
            ]);

            if ($user->id != $validated['user_id']) {
                return response()->json([
                    'error' => 'User not same'
                ], 401);
            }

            $insight = BusinessInsight::create([
                'user_id' => $user->id,  // Use the authenticated user's ID
                'business_field' => $validated['business_field'],
                'target_market' => $validated['target_market'],
                'insight' => $validated['insight'],
            ]);

            return response()->json([
                'insight' => $insight
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to generate insight'
            ], 500);
        }
    }

    public function save(Request $request)
    {
        $user = auth()->user();

        $insight = BusinessInsight::create([
            'user_id' => $user->id,
            'business_field' => $request->business_field,
            'target_market' => $request->target_market,
            'insight' => $request->content
        ]);

        return response()->json([
            'message' => 'Insight saved successfully'
        ]);
    }

    public function delete($id)
    {
        $insight = BusinessInsight::findOrFail($id);

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
