<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class MoreProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['name' => 'Bánh Kem Matcha Trà Xanh', 'id_type' => 4, 'description' => 'Bánh kem hương vị trà xanh tươi mát', 'unit_price' => 350000, 'promotion_price' => 320000, 'image' => 'banhkem.jpg', 'unit' => 'cái', 'new' => 1],
            ['name' => 'Bánh Mặn Jambon', 'id_type' => 1, 'description' => 'Bánh mặn nhân thịt dăm bông ngon tuyệt', 'unit_price' => 25000, 'promotion_price' => 0, 'image' => 'banh-man-thu-vi-nhat-1.jpg', 'unit' => 'cái', 'new' => 1],
            ['name' => 'Bánh Trái Cây Thập Cẩm', 'id_type' => 3, 'description' => 'Bánh ngọt phủ trái cây tươi ngon', 'unit_price' => 180000, 'promotion_price' => 150000, 'image' => 'banhtraicay.jpg', 'unit' => 'hộp', 'new' => 0],
            ['name' => 'Pizza Phô Mai Chảy', 'id_type' => 6, 'description' => 'Pizza truyền thống với phô mai béo ngậy', 'unit_price' => 120000, 'promotion_price' => 0, 'image' => 'pizza.jpg', 'unit' => 'cái', 'new' => 1],
            ['name' => 'Bánh Su Kem Truyền Thống', 'id_type' => 7, 'description' => 'Bánh su kem mềm mịn nhân béo', 'unit_price' => 50000, 'promotion_price' => 45000, 'image' => 'sukemdau.jpg', 'unit' => 'hộp', 'new' => 0],
            ['name' => 'Bánh Ngọt Macaron', 'id_type' => 2, 'description' => 'Macaron Pháp ngọt ngào đa sắc màu', 'unit_price' => 200000, 'promotion_price' => 180000, 'image' => '20131108144733.jpg', 'unit' => 'hộp', 'new' => 1],
            ['name' => 'Bánh Crepe Dâu Tây', 'id_type' => 5, 'description' => 'Bánh crepe cuộn dâu tây ngọt mát', 'unit_price' => 150000, 'promotion_price' => 0, 'image' => 'crepe-dao.jpg', 'unit' => 'hộp', 'new' => 1],
            ['name' => 'Bánh Cupcake Vanilla', 'id_type' => 6, 'description' => 'Cupcake hương vani cổ điển', 'unit_price' => 120000, 'promotion_price' => 100000, 'image' => 'cupcake.jpg', 'unit' => 'hộp', 'new' => 0],
            ['name' => 'Bánh Kem Sinh Nhật Hoàng Gia', 'id_type' => 4, 'description' => 'Bánh kem cao cấp trang trí đẹp mắt', 'unit_price' => 550000, 'promotion_price' => 500000, 'image' => 'banh kem sinh nhat.jpg', 'unit' => 'cái', 'new' => 1],
            ['name' => 'Bánh Mặn Xúc Xích', 'id_type' => 1, 'description' => 'Bánh nhân xúc xích thơm lừng', 'unit_price' => 30000, 'promotion_price' => 0, 'image' => 'banh-man-thu-vi-nhat-1.jpg', 'unit' => 'cái', 'new' => 0],
            ['name' => 'Bánh Crepe Phô Mai Trái Cây', 'id_type' => 5, 'description' => 'Crepe mềm mịn phủ phô mai và trái cây', 'unit_price' => 170000, 'promotion_price' => 150000, 'image' => 'crepe-chuoi.jpg', 'unit' => 'hộp', 'new' => 1],
            ['name' => 'Bánh Tiramisu Ý', 'id_type' => 2, 'description' => 'Bánh ngọt Tiramisu truyền thống Ý', 'unit_price' => 220000, 'promotion_price' => 200000, 'image' => '111.jpg', 'unit' => 'cái', 'new' => 1]
        ];

        DB::table('products')->insert($products);
    }
}
