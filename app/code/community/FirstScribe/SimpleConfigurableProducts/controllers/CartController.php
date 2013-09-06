<?php

require_once 'Mage/Checkout/controllers/CartController.php';
class FirstScribe_SimpleConfigurableProducts_CartController extends Mage_Checkout_CartController
{


	public function updateItemOptionsAction()
	{
		
		$cart   = $this->_getCart();
		$params = $this->getRequest()->getParams();
		$product = $this->_initProduct();
		
		$old_product_item_id = (int) $params['id'];
		unset($params['id']);
		
		$new_product = $this->_initProduct();
		
		try {
			$cart
				->addProduct($new_product, $params)
				->removeItem($old_product_item_id)
				->save();
				
			$this->_getSession()->setCartWasUpdated(true);
			
		} catch (Exception $e) {
			
		}
		
		$this->_redirect('checkout/cart');
		
	}


}