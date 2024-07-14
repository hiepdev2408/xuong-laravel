<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catelogue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    const PATH_VIEW = 'admin.catalogues.';
    const PATH_UPLOAD = 'catalogues';
    public function index()
    {
        // $data = Catelogue::query()->latest('id')->paginate(5);
        $data = Catelogue::query()->latest('id')->get();

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('cover');

        // Khởi tạo 1 biến data kiểm tra xem request đưa tất cả các dư liệu vào chưa
        $data['is_active'] ??= 0;
        // Kiểm tra dữ liệu đầu vào của is_active nếu mà có sẽ hiển thị còn ko thì nó sẽ có giá trị là 0


        if($request->hasFile('cover')){
            $data['cover'] = Storage::put(self::PATH_UPLOAD, $request->file('cover'));
        }

        Catelogue::query()->create($data);

        return redirect()->route('admin.catalogues.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Catelogue::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__ , compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Catelogue::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Catelogue::query()->findOrFail($id);

        $data = $request->except('cover');
        $data['is_active'] ??= 0;

        if($request->hasFile('cover')){
            $data['cover'] = Storage::put(self::PATH_UPLOAD, $request->file('cover'));
        }

        $currentCover = $update->cover;

        $update->update($data);

        if($request->hasFile('cover') && $currentCover && Storage::exists('cover')){
            Storage::delete($currentCover);
        }

        return back();

//        $model = Catelogue::query()->findOrFail($id);
//
//        $data = $request->except('cover');
//        $data['is_active'] ??= 0;
//
//        if($request->hasFile('cover')){
//            $data['cover'] = Storage::put(self::PATH_UPLOAD, $request->file('cover'));
//        }
//
//        $currentCover = $model->cover;
//        // Thực hiện load lại ảnh sau khi cập nhật
//        $model->update($data);
//
//        if($request->hasFile('cover') && $currentCover && Storage::exists($currentCover)){
//            // Vế thứ nhật là phải có giá trị
//            // Vế thứ 2 phải tồn tại trong csdl
//            Storage::delete($currentCover);
//            // Xong thực hiện xóa ảnh cũ nếu có upload
//        }
//
//        return back();

        /////////////// Cách 2
        // $model = Catelogue::query()->findOrFail($id);

        // // Lấy toàn bộ dữ liệu từ request, ngoại trừ trường 'cover'
        // $data = $request->except('cover');

        // // Bổ sung mặc định cho trường 'is_active' nếu không có giá trị từ request
        // $data['is_active'] ??= 0;

        // // Kiểm tra xem có file 'cover' được gửi lên trong request hay không
        // if ($request->hasFile('cover')) {
        //     // Lưu trữ đường dẫn ảnh hiện tại của danh mục sản phẩm
        //     $currentCover = $model->cover;

        //     // Lưu file 'cover' mới vào storage và cập nhật đường dẫn vào database
        //     $data['cover'] = $request->file('cover')->store('public/covers');

        //     // Xóa file ảnh cũ nếu tồn tại và không phải là file mặc định
        //     if ($currentCover && $currentCover !== 'default.jpg' && Storage::exists($currentCover)) {
        //         Storage::delete($currentCover);
        //     }
        // }

        // // Cập nhật thông tin của danh mục sản phẩm vào database
        // $model->update($data);

        // // Chuyển hướng quay lại trang danh sách danh mục sản phẩm
        // return redirect()->route('admin.catalogues.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = Catelogue::query()->findOrFail($id);

        $model->delete();

        if($model->cover && Storage::exists($model->cover)){
            // Vế thứ nhật là phải có giá trị
            // Vế thứ 2 phải tồn tại trong csdl
            Storage::delete($model->cover);

        }
        return back();
    }


}
