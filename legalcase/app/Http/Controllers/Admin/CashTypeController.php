<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CaseType;
use App\Model\CourtCase;
use Validator;
use App\Traits\DatatablTrait;
use Session;
use DB;
// use App\Helpers\LogActivity;

class CashTypeController extends Controller
{
        use DatatablTrait;
	public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = \Auth::guard('admin')->user();  
        if(! $user->can('case_type_list')){
            abort(403, 'Unauthorized action.');
        }
        

        return view('admin.settings.case-type.casetype');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['caseTypes'] = CaseType::where('parent_id',0)
		            ->orderBy('created_at','desc')->get();
                return response()->json([
                    'html' =>  view('admin.settings.case-type.casetype_create',$data)->render()
                ]);
    }

    public function cashTypeList(Request $request) {

         $user = \Auth::guard('admin')->user();  
         $isEdit=$user->can('case_type_edit');
         $isDelete=$user->can('case_type_delete');

      
              // Listing column to show
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'parent_category',
            3 => 'is_active',
        );


        $totalData = DB::table('case_types AS c')
                         ->leftJoin('case_types AS s', 'c.parent_id', '=', 's.id')
                         ->select('c.id AS id', 'c.advocate_id AS advocate_id','c.case_type_name AS name', 's.case_type_name AS parent_category','c.is_active AS status')
                        ->count();

        $totalRec = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');


        $customcollections = DB::table('case_types AS c')
                        ->leftJoin('case_types AS s', 'c.parent_id', '=', 's.id')
                        ->select('c.id AS id','c.advocate_id AS advocate_id', 'c.case_type_name AS name', 's.case_type_name AS parent_category','c.is_active AS is_active')
                        ->when($search, function ($query, $search) {
                            return $query->where('c.case_type_name', 'LIKE', "%{$search}%")
                                         ->orWhere('s.case_type_name', 'LIKE', "%{$search}%");
                        });


                       





        // dd($totalData);

        $totalFiltered = $customcollections->count();

        $customcollections = $customcollections->offset($start)->limit($limit)->orderBy($order, $dir)->get();

        $data = [];

        foreach ($customcollections as $key => $item) {

            // $row['id'] = $item->id;


            if (empty($request->input('search.value'))) {
                    $final = $totalRec-$start;
                    $row['id'] = $final;
                    $totalRec--;
                }else{
                    $start++;
                    $row['id'] = $start;
                }


            if($item->parent_category == ''){
                $row['parent'] = $item->name;
                $row['chield'] = "";
               }
               else
               {
                $row['parent'] = $item->parent_category;
                $row['chield'] = $item->name;
               }


        if($isEdit=="1"){

            $row['is_active'] = $this->status($item->is_active,$item->id , route('cash.type.casetype.status'));
        }else{
            $row['is_active']=[];
        }




            if($isEdit=="1" || $isDelete=="1"){

            $row['action'] = $this->action([
                'edit_modal' => collect([
                    'id' => $item->id,
                    'action' => route('case-type.edit', $item->id),
                    'target' => '#addtag'
                ]),
                'edit_permission' => $isEdit,
                'delete' => collect([
                    'id' => $item->id,
                    'action' => route('case-type.destroy', $item->id)
                ]),
                 'delete_permission' => $isDelete,
            ]);
        }else{

              $row['action'] = [];

            }

            $data[] = $row;

        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );

        return response()->json($json_data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'case_type_name'   => 'required',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        
        $casetype = new CaseType();
        
        $casetype->advocate_id     = "1";
        $casetype->parent_id       = (isset($request->case_type) && $request->case_type!='')?$request->case_type:0;
        $casetype->case_type_name  = $request->case_type_name;
        $casetype->save();

        return response()->json([
            'success' => true,
            'message' => 'Case Type added successfully',

        ],200);

        
     
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

         $data['caseTypes'] = CaseType::where('parent_id',0)->orderBy('created_at','desc')->get();
         $data['caseType']= CaseType::findorfail($id);

         return response()->json([
                    'html' =>  view('admin.settings.case-type.casetype_edit',$data)->render()
                ]);
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
        $validator = Validator::make($request->all(), [
            'case_type_name'   => 'required',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }
        
        $casetype = CaseType::findorfail($id);
        
        $casetype->case_type_name  = $request->case_type_name;
        $casetype->parent_id       = (isset($request->case_type) && $request->case_type!='')?$request->case_type:0;
        $casetype->save();


           return response()->json([
            'success' => true,
            'message' => 'Case Type added successfully',

        ],200);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

         public function changeStatus(Request $request) {
            // dd($request->all());
       
       $statuscode = 400;
       $data = CaseType::findOrFail($request->id);
       $data->is_active  = $request->status == 'true' ? 'Yes' : 'No' ;
        
        if($data->save()) {
            $statuscode = 200 ;
        }
        $status = $request->status == 'Yes' ? 'Yes' : 'No' ;
        $message = 'Case Type status changed successfully.' ;

        return response()->json([
            'success' => true ,
            'message' => $message
        ],$statuscode);

    }

    public function destroy($id)
    {
        $count = 0;
        $count+=CourtCase::where('case_types',$id)->count();
        $count+=CaseType::where('parent_id',$id)->count();

        if($count==0){
        $row = CaseType::destroy($id);

          return response()->json([
                       'success' => true ,
                       'message' => 'Case Type deleted successfully.'
                       ],200);

        }else{

                  return response()->json([
                       'error' => true ,
                       'errormessage' => 'You cant delete Case Type because it is use in other module.'
                       ],400);
        }
    }
    
}
