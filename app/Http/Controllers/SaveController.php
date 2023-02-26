<?php
namespace App\Http\Controllers;

use App\Helpers\GeneralHelper;
use App\Models\Customers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SaveController extends Controller {

    public function saveCustomer(Request $request){

        $data = $request->all();

        Log::info("Data request");
        Log::info($data);

        try{
            $customer = new Customers();
            $customer->name = $data["name"];
            $customer->cpf = $data["cpf"];
            $customer->gender = $data["gender"];
            $customer->birthdate = $data["birthdate"];
            $customer->address_street = $data["address"];
            $customer->city = $data["city"];
            $customer->state = $data["state"];
            $customer->save();
        }catch (\Exception $e){

            Log::info($e);

            return response(["error" => true,"message" => "Verifique os dados e tente novamente", "general_message" => $e->getMessage()], 400)
                ->header('Content-Type', 'application/json');
        }

        return response(["error" => false,"message" => "Customer criado"], 200)
            ->header('Content-Type', 'application/json');
    }

    public function editCustomer(Request $request){

        $data = $request->all();

        try{
            $customer = Customers::find($data["id"]);
            $customer->name = $data["name"];
            $customer->cpf = $data["cpf"];
            $customer->gender = $data["gender"];
            $customer->birthdate = $data["birthdate"];
            $customer->address_street = $data["address"];
            $customer->city = $data["city"];
            $customer->state = $data["state"];
            $customer->save();
        }catch (\Exception $e){

            Log::info($e);

            return response(["error" => true,"message" => "Verifique os dados e tente novamente", "general_message" => $e->getMessage()], 400)
                ->header('Content-Type', 'application/json');
        }

        return response(["error" => false,"message" => "Customer Editado"], 200)
            ->header('Content-Type', 'application/json');

    }


    public function deleteCustomer(Request $request, $id){

//        $data = $request->all();

        try{
            $customer = Customers::find($id);
            $customer->delete();
        }catch (\Exception $e){

            Log::info($e);

            return response(["error" => true,"message" => "Verifique os dados e tente novamente", "general_message" => $e->getMessage()], 400)
                ->header('Content-Type', 'application/json');
        }

        return response(["error" => false,"message" => "Customer deletado"], 200)
            ->header('Content-Type', 'application/json');

    }


}
