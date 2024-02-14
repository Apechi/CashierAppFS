<?php

namespace App\Livewire\Transaction;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Menu;
use App\Models\Stock;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Type;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Mockery\Undefined;
use PHPUnit\TestRunner\TestResult\Collector;

class Index extends Component
{




    //Menu List
    public Collection $types;
    public Collection $produk;
    public $search;
    public $kategori_id = 0;
    public $type_id = 0;


    //Shopping Cart
    public $qty = 0;
    public $produk_detail = [];

    //Checkout
    public $total_price;
    public $no_faktur;
    public $tipe_pembayaran;
    public $keterangan_pembayaran;
    public $tanggal;
    public $total_bayar;
    public $customer_id;
    public $kembalian;


    public function setupCheckout()
    {

        $totalPrice = 0;

        foreach ($this->produk_detail as $produk) {
            $subTotal =  $produk['sub_total'];
            $totalPrice += $subTotal;
        }

        $this->total_price = $totalPrice;

        $no_faktur = IdGenerator::generate([
            'table' => 'transactions',
            'length' => 12,
            'prefix' => date('Ymd')
        ]);


        $this->no_faktur = $no_faktur;
    }


    public function checkout()
    {
        $rules = [
            'tanggal' => 'required|date',
            'total_price' => 'required|numeric',
            'tipe_pembayaran' => 'required|in:cash,debit',
            'keterangan_pembayaran' => 'required|string',
            'customer_id' => 'required|exists:customers,id',
        ];

        if ($this->tipe_pembayaran == 'cash') {
            $rules['total_bayar'] = 'required|numeric|min:' . $this->total_price;
        }

        $this->validate($rules);

        $transactionData = [
            'id' => $this->no_faktur,
            'date' => $this->tanggal,
            'total_price' => $this->total_price,
            'payment_method' => $this->tipe_pembayaran,
            'keterangan' => $this->keterangan_pembayaran,
            'customer_id' => $this->customer_id
        ];

        Transaction::create($transactionData);

        foreach ($this->produk_detail as $produk) {
            $subtractQty = $produk['qty'];

            Stock::where('menu_id', $produk['id'])->update([
                'quantity' => DB::raw("quantity - $subtractQty")
            ]);

            $transactionDetailData = [
                'menu_id' => $produk['id'],
                'transaction_id' => $this->no_faktur,
                'qty' => $produk['qty'],
                'unitPrice' => $produk['price'],
                'subTotal' => $produk['sub_total']
            ];

            TransactionDetail::create($transactionDetailData);
        }

        return redirect()->route('transaction.index')->with('success', 'Transaksi Berhasil');
    }




    public function kembalianGen()
    {

        if ($this->total_bayar >= $this->total_price) {
            $totalKembalian =    $this->total_bayar - $this->total_price;
            $this->kembalian = $totalKembalian;
        } else {
            $this->kembalian = 'Pembayaran Kurang!';
        }
    }

    public function mount()
    {
    }


    public function changeKategori($id)
    {
        $this->kategori_id = $id;
        $this->type_id = 0;
    }

    public function changeTipe($id)
    {
        $this->type_id = $id;
    }


    public function pilihMenu($id)
    {
        $menu = Menu::findOrFail($id);

        $stok = Stock::where('menu_id', $id)->first();

        if (!$stok || $stok->quantity <= 0) {
            session(["error" => "Maaf, Stok tidak tersedia"]);
            return;
        }

        $produkIds = collect($this->produk_detail)->pluck('id');

        if ($produkIds->contains($id)) {
            $index = $produkIds->search($id);
            $this->produk_detail[$index]['qty']++;

            $this->subTotalChange($index);
        } else {
            $data = [
                'id' => $menu->id,
                'image' => $menu->image,
                'name' => $menu->name,
                'price' => $menu->price,
                'sub_total' => $menu->price,
                'qty' => 1,
            ];

            $this->produk_detail[] = $data;
        }
    }



    public function subTotalChange($index)
    {

        $price =  $this->produk_detail[$index]['price'];
        $qty = $this->produk_detail[$index]['qty'];

        $this->produk_detail[$index]['sub_total'] = $price * $qty;
    }

    public function increaseQuantity($id)
    {
        $produkIds = collect($this->produk_detail)->pluck('id');
        $index = $produkIds->search($id);
        $this->produk_detail[$index]['qty']++;
        $this->subTotalChange($index);
    }

    public function clearOrder()
    {
        $this->produk_detail = [];
    }

    public function decreaseQuantity($id)
    {
        $produkIds = collect($this->produk_detail)->pluck('id');
        $index = $produkIds->search($id);
        $this->produk_detail[$index]['qty']--;

        if ($this->produk_detail[$index]['qty'] <= 0) {
            unset($this->produk_detail[$index]);
            $this->produk_detail = array_values($this->produk_detail);
        } else {

            $this->subTotalChange($index);
        }
    }



    public function render()
    {
        $categories = Category::all();
        $customer = Customer::all();

        if ($this->kategori_id != 0) {
            $type =  Type::where('category_id', $this->kategori_id)->get();
            $this->types = $type;
        }

        if ($this->type_id != 0) {
            $this->produk = Menu::where('name', 'like', '%' . $this->search . '%')
                ->where('type_id', $this->type_id)
                ->get();
        } else {
            $this->produk = Menu::where('name', 'like', '%' . $this->search . '%')->with('stocks')->get();
        }

        return view('livewire.transaction.index', compact('categories', 'customer'));
    }
}
