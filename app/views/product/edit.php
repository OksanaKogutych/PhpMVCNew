<?php 
$products =  $this->registry['product'];

?>
<div class="row">
  <div class="col-md-offset-3 col-md-6">
     <div class="panel panel-info">
    <div class="panel-heading">Редагування</div>
      <div class="panel-body">   
        <div id="form-container">
            <form method="post" id="signup-form"  autocomplete="off">
                 <div class="form-group">
                <input type="text" class="form-control"<?php if (isset($this->errors['sku_error'])) { ?> style="color:red;"<?php } ?> name="sku" value="<?php echo $products['sku']; ?>" id="mobile"  required />
                </div>
                <div class="form-group">    
                    
                <div class="form-group">
                <input type="hidden"  class="form-control" name="id" value="<?php echo $products['id']; ?>" required/>
                <input type="text" class="form-control"<?php if (isset($this->errors['name_error'])) { ?> style="color:red;"<?php } ?> name="name" id="name" value="<?php echo $products['name']; ?>" required />
                </div>
                            
                <div class="form-group">
                <input type="text" class="form-control"<?php if (isset($this->errors['price_error'])) { ?> style="color:red;"<?php } ?> name="price" id="name" value="<?php echo $products['price']; ?>" required />
                </div>
                            
                
                <input type="text" class="form-control"<?php if (isset($this->errors['qty_error'])) { ?> style="color:red;"<?php } ?> name="qty" id="mobile" value="<?php echo $products['qty']; ?>" required />
                </div>
                           <div class="form-group">
                         <textarea type="text" rows="5" cols="15" class="form-control" <?php if (isset($this->errors['description_error'])) { ?> style="background:red;"<?php } ?> name="description" id="mobile" value=""><?php echo $products['description']; ?></textarea>
                </div>   
                <hr />
                            
                <div class="form-group">
                <button class="btn btn-info">Зберегти</button>
                </div>
                        
            </form>   
         </div>  
        </div>
      </div>
    </div>
</div>