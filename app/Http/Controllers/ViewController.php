<?php
namespace App\Http\Controllers;

use App\Helpers\GeneralHelper;
use App\Models\Customers;
use App\Models\User;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class ViewController extends Controller {

    public function index(){

        return view('home');

    }

    public function viewNewCustomers(){

        return view('new_customer');

    }

}
