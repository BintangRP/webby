<?php

namespace App\Http\Controllers;

use App\Models\BusinessInsight;
use Illuminate\Http\Request;
use Mistral\Mistral;

class BusinessInsightController extends Controller
{
    protected $mistral;

    public function __construct()
    {
        $this->mistral = new Mistral(['api_key' => env('MISTRAL_API_KEY')]);
    }

    public function generate(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'error' => 'User not authenticated'
            ], 401);
        }

        if (!$user->canGenerate()) {
            return response()->json([
                'error' => 'Daily limit reached'
            ], 403);
        }

        $message = "Kamu berperan sebagai seorang ahli bisnis berpengalaman di bidang {$request->bidangBisnis}. " .
                  "Tugas Anda adalah membantu saya mengidentifikasi ide bisnis inovatif dan berpotensi menguntungkan " .
                  "di Indonesia, yang sesuai dengan target pasar {$request->targetPasar}. Berikan ide bisnis yang " .
                  "inovatif dan berpotensi menguntungkan, berikan point-point dari Langkah-Langkah, dokumen yang " .
                  "dipersiapkan di Indonesia.";

        try {
            $response = $this->mistral->chat->complete([
                'model' => 'pixtral-12b-2409',
                'messages' => [
                    ['role' => 'admin', 'content' => $message]
                ]
            ]);

            if ($user->role === 'user') {
                $user->increment('daily_generations');
            }

            $insight = BusinessInsight::create([
                'user_id' => $user->id,
                'business_field' => $request->bidangBisnis,
                'target_market' => $request->targetPasar,
                'insight' => $response->choices[0]->message->content
            ]);

            return response()->json([
                'insight' => $response->choices[0]->message->content
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
