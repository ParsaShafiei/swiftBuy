<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\StoreBrandRequest;
use App\Http\Requests\Admin\Market\UpdateBrandRequest;
use App\Models\Market\Brand;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::paginate(10);
        return view('admin.market.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.market.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request, ImageUploadService $ImageUploadService)
    {
        // dd('hi');
        $inputs = $request->validated();
        if ($request->hasFile('logo')) {
            $result = $ImageUploadService->uploadImage($request->file('logo', 'logo'));
            if ($result === false) {
                return back()->with('swall-error', 'خطا در آپلود فایل');
            }
            $inputs['logo'] = $result;
        }
        $brand = Brand::create($inputs);
        return to_route('admin.market.brand.index')->with('swal-success', 'برند با موفقیت ساخته شد');
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
    public function edit(Brand $brand)
    {
        return view('admin.market.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand, ImageUploadService $ImageUploadService)
    {
        $inputs = $request->validated();
        if ($request->hasFile('logo')) {
            $result = $ImageUploadService->uploadImage($request->file('logo', 'logo'));
            if ($result === false) {
                return back()->with('swall-error', 'خطا در آپلود فایل');
            }
            $inputs['logo'] = $result;
        }

        $brand->update($inputs);
        return to_route('admin.market.brand.index')->with('swal-success', 'برند با موفقیت آپدیت شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return back()->with('swal-success', 'برند با موفقیت حذف شد');
    }
}
