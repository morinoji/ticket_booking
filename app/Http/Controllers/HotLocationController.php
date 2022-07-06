<?php

namespace App\Http\Controllers;

use App\Models\HotLocation;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HotLocationController extends Controller
{
    use StorageImageTrait;

    private $sliders;

    public function __construct(HotLocation $sliders)
    {
        $this->sliders = $sliders;
    }

    public function index()
    {
        $query = $this->sliders;
        if (isset($_GET['query']) && !empty($_GET['query'])) {
            $query = $query->where('name', 'LIKE', "%{$_GET['query']}%");
        }
        $sliders = $query->latest()->paginate(10)->appends(request()->query());
        return view('hot_location.index', compact('sliders'));
    }

    public function create()
    {
        return view('hot_location.add');
    }

    public function upload(Request $request)
    {
        $dataCreate = [
            'location_name' => $request->name,
            'area'=>$request->area
        ];
        $data = $this->storageTraitUpload($request, 'image', 'hotLocation');
        if (!empty($data)) {
            $dataCreate['image'] = $data['file_path'];
        } else {
            $dataCreate['image'] = '';
        }
        $slider = $this->sliders->create($dataCreate);
        return redirect()->route('hotloc.index');
    }

    public function find($id)
    {
        $slider = $this->sliders->find($id);
        return view('hot_location.edit', compact('slider'));
    }

    public function edit($id, Request $request)
    {
        $dataCreate = [
            'location_name' => $request->name,
            'area'=>$request->area
        ];

        $data = $this->storageTraitUpload($request, 'image', 'hotLocation');
        if (!empty($data)) {
            $dataCreate['image'] = $data['file_path'];
        }
        $this->sliders->find($id)->update($dataCreate);
        return back();
    }

    public function delete($id)
    {
        try {
            $this->sliders->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $ex) {
            Log::error($ex->getMessage() . '----------' . $ex->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
}
