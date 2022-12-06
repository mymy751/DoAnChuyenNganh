<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Library\Cart;
use App\Models\Product;
use App\Respository\CartRepository;
use App\Respository\CategoryRespository;
use App\Respository\ProductRepository;
use Exception;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //gobal variabales
    // đây gọi là biến sử dụng trong class để gán một class khác vào
    public $_cartRepo;
    public $_productRepo;
    //khỏi tạo đâù tiên vô cái lớp CartRepository với cái ProductRepository
    public function __construct(CartRepository $cartRepo, ProductRepository $productRepository)
    {
        $this->_cartRepo = $cartRepo;
        $this->_productRepo = $productRepository;
    }
    //gọi hàm có tên là index
    public function index()
    {
        //tạo một giỏ hàng mới
        $cart = new Cart();
        // trả về cái giao diện view của trang này, lấy cái bên cart ra, sử dụng dữ liệu của cart
        return view('web.pages.cart.index', compact('cart'));
    }
    public function order (Request $request){

        return redirect()->back()->with([
        'messages' => 'Mua thành công',
        'type' => 'alert-success'
                ]);
    }
    // $id là param request thêm sản phẩm theo id
    public function add(Request $request, $id)
    {
        try {
            // lấy sản phẩm theo id từ database
            $product = $this->_productRepo->getProductById($id);
            //dd($product);
            //nếu ko có sản phảm đó, thì nó xuât ra thông báo này
            if (!$product) {
                return redirect()->back()->with([
                    'messages' => 'Không có sản phẩm này vui lòng thử lại',
                    'type' => 'alert-success'
                ]);
            }
            // session library cart (mua hàng)
            // tạo mới cái giỏ hàng đó để mà khi nhấn vào mua nó sẽ vào cái giỏ đó
            $cart_library = new Cart();
            //dd($cart_library);
            // nó sẽ thêm cái sp
            // 1 là khi click vào thì số lượng sẽ lên 1
            $cart_library->add($product, 1);
            //dd($cart_library);
            $action = $request->get('action', '');
            if($action == 'buy_now'){
                return redirect()->route('cart')->with([
                    'messages' => 'Sản phẩm đã được thêm vào giỏ hàng',
                    'type' => 'alert-success'
                ]);
            }

            return redirect()->back()->with([
                'messages' => 'Thêm sản phẩm thành công ',
                'type' => 'alert-success'
            ]);
        } catch (Exception $e) {
            $this->exception();
            return redirect()->back()->with([
                'messages' => 'Không thêm được sản phẩm',
                'type' => 'alert-success'
            ]);
        }
    }

    //Xóa sản phẩm theo id
    public function delete(Request $request, $id)
    {
        try {
            $cart_library = new Cart();
            //---------------------------dd($cart_library);----------------------------
            //xóa luôn cái sản phẩm đó ra khỏi giỏ hàng
            $cart_library->remove($id);
            //--------------dd($cart_library);--------------------------
            return redirect()->back()->with([
                'messages' => 'Xóa sản phẩm ra khỏi giỏ hàng',
                'type' => 'alert-success'
            ]);
        } catch (Exception $e) {
            $this->exception();
            //---------------- dd($e);---------------
            return redirect()->back()->with([
                'messages' => 'Không xáo sản phẩm được',
                'type' => 'alert-success'
            ]);
        }
    }

    // dọn dẹn hết tất cár giỏ hàng
    public function clear()
    {
        try {
            $cart_library = new Cart();
            // clear hết luôn cái giỏ hàng
            $cart_library->clear();
            //dd($cart_library);
            return redirect()->back()->with([
                'messages' => 'Xóa giỏ hàng thành công ',
                'type' => 'alert-success'
            ]);
        } catch (Exception $e) {
            $this->exception();
            return redirect()->back()->with([
                'messages' => 'Xóa giỏ hàng không thành công ',
                'type' => 'alert-success'
            ]);
        }
    }

    // mảng rỗng, ko có gì hết, để ở trên gọi nếu mà bị lỗi
    // thì nó sẽ gọi cái trang ko có gì hết này ra
    public function exception()
    {
        $cart_library = new Cart();

        session(['cart' => []]);
    }
}
