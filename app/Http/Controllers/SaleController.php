<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\User;
use Illuminate\Support\Facades\DB;


class SaleController extends Controller
{

    public function manageVue()
    {

        $users = User::all();
        $items = Item::all();

        return view('sales', compact('users', 'items'));
    }


    public function index(Request $request)
    {


        $users = Sale::select('sales.id as id', 'users.name as user', 'items.title as item', 'items.price as price', 'sales.created_at as date')
            ->join('users', 'users.id', '=', 'sales.user_id')
            ->join('items', 'items.id', '=', 'sales.item_id')
            ->paginate(5);


        $response = [
            'pagination' => [
                'total' => $users->total(),
                'per_page' => $users->perPage(),
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
                'from' => $users->firstItem(),
                'to' => $users->lastItem()
            ],
            'data' => $users
        ];

        return response()->json($response);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'item_id' => 'required',
        ]);

        $create = Sale::create($request->all());

        return response()->json($create);
    }



    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'item_id' => 'required',
        ]);

        $edit = Sale::find($id)->update($request->all());

        return response()->json($edit);
    }

    public function destroy($id)
    {
        Sale::find($id)->delete();
        return response()->json(['done']);
    }
}