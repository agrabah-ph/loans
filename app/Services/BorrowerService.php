<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 3/5/2021
 * Time: 11:01 PM
 */

namespace App\Services;


use Illuminate\Http\Request;

class BorrowerService {
    public function __construct() {

    }

    public function setMessage($name) {
        return "Welcome {$name}!";
    }

    public function store_borrower_data(Request $request) {
        return $request;
    }
}
