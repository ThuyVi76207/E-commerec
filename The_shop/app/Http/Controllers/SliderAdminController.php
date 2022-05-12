<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SliderAddRequest;
use App\Models\Slider;
use Storage;
use DB;
class SliderAdminController extends Controller
{
    private $slider;
    public function __construct(Slider $slider){
        $this->slider = $slider;
    }
    public function index() {
        $sliders = $this->slider->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create() {
        return view('admin.slider.add');
    }

    public function store(SliderAddRequest $request) { 

        try { 
            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description
            ];
    
            if($request->hasFile('image_path'))
            {
                $file = $request->image_path;
                $fileName = $file->getClientOriginalName();
                $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
                $path = $request->file('image_path')->storeAs('public/slider/' . auth()->id(), $fileNameHash);
                $dataInsert['image_name'] = $fileName;
                $dataInsert['image_path'] = Storage::url($path);
            }
            $this->slider->create($dataInsert);
            return redirect()->route('slider.index');

        } catch (\Exception $exception) {
            DB::rollback();
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $slider = $this->slider->find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        try { 
            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description
            ];
    
            if($request->hasFile('image_path'))
            {
                $file = $request->image_path;
                $fileName = $file->getClientOriginalName();
                $fileNameHash = str_random(20) . '.' . $file->getClientOriginalExtension();
                $path = $request->file('image_path')->storeAs('public/slider/' . auth()->id(), $fileNameHash);
                $dataUpdate['image_name'] = $fileName;
                $dataUpdate['image_path'] = Storage::url($path);
            }
            $this->slider->find($id)->update($dataUpdate);
            return redirect()->route('slider.index');

        } catch (\Exception $exception) {
            DB::rollback();
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        try {
            $this->slider->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);

        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . 'Line : ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }

}
