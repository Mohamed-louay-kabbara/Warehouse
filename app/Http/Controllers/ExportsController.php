<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exports;
use App\Models\Matters;
use Illuminate\Support\Facades\DB;

class ExportsController extends Controller
{

  public function index()
  {
    $matters=DB::table('matter')->get();
   $Exports= Exports::all();
   return view('Exports.Exports',compact('Exports','matters'));
  }
  public function create()
  {
      $category=DB::table('category')->get();
      $matters=Matters::all();
      return view('Exports.matter',compact('matters','category'));
  }


  public function store(Request $request)
  {

    $count=DB::table('Matter')->where('id',$request->matter_id)->first();
    if($request->ex_count<=$count->Count) {
    DB::table('export')->insert(['ex_count'=>$request->ex_count,
    'opration_type'=>$request->opration_type,
    'matter_id'=>$request->matter_id,
    'ex_date'=>$request->ex_date,

      ]);
    DB::table('Matter')->where('id',$request->matter_id)->update(['Count'=>$count->Count-$request->ex_count]);
     return redirect()->route('exports.index'); }
     return redirect()->back() ->with('alert', 'عدد المخرجات المطلوبة أكبر من الكمية الموجودة');
  }

  public function show($id)
  {
    return view('Exports.add_export',compact('id'));
  }

  public function edit($id)
  {
    $Export= Exports::find($id);
    return view('Exports.edit',compact('Export'));
  }

  public function update($id,Request $request)
  {
    $export= DB::table('export')->where('id',$id)->first();
    DB::table('export')->where('id',$id)->update([
    'ex_count'=>$request->ex_count,
    'opration_type'=>$request->opration_type,
    'ex_date'=>$request->ex_date]);
    $count=DB::table('Matter')->where('id',$request->matter_id)->first();
    if($export->ex_count!=$request->ex_count){
    DB::table('Matter')->where('id',$request->matter_id)->update(['Count'=>$count->Count-$request->ex_count]);}
    return redirect()->route('exports.index');
  }
  public function destroy($id)
  {
    DB::table('export')->where('id',$id)->delete();
    return back();
  }

}
