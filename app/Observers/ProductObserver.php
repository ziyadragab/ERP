<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    public function created(Product $product)
    {
        // Generate a random product code
        $productCode = $this->generateUniqueProductCode();

        // Update the product record with the generated product code
        $product->update(['par_code' => $productCode]);
    }

    protected function generateUniqueProductCode()
    {
        // Generate a random 10-digit number
        $number = mt_rand(1000000000, 9999999999);

        // Check if the generated number already exists as a product code
        while ($this->productCodeExists($number)) {
            $number = mt_rand(1000000000, 9999999999);
        }

        return $number;
    }

    protected function productCodeExists($number)
    {
        // Check if a product with the given product code already exists
        return Product::where('par_code', $number)->exists();
    }
}
