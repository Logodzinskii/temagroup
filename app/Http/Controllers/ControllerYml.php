<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class ControllerYml extends Controller
{
    public function createYml()
    {
        // Подключение к БД

        $out = '<?xml version="1.0" encoding="UTF-8"?>' . "\r\n";
        $out .= '<yml_catalog date="' . date('Y-m-d H:i') . '">' . "\r\n";
        $out .= '<shop>' . "\r\n";

// Короткое название магазина, должно содержать не более 20 символов
        $out .= '<name>xn----7sbbtnkoefhm4b9l.xn--p1ai</name>' . "\r\n";

// Полное наименование компании, владеющей магазином
        $out .= '<company>xn----7sbbtnkoefhm4b9l.xn--p1ai</company>' . "\r\n";

// URL главной страницы магазина
        $out .= '<url>https://xn----7sbbtnkoefhm4b9l.xn--p1ai/</url>' . "\r\n";

// Список курсов валют магазина
        $out .= '<currencies>' . "\r\n";
        $out .= '<currency id="RUR" rate="1"/>' . "\r\n";
        $out .= '</currencies>' . "\r\n";

// Список категорий магазина:
// id     - ID категории
// parent - ID родительской категории
// name   - Название категории


        $out .= '<categories>' . "\r\n";
        $out .= '<category id="0001">Товары на заказ</category>' . "\r\n";

        $out .= '</categories>' . "\r\n";

// Вывод товаров:
        $catalog = Catalog::all();

        $out .= '<offers>' . "\r\n";
        foreach ($catalog as $row) {
            $out .= '<offer id="' . $row['id'] . '">' . "\r\n";

            // URL страницы товара на сайте магазина
            $out .= '<url>'. $_SERVER['REQUEST_SCHEME']. '://' .$_SERVER['HTTP_HOST']. '/catalog/'. $row['chpu'] . '</url>' . "\r\n";

            $out .= '<price>' . $row['price'] . '</price>' . "\r\n";


            // Валюта товара
            $out .= '<currencyId>RUR</currencyId>' . "\r\n";

            // ID категории
            $out .= '<categoryId>'. $row['id']. '</categoryId>' . "\r\n";

            // Изображения товара, до 10 ссылок
            $img = json_decode($row['image'], true);
            $out .= '<picture>'. $_SERVER['REQUEST_SCHEME']. '://' .$_SERVER['HTTP_HOST']. '/'. $img[0].'</picture>' . "\r\n";

            // Название товара
            $out .= '<name>'.$row['name'].'</name>' . "\r\n";

            // Описание товара, максимум 3000 символов
            $out .= '<description><![CDATA[' . stripslashes($row['meta_descriptions']) . ']]></description>' . "\r\n";
            $out .= '</offer>' . "\r\n";
        }

        $out .= '</offers>' . "\r\n";
        $out .= '</shop>' . "\r\n";
        $out .= '</yml_catalog>' . "\r\n";

        header('Content-Type: text/xml; charset=utf-8');
        file_put_contents('test.xml',$out);
        file_put_contents('feed_01.xml',$out);
    }

    public function createSiteMap()
    {
        /**
         * Постоянная часть не входит в цикл
         */
        $out = '<?xml version="1.0" encoding="UTF-8"?>' . "\r\n";
        $out .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\r\n";
        /**
         * @param $link string, адрес страницы от корневого
         *
         * Ссылки, тэг <priority> 1.0 присваивается главной страницы, остальные о 0.9 до 0.1
         */
        $link = '/';

        $out .= '<url>'. "\r\n";
        $out .= '<loc>'. $_SERVER['REQUEST_SCHEME']. '://' .$_SERVER['HTTP_HOST']. '/'. $link . '</loc>' . "\r\n";
        $out .= '<lastmod>'. date('Y-m-d H:i') .'</lastmod>';
        $out .= '<priority>1.0</priority>';
        $out .= '</url>';
        $out .= '</urlset>';
        /**
         * Сохраним sitemap.xml public
         */
        header('Content-Type: text/xml; charset=utf-8');
        file_put_contents('sitemap.xml',$out);
    }

}

