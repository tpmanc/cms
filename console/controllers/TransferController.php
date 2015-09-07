<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\helpers\Console;
use yii\web\ServerErrorHttpException;
use tpmanc\cmscore\models\StaticPage;
use tpmanc\cmscore\models\Product;
use tpmanc\cmscore\models\Category;
use tpmanc\cmscore\models\Menu;

/**
 * Transfer Olesya CMS to Abrikos CMS
 * Tables: cat, catalog, pages, catalog_2_cat, tags, tags_links
 */
class TransferController extends Controller
{
    private $db;

    /**
     * Full DB transfer. All required tables
     */
    public function actionFull()
    {
        $this->connect();
        $this->pages();
        $this->categories();
        $this->menu();
        $this->products();
        $this->productCategories();
    }

    /**
     * Categories transfer
     */
    private function categories()
    {
        $this->printTitle('Start Categories');
        if ($q = $this->db->query('SELECT * FROM cat')) {
            while ($r = $q->fetch_assoc()) {
                $c = new Category();
                $c->scenario = 'create';
                $c->title = $r['title'];
                $c->seoTitle = $r['seo_title'];
                $c->seoDescription = $r['seo_des'];
                $c->seoKeywords = $r['seo_key'];
                $c->seoText = $r['seo_text'];
                $c->chpu = $this->makeChpu($r['chpu']);
                $c->productCount = 0;
                $c->position = 0;
                $c->isDisabled = 0;
                $res = $c->save();
                if (!$res) {
                    var_dump($c->errors);
                    die();
                }
            }
            $q->close();
        }
        $this->printTitle("End Categories");
        $this->printTitle('Start Tags');
        if ($q = $this->db->query('SELECT * FROM tags')) {
            while ($r = $q->fetch_assoc()) {
                $c = new Category();
                $c->scenario = 'create';
                $c->title = $r['title'];
                $c->seoTitle = $r['seo_title'];
                $c->seoDescription = $r['seo_description'];
                $c->seoKeywords = $r['seo_key'];
                $c->seoText = $r['seo_text'];
                $c->chpu = $this->makeChpu($r['chpu']);
                $c->productCount = 0;
                $c->position = 0;
                $c->isDisabled = 0;
                $r = $c->save();
                if (!$r) {
                    var_dump($c->errors);
                    die();
                }
            }
            $q->close();
        }
        $this->printTitle("End Tags");
        $this->separator();
    }

    /**
     * Products transfer
     */
    private function products()
    {
        $this->printTitle('Start Products');
        $transaction = Product::getDb()->beginTransaction();
        if ($q = $this->db->query('SELECT catalog.*, cat.title as cat_title from catalog 
                                LEFT JOIN cat on cat.id = catalog.cat')) {
            while ($r = $q->fetch_assoc()) {
                $c = Category::find()->where(['title' => $r['cat_title']])->one();
                $pr = new Product();
                $pr->title = $r['title'];
                $pr->mainCategory = $c->id;
                $pr->description = $r['des'];
                $pr->shortDescription = '';
                $pr->netCost = $r['net_cost'];
                $pr->price = $r['price_after_discount'];
                $pr->discount = $r['discount_value'];
                $pr->nomenclature = $r['nomencl_10med'];
                $pr->length = $r['length'];
                $pr->width = $r['width'];
                $pr->height = $r['height'];
                $pr->weight = $r['weight'];
                $pr->seoTitle = $r['seo_title'];
                $pr->seoDescription = $r['seo_des'];
                $pr->seoKeywords = $r['seo_key'];
                $pr->chpu = $this->makeChpu($r['chpu']);
                $pr->fakeInStock = $r['fake_in_stock'];
                $pr->isDisabled = 0;
                if ($r['iframe'] != '' && isset($r['iframe'])) {
                    $this->video = $r['iframe'];
                } else {
                    $this->video = '';
                }
                $pr->isNew = $r['novinka'];
                $pr->isBest = $r['best'];
                $r = $pr->save();
                if (!$r) {
                    $transaction->rollBack();
                    var_dump($pr->chpu);
                    var_dump($pr->errors);
                    die();
                }
            }
            $q->close();
        }
        $transaction->commit();
        $this->printTitle('End Products');
        $this->separator();
    }

    /**
     * Link products to sub-categories
     */
    private function productCategories()
    {
        $this->printTitle('Start Products Categories');
        if ($q = $this->db->query('SELECT catalog_2_cat.*, catalog.title AS pr_title,
                                    cat.title AS c_title
                                    FROM catalog_2_cat 
                                    LEFT JOIN catalog ON catalog.id = catalog_2_cat.catalog_id
                                    LEFT JOIN cat ON cat.id = catalog_2_cat.cat_id')) {
            $inStr = 'INSERT INTO productCategories(productId, categoryId, isMainCategory) VALUES';
            $inArr = [];
            while ($r = $q->fetch_assoc()) {
                $p = Product::find()->where(['title' => $r['pr_title']])->one();
                $c = Category::find()->where(['title' => $r['c_title']])->one();
                if ($p === null || $c === null) {
                    continue;
                }
                $inArr[] = '('.$p->id.', '.$c->id.', 0)';
            }
            $q->close();
        }
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($inStr . implode(',', $inArr))->execute();
        $this->printTitle('End Products Categories');
    }

    private function menu()
    {
        $this->printTitle('Start menu');
        if ($q = $this->db->query('SELECT * FROM menuleft WHERE pod=0')) {
            while ($r = $q->fetch_assoc()) {
                $fields = [
                    'name' => $r['title'],
                    'link' => $this->makeChpu($r['chpu']),
                    'isCategory' => 0,
                    'categoryId' => 0,
                ];
                $rootE = Menu::findOne(['name' => 'Menu Root', 'depth' => 0]);
                $root = new Menu($fields);
                $root->appendTo($rootE);

                if ($q1 = $this->db->query('select menuleft.*, cat.title as cat_title ,
                                    tags.title as tag_title
                                    from menuleft 
                                    LEFT JOIN cat on cat.id=menuleft.cat_id
                                    LEFT JOIN tags on tags.id=menuleft.tag_id
                                    where menuleft.pod='.$r['id'].' and menuleft.cat_id<>0 order by rang asc')) {
                    while ($r1 = $q1->fetch_assoc()) {
                        if ($r1['tag_title'] == null || $r1['tag_title'] == '') {
                            $c = Category::find()->where(['title' => $r1['cat_title']])->asArray()->one();
                            if ($c !== null) {
                                $fields = [
                                    'name' => $r1['title'],
                                    'link' => '',
                                    'isCategory' => 1,
                                    'categoryId' => $c['id'],
                                ];
                                $elem = new Menu($fields);
                                $e = $elem->appendTo($root);
                            }
                        } else {
                            $c = Category::find()->where(['chpu' => $this->makeChpu($r1['chpu'])])->asArray()->one();
                            if ($c['id'] !== null) {
                                $fields = [
                                    'name' => $r1['title'],
                                    'link' => '',
                                    'isCategory' => 1,
                                    'categoryId' => $c['id'],
                                ];
                                $elem = new Menu($fields);
                                $e = $elem->appendTo($root);
                            }
                        }
                    }
                    $q1->close();
                }
            }
            $q->close();
        }
        $this->printTitle('End menu');
        $this->separator();
    }

    /**
     * Transfer Static Pages
     */
    private function pages()
    {
        $this->printTitle('Start Pages');
        if ($q = $this->db->query('SELECT * FROM pages')) {
            while ($r = $q->fetch_assoc()) {
                $page = new StaticPage();
                $page->title = $r['title'];
                $page->text = $r['des'];
                $page->seoTitle = $r['seo_title'];
                $page->seoKeywords = $r['seo_key'];
                $page->chpu = $r['chpu'];
                $page->seoDescription = $r['seo_des'];
                $page->save();
            }
            $q->close();
        }
        $this->printTitle('End Pages');
        $this->separator();
    }

    /**
     * Replace illegal symbols in chpu
     * @param string $chpu Chpu string
     * @return string Chpu with replaced illegal symbols
     */
    private function makeChpu($chpu)
    {
        $r = '';
        $r = str_replace("'", '', $chpu);
        $r = str_replace(" ", '-', $chpu);
        $r = str_replace(".", '', $chpu);
        $r = str_replace("+", '', $chpu);
        $r = strtolower($r);
        return $r;
    }

    /**
     * Connect to DB
     */
    private function connect()
    {
        $this->db = new \mysqli('localhost', 'abrikos', 'UVnWOnwcWIOn');
        if (mysqli_connect_errno()) {
            throw new ServerErrorHttpException(mysqli_connect_error());
        }
    }

    /**
     * Print text with green color
     * @param string $text Text for printing
     */
    private function printTitle($text)
    {
        $this->stdout($text . "\n", Console::FG_GREEN);
    }

    private function separator()
    {
        $this->stdout("\n-----------------------\n");
    }

    /**
     * Print text with red color
     * @param string $text Text for printing
     * @return integer 1 if error occured
     */
    private function error($text)
    {
        $this->stdout($text . "\n", Console::FG_RED);
        return 1;
    }
}