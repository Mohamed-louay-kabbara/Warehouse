<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Matters;
class MattersController extends Controller
{
  public function index()
  {
    $category=DB::table('category')->get();
    $matters=Matters::all();
    return view('matter.matter',compact('matters','category'));
  }

  public function create()
  {
    $category=DB::table('category')->get();
    return view('matter.add',compact('category'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'Nmae' => 'required|unique:Matter',
      'Count' => 'required|numeric|gt:0',
      'Notes' => 'required',
      'number'=>'required|numeric|gt:0',
      'CategoryId'=>'required'
  ],  [
    'Count.required' => 'تم أدخال العدد بطريقة خاطئة',
    'Nmae.required' => ' أن الأسم المطلوب'
]

);
    DB::table('matter')->insert([
        'Nmae'=>$request->Nmae,
        'Count'=>$request->Count,
        'Notes'=>$request->Notes,
        'number'=>$request->number,
        'CategoryId'=>$request->CategoryId ]);
    return redirect()->route('matters.index');
  }
  public function show($id)
  {

  }
  public function search_name_category(Request $request)
  {
   $category= DB::table('category')->get();
       $filter = Matters::where('CategoryId',$request->category)->get();
       if ($filter->count()) {
           return view('matter.matter', [App\Http\Controllers\MedicationController::class, 'index'])->with([
               'matters' => $filter,
               'category'=> $category,
           ]);
       }
       else{return view('matter.matter', [App\Http\Controllers\MedicationController::class, 'index'])->with([
           'matters' => $filter,
           'category'=> $category,
       ]);;
   }
  }

  public function edit($id)
  {
    $category=DB::table('category')->get();
    $matters= Matters::find($id);
    return view('matter.edit',compact('matters','category'));
  }
  public function update($id,Request $request)
  {
    DB::table('Matter')->where('id',$id)->update(['Nmae'=>$request->Name,
        'Count'=>$request->Count,
        'Notes'=>$request->Notes,
         'CategoryId'=>$request->CategoryId
    ]);
    return redirect()->route('matters.index');
  }
  public function destroy($id)
  {
    $matter=DB::table('matter')->where('id',$id)->delete();
    return back();
  }
}
?>
