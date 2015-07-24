<?php

require_once('app/Mage.php'); //Path to Magento
umask(0);
Mage::app();
ini_set('display_errors',1);

//Load an order
$order=Mage::getModel('sales/order')->load(198);
$shipping=$order->getShippingAddress();

 echo"<textarea style='width:90%; height:1000px'>" ;

 $placeholder="";
 $dom = new DOMDocument('1.0', 'UTF-8');
 $dom->formatOutput = true;
 
 //Creating the root node
 $root = $dom->createElement('SaleOrderDataSet');
 $root = $dom->appendChild($root);
 
 //Document Node
 $documents=$dom->createElement('Documents');
 $root->appendChild($documents);
 
 //Create XML node for document lines
 $document_lines=$dom->createElement('Document_Lines');
 $root->appendChild($document_lines);
 

 
 
 //Create elements using dom  and append elements to the required anchor nodes
	 $language=$dom->createElement('Language',Mage::app()->getLocale()->getLocaleCode());
	 $documents->appendChild($language);
	 
	 $sapcompany=$dom->createElement('SapCompany','WEB');
	 $documents->appendChild($sapcompany);
	 
	 $actiontype=$dom->createElement('ActionType','A');
	 $documents->appendChild($actiontype);
	 
	 $logid=$dom->createElement('LogId',$placeholder);
	 $documents->appendChild($logid);
 


	$docentry=$dom->createElement('DocEntry',$order->getIncrementId());
	$documents->appendChild($docentry);

	$cardcode=$dom->createElement('CardCode');
	$documents->appendChild($cardcode);

	$docnum=$dom->createElement('DocNum',$order->getIncrementId());
	$documents->appendChild($docnum);

	$bodocnum=$dom->createElement('BoDocNum','0');
	$documents->appendChild($bodocnum);

	$numatcard=$dom->createElement('NumAtCard',$order->getIncrementId());
	$documents->appendChild($numatcard);

	
	$date = new DateTime($order->getCreatedAt());  //used to convert from date time to date
	$docdate=$dom->createElement('DocDate',$date->format('dmY'));
	$documents->appendChild($docdate);
	
	$date = new DateTime($order->getCreatedAt()); //used to convert from date time to date
	$docduedate=$dom->createElement('DocDueDate',$date->format('dmY'));
	$documents->appendChild($docduedate);

	$comments=$dom->createElement('Comments');
	$documents->appendChild($comments);

	$doctotal=$dom->createElement('DocTotal',$order->getGrandTotal() - $order->getShippingAmount() - $order->getShippingTaxAmount());
	$documents->appendChild($doctotal);

	$shipcharge=$dom->createElement('shipcharge',$order->getShippingAmount());
	$documents->appendChild($shipcharge);

	$shiptocode=$dom->createElement('ShipToCode',$shipping->getPostcode());
	$documents->appendChild($shiptocode);

	$streets=$dom->createElement('StreetS',$shipping->getStreet());
	$documents->appendChild($streets);

	$blocks=$dom->createElement('BlockS');  // do we create a new address attribute???
	$documents->appendChild($blocks);

	$citys=$dom->createElement('CityS',$shipping->getCity());
	$documents->appendChild($citys);

	$zipcodes=$dom->createElement('ZipCodeS',$shipping->getPostcode());
	$documents->appendChild($zipcodes);

	$countys=$dom->createElement('CountyS'); // ?????
	$documents->appendChild($countys);

	$states=$dom->createElement('StateS',$shipping->getRegion());
	$documents->appendChild($states);

	$countrys=$dom->createElement('CountryS',$shipping->getCountryId());
	$documents->appendChild($countrys);

	$phonenumber=$dom->createElement('PhoneNumber',$shipping->getTelephone());
	$documents->appendChild($phonenumber);

	$buildings=$dom->createElement('BuildingS');
	$documents->appendChild($buildings);

	$billtocode=$dom->createElement('BillToCode');
	$documents->appendChild($billtocode);

	$cntccode=$dom->createElement('CntcCode');
	$documents->appendChild($cntccode);

	$frgcharge=$dom->createElement('FrgCharge');
	$documents->appendChild($frgcharge);

	$ordersource=$dom->createElement('OrderSource','estore');
	$documents->appendChild($ordersource);

	$location=$dom->createElement('Location');
	$documents->appendChild($location);

	$shipcompany=$dom->createElement('ShipCompany',$order->getShippingMethod());
	$documents->appendChild($shipcompany);

	$email=$dom->createElement('Email');
	$documents->appendChild($email,$order->getCustomerEmail());

	$attention=$dom->createElement('Attention');
	$documents->appendChild($attention);

	$billingoption=$dom->createElement('BillingOption','Shipper');
	$documents->appendChild($billingoption);

	$servicetype=$dom->createElement('ServiceType','GND');
	$documents->appendChild($servicetype,$order->getShippingMethod());

	$packagetype=$dom->createElement('PackageType','Package');
	$documents->appendChild($packagetype);

	
	//Items XML
	$line=0;
	foreach ($order->getAllItems() as $item) {
			
		if ($item->getParentItem()) {
			continue;
		}
	 //create XML node for rows
			 $row=$dom->createElement('Row');
			 $root->appendChild($row);

			

			$linenum=$dom->createElement('LineNum',$line);
			$row->appendChild($linenum);
			$line++;
			$itemcode=$dom->createElement('ItemCode',$item->getSku());
			$row->appendChild($itemcode);

			$quantity=$dom->createElement('Quantity',$item->getQtyOrdered());
			$row->appendChild($quantity);

			$price=$dom->createElement('Price',$item->getPrice());
			$row->appendChild($price);						

			$whscode=$dom->createElement('WhsCode',100);
			$row->appendChild($whscode);

			$depositor=$dom->createElement('Depositor','WEB');
			$row->appendChild($depositor);

			$uomcode=$dom->createElement('UomCode');
			$row->appendChild($uomcode);
	}

 
echo  $dom->saveXML();
  
echo"</textarea>" ;