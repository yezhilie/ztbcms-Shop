<?php
namespace Shop\Controller;

use Shop\Service\CartService;

class CartController extends BaseController {
    /**
     * 购物车列表
     */
    public function index() {
        //如果用户没有登录，是用session_id加入购物车
        $where = ['user_id' => $this->userid];
        if (I('get.ids')) {
            $where['id'] = ['in', I('get.ids')];
        }
        $cart_list = M("Cart")->where($where)->select();
        $this->success($cart_list ? $cart_list : [], '', true);
    }

    /**
     * 设置购物车数量
     *
     * @param cart_id 购物车id
     */
    public function set_num() {
        $cart_id = I('cart_id');
        $cart = M('Cart')->find($cart_id);
        if ($cart && $cart_id) {
            $set_num = (int)I('set_num');
            $goods_id = $cart['goods_id'];
            $goods_num = $set_num - $cart['goods_num'];
            //将sku信息转化成数组
            if ($cart['spec_key_name']) {
                $spec_key_name = explode(' ', $cart['spec_key_name']);
                $spec_key = explode('_', $cart['spec_key']);
                $spec_arr = null;
                foreach ($spec_key_name as $key => $value) {
                    $spec_arr[explode(':', $value)[0]] = $spec_key[$key];
                };
                $goods_spec = $spec_arr;
            }
            $cart_service = new CartService();
            //设置购物车数据操作
            $result = $cart_service->add_cart($goods_id, $goods_num, $goods_spec, $this->session_id,
                $this->user_id); // 将商品加入购物车
            if ($result) {
                $this->success($result, '', true);
            } else {
                $this->error($cart_service->get_err_msg(), '', true);
            }
        } else {
            //如果购物车没有，默认是添加
            $goods_id = I("goods_id"); // 商品id
            $goods_num = I("goods_num", 1);// 商品数量
            $goods_spec = I("goods_spec"); // 商品规格
            $cart_service = new CartService();
            $result = $cart_service->add_cart($goods_id, $goods_num, $goods_spec, $this->session_id,
                $this->userid); // 将商品加入购物车
            if ($result) {
                $this->success($result, '', true);
            } else {
                $this->error($cart_service->get_err_msg(), '', true);
            }
        }
    }

    /**
     * ajax 将商品加入购物车
     */
    function add_cart() {
        $goods_id = I("goods_id"); // 商品id
        $goods_num = I("goods_num", 1);// 商品数量
        $goods_spec = I("goods_spec"); // 商品规格
        $cart_service = new CartService();
        $result = $cart_service->add_cart($goods_id, $goods_num, $goods_spec, $this->session_id,
            $this->userid); // 将商品加入购物车
        if ($result) {
            $this->success($result, '', true);
        } else {
            $this->error($cart_service->get_err_msg(), '', true);
        }
    }

    /**
     * 移除购物车
     */
    function del_cart() {
        $id = I('post.cart_id');
        $where['userid'] = $this->userid;
        $where['id'] = $id;
        $res = M('Cart')->where($where)->delete();
        if ($res) {
            $this->success('删除成功', '', true);
        } else {
            $this->error('无可删除内容', '', true);
        }
    }
}