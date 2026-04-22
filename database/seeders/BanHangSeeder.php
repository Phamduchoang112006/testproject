<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BanHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Type Products
        \DB::table('type_products')->insert([
            ['id' => 1, 'name' => 'Bánh mặn', 'description' => 'Nếu từng bị mê hoặc bởi các loại tarlet ngọt thì chắn chắn bạn không thể bỏ qua những loại tarlet mặn...', 'image' => 'banh-man-thu-vi-nhat-1.jpg'],
            ['id' => 2, 'name' => 'Bánh ngọt', 'description' => 'Bánh ngọt là một loại thức ăn thường dưới hình thức món bánh dạng bánh mì từ bột nhào...', 'image' => '20131108144733.jpg'],
            ['id' => 3, 'name' => 'Bánh trái cây', 'description' => 'Bánh trái cây, hay còn gọi là bánh hoa quả, là một món ăn chơi, không riêng gì của Huế...', 'image' => 'banhtraicay.jpg'],
            ['id' => 4, 'name' => 'Bánh kem', 'description' => 'Với người Việt Nam thì bánh ngọt nói chung đều hay được quy về bánh bông lan...', 'image' => 'banhkem.jpg'],
            ['id' => 5, 'name' => 'Bánh crepe', 'description' => 'Crepe là một món bánh nổi tiếng của Pháp...', 'image' => 'crepe.jpg'],
            ['id' => 6, 'name' => 'Bánh Pizza', 'description' => 'Pizza đã không chỉ còn là một món ăn được ưa chuộng khắp thế giới...', 'image' => 'pizza.jpg'],
            ['id' => 7, 'name' => 'Bánh su kem', 'description' => 'Bánh su kem là món bánh ngọt ở dạng kem được làm từ các nguyên liệu như bột mì, trứng...', 'image' => 'sukemdau.jpg'],
        ]);

        // Slides
        \DB::table('slide')->insert([
            ['id' => 1, 'link' => '', 'image' => 'banner1.jpg'],
            ['id' => 2, 'link' => '', 'image' => 'banner2.jpg'],
            ['id' => 3, 'link' => '', 'image' => 'banner3.jpg'],
            ['id' => 4, 'link' => '', 'image' => 'banner4.jpg'],
        ]);

        // Sample Products
        \DB::table('products')->insert([
            ['id' => 1, 'name' => 'Bánh Crepe Sầu riêng', 'id_type' => 5, 'description' => 'Bánh crepe sầu riêng nhà làm', 'unit_price' => 150000, 'promotion_price' => 120000, 'image' => '1430967449-pancake-sau-rieng-6.jpg', 'unit' => 'hộp', 'new' => 1],
            ['id' => 2, 'name' => 'Bánh Crepe Chocolate', 'id_type' => 6, 'description' => '', 'unit_price' => 180000, 'promotion_price' => 160000, 'image' => 'crepe-chocolate.jpg', 'unit' => 'hộp', 'new' => 1],
            ['id' => 3, 'name' => 'Bánh Crepe Sầu riêng - Chuối', 'id_type' => 5, 'description' => '', 'unit_price' => 150000, 'promotion_price' => 120000, 'image' => 'crepe-chuoi.jpg', 'unit' => 'hộp', 'new' => 0],
            ['id' => 4, 'name' => 'Bánh Crepe Đào', 'id_type' => 5, 'description' => '', 'unit_price' => 160000, 'promotion_price' => 0, 'image' => 'crepe-dao.jpg', 'unit' => 'hộp', 'new' => 0],
            ['id' => 7, 'name' => 'Bánh Crepe Táo', 'id_type' => 5, 'description' => '', 'unit_price' => 160000, 'promotion_price' => 0, 'image' => 'crepe-tao.jpg', 'unit' => 'hộp', 'new' => 1],
            ['id' => 13, 'name' => 'Bánh kem Chocolate Dâu', 'id_type' => 3, 'description' => '', 'unit_price' => 300000, 'promotion_price' => 280000, 'image' => 'banh kem sinh nhat.jpg', 'unit' => 'cái', 'new' => 1],
            ['id' => 61, 'name' => 'Bánh Cupcake - Anh Quốc', 'id_type' => 6, 'description' => '...', 'unit_price' => 150000, 'promotion_price' => 120000, 'image' => 'cupcake.jpg', 'unit' => 'cái', 'new' => 1],
            ['id' => 62, 'name' => 'Bánh Sachertorte', 'id_type' => 6, 'description' => '...', 'unit_price' => 250000, 'promotion_price' => 220000, 'image' => '111.jpg', 'unit' => 'cái', 'new' => 0],
        ]);

        // Customer
        \DB::table('customer')->insert([
            ['id' => 11, 'name' => 'Hương Hương', 'gender' => 'Nữ', 'email' => 'huongnguyenak96@gmail.com', 'address' => 'Lê Thị Riêng, Quận 1', 'phone_number' => '234567890-', 'note' => 'không chú'],
            ['id' => 12, 'name' => 'Khoa phạm', 'gender' => 'Nam', 'email' => 'khoapham@gmail.com', 'address' => 'Lê thị riêng', 'phone_number' => '1234567890', 'note' => 'Vui lòng chuyển đúng hạn'],
        ]);

        // News
        \DB::table('news')->insert([
            ['id' => 1, 'title' => 'Mùa trung thu năm nay...', 'content' => '...', 'image' => 'sample1.jpg'],
            ['id' => 2, 'title' => 'Tư vấn cải tạo phòng ngủ nhỏ...', 'content' => '...', 'image' => 'sample2.jpg'],
        ]);

        // Bills
        \DB::table('bills')->insert([
            ['id' => 14, 'id_customer' => 14, 'date_order' => '2017-03-23', 'total' => 160000, 'payment' => 'COD', 'note' => 'k'],
            ['id' => 13, 'id_customer' => 13, 'date_order' => '2017-03-21', 'total' => 400000, 'payment' => 'ATM', 'note' => 'Vui lòng giao hàng trước 5h'],
        ]);

        // Bill Details
        \DB::table('bill_detail')->insert([
            ['id' => 18, 'id_bill' => 15, 'id_product' => 62, 'quantity' => 5, 'unit_price' => 220000],
            ['id' => 17, 'id_bill' => 14, 'id_product' => 2, 'quantity' => 1, 'unit_price' => 160000],
        ]);
    }
}
