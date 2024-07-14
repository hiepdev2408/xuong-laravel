<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use App\Models\Tag;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        ProductVariant::query()->truncate();
        ProductGallery::query()->truncate();
        DB::table('product_tag')->truncate();
        Product::query()->truncate();
        ProductColor::query()->truncate();
        ProductSize::query()->truncate();

        Tag::query()->truncate();

        Tag::factory(15)->create();

        // Để tạo size thì sẽ có những size như (S, M, L, Xl, XXL)
        foreach(['S', 'M', 'L', 'XL', 'XXL'] as $item){
            ProductSize::query()->create([
                'name' => $item
            ]);
        } // Fake dữ liệu của bảng size
        foreach (['#FFFFFF', '#00FF00', '#0000FF', '#FF0000' , '#00FFFF'] as $item) {
            ProductColor::query()->create([
                'name' => $item
            ]);
        }

        // Khởi tạo bảng product
        for ($i=0; $i < 1000; $i++) {
            $name = fake()->text(200);
            Product::query()->create([
                'catelogue_id' => rand(2, 7),
                'name' => $name,
                'slug' => Str::slug($name) . '-' . Str::random(8), // Thực hiện khai báo hàm str::slug để tránh trùng
                // Sau đó nối chuối với hàm random để ko trùng lặp với nhau
                'sku' => Str::random(8) . $i,
                // Ở đây thì mình sẽ radom với cái biến $i vì nó đến 1000 thì sẽ ko bao h trùng
                'img_thumbnail' => 'https://down-vn.img.susercontent.com/file/vn-11134201-7r98o-lwwezhirgezd13',
                'price_regular' => 600000,
                'price_sale' => 400000,
                // Thực hiện fake những giữ liệu trống
                // những giữ liệu mình đặt là null khoặc mặc định giá trị defaute thi cx ko cần thêm
            ]);
        }

        // Đối với bảng product_gallery chúng ta sẽ thực
        // hiện khởi tạo cho nó chạy bắt đầu từ id của product
        for ($i=1; $i < 1001; $i++) {
            // ProductGallery::query()->create([
            //     'product_id' => $i,
            //     'image' => 'https://down-vn.img.susercontent.com/file/vn-11134201-7r98o-lwwezhirgezd13',
            // ]); // Đây là cách làm với việc thực hiện insert sản phẩm ít
            ProductGallery::query()->insert([
                [
                    'product_id' => $i,
                    'image' => 'https://down-vn.img.susercontent.com/file/vn-11134201-7r98o-lwwezhirgezd13',
                ],
                [
                    'product_id' => $i,
                    'image' => 'https://down-vn.img.susercontent.com/file/vn-11134201-7r98o-lwpiufg7ky1eda',
                ]
            ]);
        }

        // Đối với bảng Product_tag

        for ($i=1; $i < 1001; $i++) {
            DB::table('product_tag')->insert([
                [
                    'product_id' => $i,
                    'tag_id' => rand(1, 8)
                ],
                [
                    'product_id' => $i,
                    'tag_id' => rand(9, 15)
                ],
            ]);
        }

        // Đối với bảng ProductVariant

        for ($productID=1; $productID < 1001; $productID++) {
            $data = [];
            for ($sizeID=1; $sizeID < 6; $sizeID++) {
                for ($colorID=1; $colorID < 6; $colorID++) {
                    $data[] = [
                        'product_id' => $productID,
                        'product_size_id' => $sizeID,
                        'product_color_id' => $colorID,
                        'quantity' => 100,
                        'image' => 'https://down-vn.img.susercontent.com/file/vn-11134201-7r98o-lwpiufg7ky1eda',
                    ];
                }
            }
            DB::table('product_variants')->insert($data);
        }
    }
}
