<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class BuyerController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('scope:read-general')->only(['show']);
        $this->middleware('can:view,buyer')->only(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $this->allowedAdminAction();

        $buyers = Buyer::has('transactions')->get();

        return $this->showAll($buyers);
    }


    /**
     * Display the specified resource.
     *
     * @param Buyer $buyer
     * @return JsonResponse
     */
    public function show(Buyer $buyer)
    {
        return $this->showOne($buyer);
    }

}
