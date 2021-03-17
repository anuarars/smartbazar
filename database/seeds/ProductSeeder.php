<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        $data = [
            [    
                'category_id' => 1,
                'user_id' => 2,
                'country_id' => 1,
                'measure_id' => 1,
                'company_id' => 1,
                'title' => 'Помидоры',
                'description' => 'Мало какой овощ сравнится с картофелем по количеству используемых во всём мире рецептов, картофель варят, жарят, пекут, запекают, томят, добавляют в супы, рагу и салаты, он является основой для запеканок, начинкой для пирогов и вареников, из него готовят котлеты, оладьи, клёцки и кнедлики. ',
                'price' => 195,
                'count' => 700,
                'discount' => 2,
                'sku' => rand(100000, 999999),
                'image' => "/storage/products/1.jpg"
            ],
            [    
                'category_id' => 1,
                'user_id' => 2,
                'country_id' => 1,
                'measure_id' => 1,
                'company_id' => 1,
                'title' => 'Морковь отборная',
                'description' => 'Морковь употребляют в пищу уже не одно тысячелетие. Блюда из этого овоща признаны кулинарами всех стран. Морковь не только вкусна, она еще и легко усваивается организмом, поэтому её используют в детском и диетическом питании. Из моркови готовят напитки, супы, салаты, гарниры и лакомства, кроме того, она является незаменимым ингредиентом в составе салатов, винегретов, соусов, приправ и гарниров, маринадов и мучных кондитерских изделий. Также морковь широко используется в производстве овощных, мясных и рыбных консервов.',
                'price' => 255,
                'count' => 700,
                'discount' => 2,
                'sku' => rand(100000, 999999),
                'image' => "/storage/products/2.jpg"
            ],
            [    
                'category_id' => 1,
                'user_id' => 2,
                'country_id' => 1,
                'measure_id' => 1,
                'company_id' => 1,
                'title' => 'Морковь отборная',
                'description' => 'Морковь употребляют в пищу уже не одно тысячелетие. Блюда из этого овоща признаны кулинарами всех стран. Морковь не только вкусна, она еще и легко усваивается организмом, поэтому её используют в детском и диетическом питании. Из моркови готовят напитки, супы, салаты, гарниры и лакомства, кроме того, она является незаменимым ингредиентом в составе салатов, винегретов, соусов, приправ и гарниров, маринадов и мучных кондитерских изделий. Также морковь широко используется в производстве овощных, мясных и рыбных консервов.',
                'price' => 255,
                'count' => 700,
                'discount' => 2,
                'sku' => rand(100000, 999999),
                'image' => "/storage/products/2.jpg"
            ],
            [    
                'category_id' => 1,
                'user_id' => 2,
                'country_id' => 1,
                'measure_id' => 1,
                'company_id' => 1,
                'title' => 'Лук репчатый',
                'description' => 'Из-за мягкого, деликатного вкуса чаще всего белый лук используют в салатах в необработанном виде. Конечно, его можно и пассеровать, и добавлять в первые и вторые блюда, но вкуснее всего употреблять его в пищу свежим.',
                'price' => 169,
                'count' => 700,
                'discount' => 2,
                'sku' => rand(100000, 999999),
                'image' => "/storage/products/4.jpg"
            ],
            [    
                'category_id' => 1,
                'user_id' => 2,
                'country_id' => 1,
                'measure_id' => 1,
                'company_id' => 1,
                'title' => 'Чеснок Китай кг',
                'description' => 'Помимо  калия, кальция, фосфора, витаминов группы В и С, он содержит марганец, йод, натрий и эфирные масла.  ',
                'price' => 1690,
                'count' => 700,
                'discount' => 2,
                'sku' => rand(100000, 999999),
                'image' => "/storage/products/5.jpg"
            ],
            [    
                'category_id' => 1,
                'user_id' => 2,
                'country_id' => 1,
                'measure_id' => 1,
                'company_id' => 1,
                'title' => 'Огурцы',
                'description' => 'Огурцы с высокими вкусовыми качествами, не горчит, хорошо хранится, красивые темно-зеленые плоды, хрустящие с небольшими пупырышками, подходит как для салатов и закусок, так и для засолки и маринования. Сделав заказ в нашем магазине, вы получаете только лучшее.
                Условия хранения: хранить при t +2 +16',
                'price' => 1915,
                'count' => 700,
                'discount' => 2,
                'sku' => rand(100000, 999999),
                'image' => "/storage/products/6.jpg"
            ],
            [    
                'category_id' => 1,
                'user_id' => 2,
                'country_id' => 1,
                'measure_id' => 1,
                'company_id' => 1,
                'title' => 'Сельдерей зелень 100 г',
                'description' => 'Сельдерей — вкусная и ароматная зелень, используется как приправа практически во всех блюдах, сельдерей делает мясо и птицу более ароматными и мягкими.',
                'price' => 285,
                'count' => 700,
                'discount' => 2,
                'sku' => rand(100000, 999999),
                'image' => "/storage/products/8.jpg"
            ],
            [    
                'category_id' => 1,
                'user_id' => 2,
                'country_id' => 1,
                'measure_id' => 1,
                'company_id' => 1,
                'title' => 'Салат листовой 100 г',
                'description' => 'Салат богат фолиевой кислотой, которая регулирует обмен веществ, участвует в работе нервной и кроветворной систем. Содержит медь, цинк, кобальт, марганец, молибден, титан, бор, йод. ',
                'price' => 200,
                'count' => 700,
                'discount' => 2,
                'sku' => rand(100000, 999999),
                'image' => "/storage/products/7.jpg"
            ],
            [    
                'category_id' => 1,
                'user_id' => 2,
                'country_id' => 1,
                'measure_id' => 1,
                'company_id' => 1,
                'title' => 'Спаржа зелёная 150 г',
                'description' => 'Спаржа содержит витамины А, В1, В2, В5, В6, С, Е, Н и РР, а также в её химическом составе имеются минеральные вещества: калий, кальций, магний, цинк, железо, фосфор и натрий, фолиевая кислота. Богата спаржа клетчаткой, которая оказывает благотворное влияние на деятельность желудочно-кишечного тракта, нормализует перистальтику кишечника. В состав спаржи входит аспарагин, который оказывает сосудорасширяющее действие, тем самым снижая кровяное давление.

                Спаржу можно варить, жарить, запекать, мариновать или готовить на пару. Спаржу часто добавляют в салаты и супы, используют в качестве гарнира или дополнения к сложносочинённым блюдам.',
                'price' => 2000,
                'count' => 700,
                'discount' => 2,
                'sku' => rand(100000, 999999),
                'image' => "/storage/products/9.jpg"
            ],
            [    
                'category_id' => 1,
                'user_id' => 2,
                'country_id' => 1,
                'measure_id' => 1,
                'company_id' => 1,
                'title' => 'Баклажаны',
                'description' => 'Тепличный комплекс NAC Agro находится в Алматы и ежегодно собирает качественный урожай свежих овощей и фруктов. В теплице царит благоприятный микроклимат для выращивания благодаря затуманиванию — системы создания тумана за счет распыления воды насосами высокого давления, чтобы поддерживать необходимую влажность.

                Для энергосбережения и защиты от излишнего солнечного тепла в конструкции теплицы предусмотрена система горизонтального и вертикального зашторивания.
                
                Для обеспечения управляемого микроклимата предусмотрена механизированная мойка крыши теплицы, уборка снега, система оттаивания снега, система мелования крыши теплицы. Мелование нужно для уменьшения влияния солнечного тепла и прямого попадания УФ.
                
                Покупайте свежайшие продукты казахстанского производства с теплиц NAC Agro — поддерживайте отечественный продукт и наслаждайтесь полезными овощами прямо с грядки!',
                'price' => 1790,
                'count' => 700,
                'discount' => 2,
                'sku' => rand(100000, 999999),
                'image' => "/storage/products/10.jpg"
            ],
            [    
                'category_id' => 1,
                'user_id' => 2,
                'country_id' => 1,
                'measure_id' => 1,
                'company_id' => 1,
                'title' => 'Капуста Vici морская в маринаде 240 г',
                'description' => 'Морская капуста – это очень полезная водоросль, которую люди с удовольствием употребляют в пищу. У нее есть другое название – ламинария. Продукт очень полезен – в нем содержится огромное количество витаминов – А, С, Е, К, вся группа витаминов В. Состав ламинарии пестрит различными микроэлементами – хлор, калий, натрий, магний, кремний, железо, кальций, фосфор. В продукте много легкоусвояемого йода. Кроме этого, в морской капусте есть пектины, аминокислоты, стерины, жирные кислоты. При всей этой ценности калорийность продукта очень низкая – не более 25 калорий на 100 грамм морской капусты. Это позволяет употреблять деликатес в любых количествах, использовать продукт в похудении.',
                'price' => 460,
                'count' => 700,
                'discount' => 2,
                'sku' => rand(100000, 999999),
                'image' => "/storage/products/11.jpg"
            ],
            [    
                'category_id' => 1,
                'user_id' => 2,
                'country_id' => 1,
                'measure_id' => 1,
                'company_id' => 1,
                'title' => 'Мука Цесна высший сорт 3 кг',
                'description' => 'ука высший сорт — это продукт повседневной необходимости и изделия из муки каждый день присутствуют на столе большинства людей. Основное направление в использовании  это выпечка, хлеб, булочки, торты, пироги и пирожные, кексы, сушки, сдоба.',
                'price' => 400,
                'count' => 700,
                'discount' => 2,
                'sku' => rand(100000, 999999),
                'image' => "/storage/products/12.jpg"
            ],
        ];
        DB::table('products')->insert($data);
    }
}