<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Respository\CategoryRespository;
use App\Respository\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public $_categoryRepo;
    public $_productRepo;
    public $_cateRepo;

    // khởi tạo đầu tiên vô cái lớp ...
    public function __construct(CategoryRespository $repo, ProductRepository $repoProduct, Category $repocate)
    {
        $this->_categoryRepo = $repo;
        $this->_productRepo = $repoProduct;
        $this->_cateRepo = $repocate;
    }
    public function index()
    {
        // loại sản phẩm
        $category = $this->_categoryRepo->getAllCategory();
        // lấy tất cả sản phẩm phẩm theo loại
        $category_product = $this->_categoryRepo->getCategoryJoinProduct();
        // cách debug xem lấy được chưa thì dùng dd như hình là 1 category có nhiều product
        return view('web.pages.home.index', compact('category', 'category_product'));
    }

    //khi bấm vào nó sẽ lấy sản phẩm theo id
    // url : chi-tiet-san-pham/2
    // số 2 là Id sản phẩm
    //// SQL : SELECT * FROM `product` WHERE id = 5;
    public function productById($id_product)
    {
        // product_by_id
        $product = $this->_productRepo->getProductById($id_product);

        return view('web.pages.product.detail', compact('product'));
    }
    /*
    - Đây là tìm kiếm sản phẩm
    - Request $request là library của laravel thực hiện lấy dữ liệu request từ input name khi submit form
    - Ví dụ input name='search'
    - search Product
    - url : http://laravelweb.local/tim-kiem?search=tensanpham
    - dd ($data) -> là cách debug xem có nhận dữ liệu đúng controller chưa
    */
    public function search(Request $request)
    {
        $ten_sp = $request->search;
        $product = $this->_productRepo->search($ten_sp);

        return view('web.pages.product.detail', compact('product'));
    }
    public function getProductByCategoryId()
    {
        $id = $_GET['id'];

        $product = $this->_cateRepo->getProductByCategory($id);

        $category = $this->_cateRepo->getCate();

        // View::renderTemplate('web.pages.home.index', [
        //     'ds_san_pham' => $product,
        //     'ds_category' => $category
        // ]);

        return view('web.pages.home.index', compact($product, $category));
    }
}
