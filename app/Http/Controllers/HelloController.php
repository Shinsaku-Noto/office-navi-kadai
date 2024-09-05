<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfficeRequest;
use App\Models\Memo;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HelloController extends Controller
{
    private $office, $memo;
    public function __construct(Office $office, Memo $memo)
    {
        $this->memo = $memo;
        $this->office = $office;
    }

    public function index(){
        // $offices = $this->office->all();
        $offices = $this->office->getOffice();
        $deleted_offices = $this->office->getDeletedOffices();


        return view('hello')
                ->with('offices', $offices)
                ->with('deleted_offices', $deleted_offices);
    }

    public function store_html(OfficeRequest $request){
        // store data in database
        $this->office->name = $request->name;
        $this->office->address = $request->address;
        if($request->post_code){
            $this->office->post_code = $request->post_code;
        }
        $this->office->stair = $request->stair;
        if($request->comment){
            $this->office->comment = $request->comment;
        }
        $this->office->save();

        return redirect()->route('home');
    }

    public function store_ajax(OfficeRequest $request){

        $this->office->name = $request->name;
        $this->office->address = $request->address;
        if($request->post_code){
            $this->office->post_code = $request->post_code;
        }else{
            $request->merge(['post_code' => ""]);
        }
        $this->office->stair = $request->stair;
        if($request->comment){
            $this->office->comment = $request->comment;
        }else{
            $request->merge(['comment' => "お問い合わせください"]);
        }
        $this->office->save();


        return response()->json($request);
    }

    public function edit($id){
        $office = $this->office->findOrFail($id);

        return view('edit')
                ->with('office', $office);
    }

    public function update($id, OfficeRequest $request){

        // transaction start
        DB::beginTransaction();

        try {
            $office = $this->office->findOrFail($id);

            $office->name = $request->name;
            $office->address = $request->address;
            if($request->post_code){
                $office->post_code = $request->post_code;
            }
            $office->stair = $request->stair;
            if($request->comment){
                $office->comment = $request->comment;
            }
            $office->save();

            // commit transaction
            DB::commit();

            $offices = $this->office->getOffice();

            return redirect()->route('home')
                    ->with('offices', $offices);


        } catch (\Exception $e) {
            // rollback transaction if error occurred
            DB::rollback();

            $offices = $this->office->getOffice();

            return redirect()->route('home')
                        ->with('error', 'Error occurred while updating office.')
                        ->with('offices', $offices);
        }
    }

    public function destroy($id)
    {
        $office = $this->office->findOrFail($id);
        $office->delete();

        $offices = $this->office->getOffice();

        return redirect()->route('home')
                    ->with('success', 'オフィスが削除されました。')
                    ->with('offices', $offices);
    }

    public function restore($id)
    {
        $office = Office::onlyTrashed()->findOrFail($id);
        $office->restore(); 

        $offices = $this->office->getOffice();

        return redirect()->route('home')
                    ->with('success', 'オフィスが復元されました。')
                    ->with('offices', $offices);
    }

    public function store_memo($id, Request $request)
    {
        $this->memo->office_id = $id;
        $this->memo->text = $request->memo;
        $this->memo->save();

        return redirect()->back();
    }

    public function login_index(){
        return view('login');
    }

    public function login_action(Request $request){
        return view('actions.login');
    }

    public function register_index(){
        return view('register');
    }

    public function register_action(Request $request){
        return view('actions.register');
    }
}
