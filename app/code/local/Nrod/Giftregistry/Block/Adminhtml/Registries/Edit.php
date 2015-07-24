<?php
class Nrod_Giftregistry_Block_Adminhtml_Registries_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
	public function __construct() {
		parent::__construct();
		$this -> _objectId = 'id';
		$this -> _blockGroup = 'giftregistry';
		$this -> _controller = 'adminhtml_registries';
		$this -> _mode = 'edit';
		$this -> _updateButton('save', 'label', Mage::helper('giftregistry') -> __('Save Registry'));
		$this -> _updateButton('delete', 'label', Mage::helper('giftregistry') -> __('Delete Registry'));
	}

	public function getHeaderText() {
		if (Mage::registry('registries_data') && Mage::registry('registries_data') -> getId()) {
			return Mage::helper('giftregistry') -> __("Edit Registry '%s'", $this -> htmlEscape(Mage::registry('registries_data') -> getTitle()));
		} else {
			return Mage::helper('giftregistry') -> __('Add Registry');
		}
	}

}
