<?php

namespace App\Exports;

use App\Models\Invoice;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InvoiceExport implements FromCollection, ShouldAutoSize, WithHeadings
{

    private $product;
    private $combo;
    private $trading;
    private $start;
    private $end;

    public function __construct($product, $combo, $trading, $start, $end)
    {
        $this->product = $product;
        $this->combo = $combo;
        $this->trading = $trading;
        $this->start = $start;
        $this->end = $end;
    }

    public function collection()
    {
        $query = Invoice::query();

        if (isset($this->product) && !empty($this->product)) {
            $productsSelected = explode(",",$this->product);

            $query = $query->where(function ($query) use ($productsSelected){
                foreach ( $productsSelected as $productsSelectedItem){
                    $query->orWhereJsonContains('product_ids' , ['product_id' => strval($productsSelectedItem)]);
                }
            });
        }

        if (isset($this->combo) && !empty($this->combo)) {
            $combosSelected = explode(",",$this->combo);

            $query = $query->where(function ($query) use ($combosSelected){
                foreach ( $combosSelected as $combosSelectedItem){
                    $query->orWhereJsonContains('product_ids' , ['combo_product_id' => strval($combosSelectedItem)]);
                }
            });

        }

        if (isset($this->trading) && !empty($this->trading)) {
            $tradingsSelected = explode(",",$this->trading);

            $query = $query->where(function ($query) use ($tradingsSelected){
                foreach ( $tradingsSelected as $tradingsSelectedItem){
                    $query->orWhereJsonContains('product_ids' , ['trading_id' => "5"]);
                }
            });
        }

        if(isset($this->start) && !empty($this->start)){
            $query = $query->whereDate('created_at', '>=' , $this->start);
        }

        if(isset($this->end) && !empty($this->end)){
            $query = $query->whereDate('created_at', '<=' , $this->end);
        }

        return $query->latest()->get();
    }

    public function headings(): array
    {
        $headings = [
            ['ID', 'Ng??y t???o', 'Ng??y c???p nh???p', 'M?? kh??ch h??ng', 'T???ng ti???n', 'M?? ki???u thanh to??n', 'M?? nh??n vi??n thu', 'M?? SVX', 'N???i dung h??a ????n', 'T???ng ti???n SVX']
        ];

        return $headings;
    }

}
