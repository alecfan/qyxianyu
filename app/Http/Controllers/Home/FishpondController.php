<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Fish;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class FishpondController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }
    public function fishlist(Request $request)
    {

        $data = Fish::where('fishpondname','like','%'.$request['keywords'].'%')->paginate(8);
        $keyword = $request->input('keywords');
         return view('home.fish.fishlist',compact('data','keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.fish.address');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $uid='21';
     session(['uid'=>$uid]);
      $data = $request->except(['_token']);
         $rule = [
            'fishpondname'  =>'required',
            'synopsis'      =>'required',
            'saatus'        =>'required',
        ];
        $mess = [
           
            'fishpondname.required'     =>'请写入网站描述',
            'synopsis.required'          =>'请输入网站地址',
            'saatus.required'          =>'请填写备案号信息',
        ];
        $validator = Validator::make($data,$rule,$mess);

       if($validator->fails()){
            return back() -> withErrors($validator) -> withInput();
        }

        $file = $request -> file('face');
        $enev = $file->getClientOriginalExtension();   //上传文件的后缀名
    
        $newName = 'lb_'.date('YmdHis').mt_rand(1000,9999).'.'.$enev;    //设置文件名称 
     
        $path = $file->move(public_path().'/uploads/',$newName);     // 移动文件

        $filepath = '/uploads/'.$newName; 
        $data['face'] = $filepath;
 
  
        $data['uid'] = session('uid');
        // 如果没有图片上传就直接添加
        $res = Fish::create($data);
        if($res){
            return redirect('home/person');
        }else{
            return back()->with('errors','鱼塘添加失败');
        }
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
