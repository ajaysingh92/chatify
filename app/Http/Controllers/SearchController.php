<?php

namespace App\Http\Controllers;

use App\Services\ElasticsearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $elasticsearchService;

    public function __construct(ElasticsearchService $elasticsearchService)
    {
        $this->elasticsearchService = $elasticsearchService;
    }

    public function search(Request $request)
    {
        $index = 'your_index_name';
        $query = $request->input('q');

        $results = $this->elasticsearchService->search($index, $query);

        // Process and return the search results
        return response()->json($results);
    }
}
