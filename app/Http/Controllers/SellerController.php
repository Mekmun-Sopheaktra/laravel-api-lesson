<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellerRequest;
use App\Http\Resources\SellerResource;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    //index
    public function index(Request $request)
    {
        $per_page = 15;

        $sellers = Seller::paginate($per_page);

        $data = SellerResource::collection($sellers);

        return response()->json($data);
    }

    //show
    public function show($id)
    {
        $seller = Seller::find($id);

        $data = SellerResource::make($seller);

        return response()->json($data);
    }

    //store
    public function store(SellerRequest $request)
    {
        $seller = Seller::create([
            'name' => $request->name,
            'email' => $request->email,
            'description' => $request->description,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'password' => $request->password,
            'profile_photo_path' => $request->profile_photo_path,
            'salary' => $request->salary,
            'is_active' => $request->is_active,
            'status' => $request->status,
            'seller_status' => $request->seller_status,
            'dob' => $request->dob,
            'meta' => $request->meta,
            'user_id' => $request->user_id,
        ]);

        return response()->json($seller);
    }
}
