<?php

/**
 * Class ProductController
 */
class ProductController extends Controller
{

    /**
     *
     */
    public function IndexAction()
    {
        $this->ListAction();
    }

    /**
     *
     */
    public function ListAction()
    {
        $this->setTitle("Товари");
        $this->registry['products'] = $this->getModel('Product')->initCollection()
               ->sort($this->getSortParams())->getCollection()->select();

        $this->setView();
        $this->renderLayout();
    }

    /**
     *
     */
    public function ByidAction()
    {
        $this->setTitle("Карточка товара");
        $this->registry['product'] = $this->getModel('Product')->initCollection()
              ->filter(['id'=>$this->getId()])->getCollection()->selectFirst();
        $this->setView();
        $this->renderLayout();
    }

    /**
     *
     */

     public function EditAction() {

            $model = $this->getModel('Product');
            $this->registry['saved'] = 0;
            $this->setTitle("Редагування товару");
            $id = filter_input(INPUT_POST, 'id');
            if ($id) {

                $values = $model->getPostValues();

                if ($this->validation($values)) {

                    $this->registry['saved'] = 1;
                    $model->editItem($id, $values);
                    $this->setView('update');
                   $this->renderLayout();
                    
                    
                } else {
                    $this->registry['product'] = $model->getItem($this->getId());
                    $this->setView();
                    $this->renderLayout();
                }
            } else {
                if (($this->registry['product'] = $model->getItem($this->getId())) == null) {
                    $this->setView('error');
                    $this->renderLayout();
                }
                $this->setView();
                $this->renderLayout();
            }
        
    }
    
       public function DeleteAction() {
         if (Helper::isAdmin()) {
            $this->setTitle("Видалення товару");
            $model = $this->getModel('Product');
            $id = filter_input(INPUT_GET, 'id');
            if ($id) {
                $values = $model->getPostValues();
                $model->deleteItem($id);
                Helper::redirect("/product/list"); 
            } else {
                $this->setView();
                $this->RenderLayout();
            }
              } else {
           Helper::redirect('/index/index');
        }
      
        }
//     public function DeleteAction() {
//        if (Helper::isAdmin()) {
//            $this->setTitle("Видалення товару");
//            $model = $this->getModel('Product');
//            $id = filter_input(INPUT_GET, 'id');
//            if ($id) {
//                $values = $model->getPostValues();
//                $model->deleteItem($id);
//                //$this->setView('successdelete');
//                $this->RenderLayout();
//            } else {
//                $this->setView();
//                $this->RenderLayout();
//            }
//        } else {
//            Helper::redirect('/index/index');
//        }
//    }

    


    /**
     *
     */

        public function AddAction() {
        
            $model = $this->getModel('Product');
            $this->setTitle("Додавання товару");
            $id = $this->getId();
            $values = $model->getPostValues();
            if ($values) {
                if ($this->validation($values)) {
                    $model->addItem($values);
                    $this->setView('adddone');
                    $this->renderLayout();
                    
                     
                } else {
                    $this->registry['product'] = $values;
                    $this->setView();
                    $this->renderLayout();
                   
                }
            } else {
                $this->setView();
                $this->renderLayout();
                
            }
        
    }
    
    
    
//    public function AddAction() {
//
//        $model = $this->getModel('Product');
//        $this->setTitle("Додавання товару");
//        if ($values = $model->getPostValues()) {
//            $model->addItem($values);
//        }
//         $this->setView();
//        $this->renderLayout();
//       
//    if (isset($_POST['submit'])){        
//        Helper::redirect("/product/list"); 
//        exit();
//        
//        } 
//        
//        }

    /**
     * @return array
     */
    public function getSortParams()
    {
        $params = [];
        $sortfirst = filter_input(INPUT_POST, 'sortfirst');
        if ($sortfirst === "price_DESC") {
            $params['price'] = 'DESC';
        } else {
            $params['price'] = 'ASC';
        }
        $sortsecond = filter_input(INPUT_POST, 'sortsecond');
        if ($sortsecond === "qty_DESC") {
            $params['qty'] = 'DESC';
        } else {
            $params['qty'] = 'ASC';
        }
        
        return $params;

    }

    /**
     * @return array
     */
    public function getSortParams_old()
    {
        /*
        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        } else 
        { 
            $sort = "name";
        }
         * 
         */
        $sort = filter_input(INPUT_GET, 'sort');
        if (!isset($sort)) {
            $sort = "name";
        }
        /*
        if (isset($_GET['order']) && $_GET['order'] == 1) {
            $order = "ASC";
        } else {
            $order = "DESC";
        }
         * 
         */
        if (filter_input(INPUT_GET, 'order') == 1) {
            $order = "DESC";
        } else {
            $order = "ASC";
        }
        
        return array($sort, $order);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        
        if (isset($_GET['id'])) {
         
            return $_GET['id'];
        } else {
            return NULL;
        }
        
        return filter_input(INPUT_GET, 'id');
    }
    
        public function validation($data) {

        foreach ($data as $key => $value) {
            switch ($key) {
                case 'sku': $sku = preg_match("/^[0-9a-zа-яґєіїё]{1,15}$/ui", $value);
                    (!$sku) ? $this->errors['sku_error'] = $value : true;
                    break;

                case 'name': $name = preg_match("/^[0-9a-zа-яґєіїё\s]{1,30}$/ui", $value);
                    (!$name) ? $this->errors['name_error'] = $value : true;
                    break;

                case 'price': $price = preg_match("/^([1-9][0-9]*|0)(\.[0-9]{2})?$/", $value);
                    (!$price) ? $this->errors['price_error'] = $value : true;
                    break;

                case 'qty': $qty = preg_match("/^([1-9][0-9]*|0)(\.[0-9]{3})?$/", $value);
                    (!$qty) ? $this->errors['qty_error'] = $value : true;
                    break;
                case 'description': $descrip = preg_match("/^[0-9a-zа-яґєіїё\s\,']{1,}$/ui", $value);
                    (!$descrip) ? $this->errors['description_error'] = $value : true;
                    break;
            }
        }

        switch ($this->errors) {
            case true: $this->status = false;
                break;
            case false: $this->status = true;
                break;
        }
        return $this->status;
    }
}