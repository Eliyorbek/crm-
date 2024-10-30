<?php

namespace App\Livewire\Boss\Product;

use App\Livewire\MyComponent;
use App\Models\Product;
use Livewire\WithPagination;
use App\Http\Requests\ProductRequest;
class ProductComponent extends MyComponent
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $title = 'Mahsulotlar';
    public $thead = [
        0=>'id',
        1=>'nomi',
        2=>'sotib olingan narx',
        3=>'sotuvdagi narx',
        4=>'chegirma narx',
        5=>'soni',
        6=>'rangi',
        7=>'status',
        8=>'tahrirlash',
    ];
    public $options = [
        0=>'id',
        1=>'nomi',
        2=>'sotib olingan narx',
        3=>'sotuvdagi narx',
        4=>'chegirma narx',
        5=>'soni',
        6=>'rangi',
        7=>'status',
    ];


    public $name , $id,$qr_code,$status,$price,$imei_1,$imei_2,$description,$sale_price,$discount_price,$category,$brend,$count,$color,$search;

    public $sale = 0,$sprice , $percentage=0;

    protected $rules = [
            'name'=>'required',
            'price'=>'required',
            'count'=>'required',
            'imei_1'=>'required',
        ];

    public function saleWindow($id){
        $product = Product::find($id);
        $this->sale=1;
        $this->show=1;
        $this->price = $product->price;

    }


    public function updateWindow($id){
        $product = Product::find($id);
        $this->updateOpen();
        $this->id=$id;
        $this->name=$product->name;
        $this->price=$product->price;
        $this->count=$product->count;
        $this->imei_1=$product->qr_code['imei_1'];
        $this->imei_2=$product->qr_code['imei_2'];
        $this->description=$product->description;
        $this->category=$product->category_id;
        $this->brend=$product->brend_id;
        $this->status=$product->status;
    }

    public function showWindow($id){
        $product = Product::find($id);
        $this->viewOpen();
        $this->name=$product->name;
        $this->id=$id;
        $this->price=$product->price;
        $this->count=$product->count;
        $this->imei_1=$product->qr_code['imei_1'];
        $this->imei_2=$product->qr_code['imei_2'];
        $this->description=$product->description;
        $this->category=$product->category->name;
        $this->brend=$product->brend->name;
        $this->status=$product->status;
        $this->color=$product->color;
        $this->sale_price=$product->sale_price;
        $this->discount_price=$product->discount_price;
    }

    public function statusEdit($id){
        $product = Product::find($id);
        if($product->status == 'active'){
            $product->status = 'inactive';
        }else{
            $product->status = 'active';
        }
        $product->update([
            'status'=>$product->status,
        ]);
    }
 public function deleteWin($id){
        $this->id = $id;
        $this->deleteOpen();
 }

    public function deleteOne($id){
        Product::destroy($id);
        return redirect()->route('product.index')->with('delete','Product has been deleted');
    }

    public function render()
    {
        if($this->search != null){
            $models = Product::where('name','like','%'.$this->search.'%')
            ->orWhere('price','like','%'.$this->search.'%')
            ->orWhere('count','like','%'.$this->search.'%')
            ->orWhereHas('category',function($q){
                $q->where('name','like','%'.$this->search.'%');
            })
            ->orWhereHas('brend',function($q){
                $q->where('name','like','%'.$this->search.'%');
            })
                ->paginate(20);
        }else{
            $models = Product::paginate(20);
        }

        return view('livewire.boss.product.product-component' , compact('models'));
    }
}
