<?php

namespace App\Http\Controllers;

use App\Info;
use App\InfoList;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    use StorageImageTrait;
    protected $info;
    protected $infoList;

    public function __construct(Info $info, InfoList $infoList)
    {
        $this->info=$info;
        $this->infoList=$infoList;
    }

    public function index(){
        $infor = $this->info->all()->first();
        $list=$this->infoList->all();
        return view('info.index',compact('infor','list'));
    }

    public function upload(Request $request)
    {
        $infor = $this->info->all()->first();
        if (empty($infor)) {
            $field = [
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'working_hour' => $request->working_hour,
                'dkkd' => $request->dkkd,
                'enterprise_addr'=>$request->enterprise_addr
            ];
            if ($request->hasFile('logo')) {
                $data = $this->storageTraitUpload($request, 'logo', 'infor');
                $field['logo'] = $data['file_path'];
            }
            $infor = $this->info->create($field);

        } else {
            $field = [
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'working_hour' => $request->working_hour,
                'dkkd' => $request->dkkd,
                'enterprise_addr'=>$request->enterprise_addr
            ];
            if ($request->hasFile('logo')) {
                $data = $this->storageTraitUpload($request, 'logo', 'infor');
                $field['logo'] = $data['file_path'];
            }
            $infor->update($field);

        }
        if(!empty($request->titles)){
            $this->infoList->truncate();
            for($i=0;$i<count($request->titles);$i++){
                $this->infoList->create([
                    'title'=>$request->titles[$i],
                    'link'=>$request->links[$i],
                    'title_eng'=>$request->title_engs[$i]
                ]);
            }
        }
        return back();
    }

}
