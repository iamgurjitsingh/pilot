<?php

namespace App\Http\Controllers;
use App\Models\Register;
use Illuminate\Http\Request;

/**
 * Class RegisterController
 * @package App\Http\Controllers
 */
class RegisterController extends Controller
{
    /**
     * @var Register
     */
    public $register;

    public $request;

    /**
     * @var array[]
     */
    public $countryCodes = ['DE', 'US', 'UK', 'ES', 'MX', 'AT', 'FR'];

    /**
     * RegisterController constructor.
     * @param Register $register
     */
    public function __construct(Register $register, Request $request)
    {
        $this->register = $register;
        $this->request = $request;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $registrations = Register::all();
        return response()->json($registrations);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id){
        $registration = Register::find($id);
        return response()->json($registration);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'country_code' => 'required',
            'name' => 'required',
            'street' => 'required',
            'street_no' => 'required',
            'zip_code' => 'required',
            'city' => 'required|alpha'
        ]);

        try {
            $register = new Register();
            $register->country_code = $request->country_code;
            $register->name    = $request->name;
            $register->company = $request->company;
            $register->street = $request->street;
            $register->street_no = $request->street_no;
            $register->zip_code = $request->zip_code;
            $register->city = $request->city;

            if ($register->save()) {
                return response()->json(['status' => 'success', 'message' => 'Record created successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $register = Register::findOrFail($id);
            $register->country_code = $request->country_code;
            $register->name    = $request->name;
            $register->company = $request->company;
            $register->street = $request->street;
            $register->street_no = $request->street_no;
            $register->zip_code = $request->zip_code;
            $register->city = $request->city;

            if ($register->save()) {
                return response()->json(['status' => 'success', 'message' => 'Record updated successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $register = Register::findOrFail($id);

            if ($register->delete()) {
                return response()->json(['status' => 'success', 'message' => 'Record deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * @return \Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function list() {
        $registrations = Register::all();
        return view('register.list', ['registrations' => $registrations]);
    }

    /**
     * @return \Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function create() {

        return view('register.create',  ['countryCodes' => $this->countryCodes]);
    }

    /**
     * @param $id
     * @return \Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function edit($id) {
        $register = Register::findOrFail($id);
        return view('register.edit', ['register' => $register, 'countryCodes' => $this->countryCodes]);
    }

    public function customerResgitration(){
        return view('register.registration',  ['countryCodes' => $this->countryCodes]);
    }
}
