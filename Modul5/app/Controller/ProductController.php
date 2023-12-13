<?php

namespace app\Controller;

include "app/Traits/ApiResponseFormatter.php";
include "app/Models/Product.php";

use app\Models\Product;
use app\Traits\ApiResponseFormatter;

class ProductController
{
    // PAKAI TRAIT YANG SUDAN DIBUAT
    use ApiResponseFormatter;

    public function index()
    {
        // DEFINISIKAN OBJECT MODEL PRODUCT YANG SUDAH DIBUAT
        $productModel = new Product();
        // PANGGIL FUNGI GET ALL PRODUCT
        $response = $productModel -> findAll();
        // RETURN $response DENGAN MELAKUKAN FORMATTING TERLEBIH DAMULU MENGGUNAKAN TRAIT YANG SUDAH DIPANGGTL
        return $this->apiResponse(200, "success", $response);
    }

    public function getById($id)
    {
        $productModel = new Product();
        $response = $productModel -> findById($id);
        return $this->apiResponse(200, "success", $response);
    }

    public function insert()
    {
        // TANGKAP INPUT JSON
        $jsonInput = file_get_contents( 'php://input');
        $inputData = json_decode($jsonInput, true);
        // VALIDASI APAKAH INPUT VALID
        if (json_last_error()) {
            return $this->apiResponse(400, "error invalid input", null);
        }
        // LANJUT JIKA TIDAK ERROR
        $productModel = new Product();
        $response = $productModel -> create([
            "product_nane" => $inputData ['product_name']
        ]);

    return $this->apiRespanse(200, "success", $response);
    }
    
    public function update($id)
    {
        // TANGKAP INPUT JSON
        $jsonInput = file_get_contents('php://input'); 
        $inputData = json_decode($jsonInput, true);
        // VALIDASI APAKAH INPUT VALID
        if (json_last_error()) {
            return $this->apiResponse(400, "error invalid input", null);
        }
        
        // LANJUT JIKA TIDAK ERROR
        $productModel = new Product();
        $response = $productModel->update([
            "product_name" => $inputData['product_name']
        ], $id);
        
        return $this->apiResponse(200, "success", $response);
    }
    
    public function delete($id)
    {
        
        $productModel = new Product();
        $response = $productModel→destroy($id);

        return $this->apiResponse(200, "success", $response);
    }

}