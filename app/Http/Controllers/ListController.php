<?php
namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class ListController extends Controller {

    public function listCustomers(){

        $customers = Customers::select('id','name', 'cpf', "birthdate", "state", "city", "gender")->get();

        $customers_array = array();

        foreach ($customers as $customer){

            array_push($customers_array, [
                $customer->id,
                $customer->name,
                $customer->cpf,
                $customer->birthdate,
                $customer->state,
                $customer->city,
                $customer->gender
            ]);

        }

        return response($customers_array, 200)
            ->header('Content-Type', 'application/json');

    }

    public function searchCustomer(Request $request){

        $data = $request->all();
        Log::info("Pesquisa:");
        Log::info($data);

        if($data["cpf"] !== null && $data["name"] !== null && $data["birthdate"] !== null && $data["gender"] !== null && $data["state"] !== null && $data["city"] !== null) {
            $customers = Customers::select('id', 'name', 'cpf', "birthdate", "state", "city", "gender")
                ->where("cpf", "=", $data["cpf"])
                ->where("name", "like", "%{$data['name']}%")
                ->where("birthdate", "=", $data["birthdate"])
                ->where("gender", "=", $data["gender"])
                ->where("state", "=", $data["state"])
                ->where("city", "like", "%{$data['city']}%")
                ->get();
        }elseif($data["cpf"] !== null && $data["name"] !== null && $data["birthdate"] !== null && $data["gender"] !== null && $data["state"] !== null) {
            $customers = Customers::select('id', 'name', 'cpf', "birthdate", "state", "city", "gender")
                ->where("cpf", "=", $data["cpf"])
                ->where("name", "like", "%{$data['name']}%")
                ->where("birthdate", "=", $data["birthdate"])
                ->where("gender", "=", $data["gender"])
                ->where("state", "=", $data["state"])
                ->get();
        }elseif($data["cpf"] !== null && $data["name"] !== null && $data["birthdate"] !== null && $data["gender"] !== null) {
            $customers = Customers::select('id', 'name', 'cpf', "birthdate", "state", "city", "gender")
                ->where("cpf", "=", $data["cpf"])
                ->where("name", "like", "%{$data['name']}%")
                ->where("birthdate", "=", $data["birthdate"])
                ->where("gender", "=", $data["gender"])
                ->get();
        }elseif($data["cpf"] !== null && $data["name"] !== null && $data["birthdate"] !== null) {
            $customers = Customers::select('id', 'name', 'cpf', "birthdate", "state", "city", "gender")
                ->where("cpf", "=", $data["cpf"])
                ->where("name", "like", "%{$data['name']}%")
                ->where("birthdate", "=", $data["birthdate"])
                ->get();
        }elseif($data["cpf"] !== null && $data["name"] !== null ) {
            $customers = Customers::select('id', 'name', 'cpf', "birthdate", "state", "city", "gender")
                ->where("cpf", "=", $data["cpf"])
                ->where("name", "like", "%{$data['name']}%")
                ->get();
        }elseif($data["cpf"] !== null) {
            Log::info("Aqui");
            $customers = Customers::select('id', 'name', 'cpf', "birthdate", "state", "city", "gender")
                ->where("cpf", "=", $data["cpf"])
                ->get();
        }elseif($data["name"] !== null) {
            $customers = Customers::select('id', 'name', 'cpf', "birthdate", "state", "city", "gender")
                ->where("name", "like", "%{$data["name"]}%")
                ->get();
        }elseif($data["birthdate"] !== null) {
            $customers = Customers::select('id', 'name', 'cpf', "birthdate", "state", "city", "gender")
                ->where("birthdate", "=", $data["birthdate"])
                ->get();
        }elseif($data["state"] !== null) {
            $customers = Customers::select('id', 'name', 'cpf', "birthdate", "state", "city", "gender")
                ->where("state", "like", "%{$data["state"]}%")
                ->get();
        }elseif($data["city"] !== null) {
            $customers = Customers::select('id', 'name', 'cpf', "birthdate", "state", "city", "gender")
                ->where("city", "like", "%{$data["city"]}%")
                ->get();
        }elseif($data["gender"] !== null) {
            $customers = Customers::select('id', 'name', 'cpf', "birthdate", "state", "city", "gender")
                ->where("gender", "=", $data["gender"])
                ->get();
        }else{
            $customers = Customers::select('id', 'name', 'cpf', "birthdate", "state", "city", "gender")
                ->get();
        }

        Log::info("Search: ".count($customers));

        $customers_array = array();

        foreach ($customers as $customer){

            array_push($customers_array, $customer);

        }

        return response($customers_array, 200)
            ->header('Content-Type', 'application/json');

    }

}
