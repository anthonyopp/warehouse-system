<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all(); // 获取所有 items
        return view('user.items', compact('items')); // 传递所有 items 到视图
    }



    public function userPage(Request $request)
    {

        // 获取搜索条件
        $sku = $request->get('sku');
        $zone = $request->get('zone');
        $rack = $request->get('rack');

        // 使用条件查询数据
        $query = Item::query();

        if ($sku) {
            $query->where('sku', 'like', '%' . $sku . '%');
        }

        if ($zone) {
            $query->where('zone', 'like', '%' . $zone . '%');
        }

        if ($rack) {
            $query->where('rack', 'like', '%' . $rack . '%');
        }

        // 获取所有符合条件的 items，不进行分页
        $items = $query->get();

        return view('user.items', compact('items')); // 传递查询结果到视图
    }
}
