<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class adminController extends Controller
{

        public function admin()
    {
        $items = Item::all(); // 获取所有 items
        return view('admin', compact('items')); // 只传递 'items' 到视图
    }

    public function store(Request $request)
    {
        // 验证表单数据
        $validated = $request->validate([
            'sku' => 'required|unique:items,sku',
            'zone' => 'required|string',
            'rack' => 'required|string',
        ]);

        // 创建新的 Item 记录
        Item::create($validated);

        // 重定向并显示成功消息
        return redirect()->route('admin.dashboard')->with('success', 'Item added successfully!');
    }

     // 编辑表单
     public function edit($id)
     {
         $item = Item::findOrFail($id);
         return view('edit', compact('item')); // 创建视图 'items.edit'
     }

     // 更新数据
     public function update(Request $request, $id)
     {
         $validated = $request->validate([
             'sku' => 'required|unique:items,sku,' . $id,
             'zone' => 'required|string',
             'rack' => 'required|string',
         ]);

         $item = Item::findOrFail($id);
         $item->update($validated); // 更新数据

         return redirect()->route('admin.dashboard')->with('success', 'Item updated successfully!');
     }

     // 删除功能
     public function destroy($id)
     {
         $item = Item::findOrFail($id);
         $item->delete(); // 删除项

         return redirect()->route('admin.dashboard')->with('success', 'Item deleted successfully!');
     }


}
