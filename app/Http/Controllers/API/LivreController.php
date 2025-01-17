<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Livre;
use App\Repositories\LivresRepository;

class LivreController extends Controller
{
    protected $apilivreRepo;

    public function __construct(LivresRepository $api_livre_repo)
    {
        $this->apilivreRepo = $api_livre_repo;
    }

    public function index()
    {
        $data = $this->apilivreRepo->apiIndexLivre();

        return response()->json([
            'status' => 200,
            'data' => $data
        ],200);
    }

    public function show(Livre $livre)
    {
        $data = $this->apilivreRepo->apiShowLivre($livre);

        return response()->json([
            'status' => 200,
            'data' => $data
        ],200);
    }
}
