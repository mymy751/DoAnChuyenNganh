<?php

namespace App\Library;

use Exception;

// tạo lớp có tên là cart
class Cart
{
    //items nảy rổng nó tồn tai như cái giỏ hàng
    public $items = [];
    //total
    public $total_quanlity = 0;
    public $total_price = 0;

    public function __construct()
    {  //kiểm tra có session cart , không thì gán bằng rỗng
        $this->items = session('cart') ? session('cart') : [];

        $this->total_price = $this->get_total_price();
        $this->total_quanlity = $this->get_total_quantity();
    }
    //thêm sản phẩm vào giỏ hàng, có cái product lấy id, name, price, image, quantity,
    // và cái số lượng khi click vào nó sẽ bằng 1
    public function add($product, $quantity = 1)
    {
        //lọc thông tin item;
        //dd($product);
        // tạo một mảng gồm id sản phẩm và tên giá , số lượng
        //tạo cái mảng có tên là $item có id, name,...
        // item này như là cái hộp để chứa sản phẩm
        $item = [
            'id' => $product->id,
            'nameProduct' => $product->nameProduct,
            'price' => $product->price,
            'image' => $product->pictureProduct,
            'quantity' => $quantity,
        ];
        //dd($item);
        //dd( $this->item);
        // kiểm tra túi đựng sản phẩm , có sản phẩm này chưa
        // nếu có tồn tại cái id của sản phẩm
        if (isset($this->items[$product->id])) { // trong giỏ hàng này có sản phẩm chưa
            //thì số lượng sẽ cộng lên 1
            // nếu mà trong túi đã có cái LAPTOP Asus , khi click mua thêm 1 lần nữa thì cộng số lượng lên 1
            // nếu mà có gọi thì nó sẽ cộng sản phẩm đó lên 1
            $this->items[$product->id]['quantity'] += 1;
        } else {
            // add một sản phẩm mới vào giỏ hàng với số lượng là 1
            // còn nếu chưa có thì nó sẽ bỏ vào giỏ hàng sản phẩm đó
            $this->items[$product->id] = $item;
        }
        //lưu lại dữ liệu tạm của giỏ hàng với các sản phẩm đó
        session(['cart' => $this->items]);
    }
    // xóa sản phẩm ra khỏi giỏ hàng
    public function remove($id)
    {
        // nếu có tồn tại cái danh sachs giỏ hàng, thì nó sẽ unset là xóa cái sản phẩm đó
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }
        //lưu lại dữ liệu lúc nó mất cái sản phẩm đó
        session(['cart' => $this->items]);
    }
    // cập nhật lại số lượng của sản phẩm
    public function update($id, $quantity = 1)
    {
        // nếu mà có tồn tại cái sản phẩm đó, thì cái số lượng đó bằng 1
        if (isset($this->items[$id])) {
            $this->items[$id]['quantity'] = $quantity;
        }
        //lưu lại
        session(['cart' => $this->items]);
    }
    // xóa tất cả sản phẩm ra khổi giỏ hàng
    public function clear()
    {  //gắn thành mảng rỗng nha
        session(['cart' => []]);
    }
    // tính tổng toàn bộ sản phẩm ra giá tiền
    private function get_total_price()
    {
        try {
            // gán t bằng 0, chạy dòng lặp
            // gán t sẽ bằng giá nhân với số lượng, xong lặp lại nếu có sản phẩm thứ 2, lặp lặp lặp...
            $t = 0;
            foreach ($this->items as $item) {
                $t += $item['price'] * $item['quantity'];
            }
            //xong rồi trả về biến t
            return $t;
            // trường hợp khác thì nó sẽ không ra gì hết, là một mảng rỗng
        } catch (Exception $e) {
            $this->clear();
        }
    }
    // get tổng số lượng sản phẩm vd có 10 sản phẩm
    private function get_total_quantity()
    {

        $t = 0;
        // chạy dòng lặp t bằng t + số lượng
        // thêm một sản phẩm nữa thì nó cộng vào tiếp rồi lặp tiếp
        foreach ($this->items as $item) {
            $t += $item['quantity'];
        }

        return $t;
    }
}
