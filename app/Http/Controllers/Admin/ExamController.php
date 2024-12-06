<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $example = Exam::all();
        return view('admin.exam.index',[
            'example' => $example
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.exam.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Lấy file ảnh từ request và lưu vào thư mục
        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalName();
        $file->move(public_path('images/'), $fileName);

        // Tạo đối tượng mới và lưu dữ liệu
        $example = new exam();
        $example->name = $request->name;
        $example->description = $request->description;
        $example->image = $fileName; // Lưu tên file ảnh

        $example->save();

        return redirect()->route('admin.category.index')->with('Success', 'Thành công thêm vào sản phẩm');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
