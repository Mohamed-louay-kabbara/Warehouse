<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Matters;
use App\Models\Inputs;
use App\Models\Bills;
class InputsController extends Controller
{
  public function index()
  {
    $Bills=Bills::all();
    $Inputs=Inputs::all();
    $matters=Matters::all();
    return view('Inputs.inputs',compact('Inputs','matters','Bills'));
  }
  public function create()
  {

  }
  
  public function store(Request $request)
  {		
    DB::table('input')->insert(['user_name'=>$request->user_name,
  'Entry_type'=>$request->Entry_type,
  'matter_id'=>$request->matter_id,
  'Count'=>$request->Count,
  'created_date'=>$request->created_date,
   'Bill_id'=>$request->Bill_id
   ]);
 $count=DB::table('Matter')->where('id',$request->matter_id)->first();
  DB::table('Matter')->where('id',$request->matter_id)->update(['Count'=>$request->Count+$count->Count,]);
   return redirect()->route('inputs.index');
  }

  public function show($id)
  {
    return view('Inputs.add_input',compact('id'));
  }
  public function show_matters()
  {
    $category=DB::table('category')->get();
    $matters=Matters::all();
    return view('Inputs.matter',compact('matters','category'));
  }

  public function edit($id)
  {
    $Input= Inputs::find($id);
    return view('Inputs.edit',compact('Input'));
  }

  public function update($id,Request $request)
  {
    $input= DB::table('input')->where('id',$id)->first();
    DB::table('input')->where('id',$id)->update(['user_name'=>$request->user_name,
    'Count'=>$request->Count,
    'matter_id'=>$request->matter_id,
    'Entry_type'=>$request->Entry_type,
     'created_date'=>$request->created_date  
      ]);
    $count=DB::table('Matter')->where('id',$request->matter_id)->first();
    if($input->Count!=$request->Count){
    DB::table('Matter')->where('id',$request->matter_id)->update(['Count'=>$request->Count+$count->Count]);}
    return redirect()->route('inputs.index');
  }

  public function destroy($id)
  {
    $matter=DB::table('input')->where('id',$id)->delete();
    return back();
  }

}

?>