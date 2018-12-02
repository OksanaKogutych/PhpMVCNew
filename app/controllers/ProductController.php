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
              ->filter(['id',$this->getId()])->getCollection()->selectFirst();
        $this->setView();
        $this->renderLayout();
    }

    /**
     *
     */
    public function EditAction()
    {
        $model = $this->getModel('Product');
        $this->registry['saved'] = 0;
        $this->setTitle("Редагування товару");
        $id = filter_input(INPUT_POST, 'id');
        if ($id) {
            $values = $model->getPostValues();
            $this->registry['saved'] = 1;
            $model->editItem($id,$values);
             $this->setView('succesupdate');
              $this->renderLayout();
        }
 else {
     $this->registry['product'] = $model->getItem($this->getId());
        $this->setView();
        $this->renderLayout();
 }
        
    }
    
       public function DeleteAction() {
        
            $this->setTitle("Видалення товару");
            $model = $this->getModel('Product');
            $id = filter_input(INPUT_GET, 'id');
            if ($id) {
                $values = $model->getPostValues();
                $model->deleteItem($id);
                $this->setView('successdelete');
                $this->RenderLayout();
            } else {
                $this->setView();
                $this->RenderLayout();
            }
      
        }
    

    


    /**
     *
     */
//
//    public function AddAction() {
//
//        $model = $this->getModel('Product');
//        $this->setTitle("Додавання товару");
//        if ($values = $model->getPostValues()) {
//            $model->addItem($values);
//            if ($this->validation($values)) {
//                $model->addItem($values);
//                $this->setView('succesadd');
//                $this->renderLayout();
//            } else {
//                $this->registry['product'] = $values;
//                $this->setView();
//                $this->renderLayout();
//            }
//        } else {
//            $this->setView();
//            $this->renderLayout();
//        }
//
//
//       
//    }
         public function AddAction() {

        $model = $this->getModel('Product');
        $this->setTitle("Додавання товару");
        if ($values = $model->getPostValues()) {
            $model->addItem($values);
           
        } 
        
        $this->setView();
        $this->renderLayout();
    if (isset($_POST['submit'])){        
        $this->setView('succesadd');
        exit();
        
        } 
        
        }

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
        /*
        if (isset($_GET['id'])) {
         
            return $_GET['id'];
        } else {
            return NULL;
        }
        */
        return filter_input(INPUT_GET, 'id');
    }
    
        public function validationData($data) {

        foreach ($data as $key => $value) {
            switch ($key) {
                case 'sku': $sku = preg_match("~^[0-9a-zа-яґєіїё\,\\\'\s-]{1,30}$~ui", $value);
                    (!$sku) ? $this->errors['error_sku'] = $value : true;
                    break;

                case 'name': $name = preg_match("~^[0-9a-zа-яґєіїё\,\\\'\s-]{1,30}$~ui", $value);
                    (!$name) ? $this->errors['error_name'] = $value : true;
                    break;

                case 'price': $price = preg_match("/^([1-9][0-9]*|0)(\.[0-9]{2})?$/", $value);
                    (!$price) ? $this->errors['error_price'] = $value : true;
                    break;

                case 'qty': $qty = preg_match("/^([1-9][0-9]*|0)(\.[0-9]{3})?$/", $value);
                    (!$qty) ? $this->errors['error_qty'] = $value : true;
                    break;
                case 'description': $descrip = preg_match("~^[0-9a-zа-яґєіїё\,\\\'\s-]{1,}$~ui", $value);
                    (!$descrip) ? $this->errors['error_descrip'] = $value : true;
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