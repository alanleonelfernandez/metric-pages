<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
use App\Models\Strategy;
use App\Models\MetricHistoryRun;

class MetricController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $strategies = Strategy::all();
        $metrics = MetricHistoryRun::all();

        return view('metrics.index', compact('categories', 'strategies'));
        return view('metrics.history', compact('metrics'));
    }

    public function historyMetrics()
    {
        $categories = Category::all();
        $strategies = Strategy::all();
        $metrics = MetricHistoryRun::all();

        return view('metrics.history', compact('metrics'));
    }

    public function fetchMetrics(Request $request)
    {
        set_time_limit(900);
        $url = $request->input('url');
        $categories = $request->input('categories', []);
        $strategy = $request->input('strategy');
    
        $client = new \GuzzleHttp\Client();
        $metrics = [];
    
        try {
            foreach ($categories as $category) {
                $response = $client->request('GET', 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed', [
                    'query' => [
                        'url' => $url,
                        'key' => env('GOOGLE_PAGESPEED_API_KEY'),
                        'strategy' => $strategy,
                        'category' => $category
                    ],
                    'verify' => false,
                ]);
    
                $data = json_decode($response->getBody(), true);
                $categoriesData = $data['lighthouseResult']['categories'];
                $lowercaseCategory = strtolower(str_replace('_', '-', $category));
    
                if (isset($categoriesData[$lowercaseCategory])) {
                    $metrics[$category] = $categoriesData[$lowercaseCategory]['score'] ?? null;
                }
            }
    
            return response()->json(['metrics' => $metrics]);
        } catch (\Exception $e) {
            Log::error('Error fetching data from API: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching data from API'], 500);
        }
    }

    public function saveMetrics(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
            'accessibility_metric' => 'nullable|numeric',
            'performance_metric' => 'nullable|numeric',
            'best_practices_metric' => 'nullable|numeric',
            'strategy_id' => 'required|integer',
        ]);
    
        MetricHistoryRun::create([
            'url' => $request->input('url'),
            'accessibility_metric' => $request->input('accessibility_metric'),
            'performance_metric' => $request->input('performance_metric'),
            'best_practices_metric' => $request->input('best_practices_metric'),
            'strategy_id' => $request->input('strategy_id'),
        ]);
    
        return response()->json(['success' => true]);
    }

    public function history()
    {
        $metrics = MetricHistoryRun::with('strategy')->get();
        return view('metrics.history', compact('metrics'));
    }
}


