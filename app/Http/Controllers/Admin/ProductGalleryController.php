<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;

use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

use App\Http\Requests\Admin\ProductGalleryRequest;

use App\Product;
use App\ProductGallery;
use App\User;
use App\Category;

use Illuminate\Support\Str;
class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = ProductGallery::with(['product']);

            return DataTables::of($query)
            ->addColumn('action', function($item){
                return '
                <div class="btn-group">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                            type="button" data-toggle="dropdown">Aksi
                        </button>
                        <div class="dropdown-menu">
                            <form action="'.route('product-gallery.destroy', $item->id).'" method="post">
                            '.method_field('delete'). csrf_field().'
                            <button type="submit" class="dropdown-item text-danger">
                                Hapus
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
                ';
            })
            ->editColumn('photos', function($item){
                return $item->photos ? '<img src="/storage/'.($item->photos).'" style="max-height: 40px;"/>' : '';
            })
            ->rawColumns(['action', 'photos'])
            ->make();

            ;
        }

        return view('pages.admin.product-gallery.index');
    }
    
    public function create()
    {
        $products = Product::all();
        
        return view('pages.admin.product-gallery.create',[
            'products' => $products
        ]);
    }

    public function store(ProductGalleryRequest $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/product', 'public');

        ProductGallery::create($data);

        return redirect()->route('product-gallery.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(ProductGalleryRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('product-gallery.index');
    }
}
