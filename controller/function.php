<?php

function paginate($item_per_page, $current_page, $total_records, $total_pages) {
	$pagination = '';

	$next = $current_page + 1;
	$previous = $current_page - 1;


		$pagination .= "<ul class='pagination'>";

			if($current_page > 1){
				$pagination .= ' <li class="page-item">
      <a class="page-link" href="news?page='.$previous.'" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>';
			} if($current_page != 1){
				$pagination .= ' <li class="page-item"><a class="page-link" href="news?page='.$previous.'">'.$previous.'</a></li>';
			}
				$pagination .= ' <li class="page-item active"><a class="page-link " href="news?page='.$current_page.'">'.$current_page.'</a></li>';

				if($current_page != $total_pages){
				$pagination .= ' <li class="page-item"><a class="page-link" href="news?page='.$next.'">'.$next.'</a></li>';
					}


			if($current_page >= 1 and $current_page != $total_pages){
				$pagination .= ' <li class="page-item">
      <a class="page-link" href="news?page='.$next.'" aria-label="Previous">
         <span aria-hidden="true">&raquo;</span>
      </a>
    </li>';
			}

		$pagination .= "</ul>";
	return $pagination; //return pagination links
}


function booking($x){

	$booking_data = [];
	return $booking_data;

}

function dietary($x){

  $vegetarian = $_SESSION['booking3'][0]['vegetarian'][$x]=='true'?"Vegetarian, ":'';
  $vegan = $_SESSION['booking3'][0]['vegan'][$x]=='true'?"Vegan, ":"";
  $halal = $_SESSION['booking3'][0]['halal'][$x]=='true'?"Halal, ":"";
  $kosher = $_SESSION['booking3'][0]['kosher'][$x]=='true'?"Kosher, ":"";
  $glute = $_SESSION['booking3'][0]['glute'][$x]=='true'?"Gluten-free, ":"";
  $lactose = $_SESSION['booking3'][0]['lactose'][$x]=='true'?"Lactose Intolerant, ":"";
  $others = $_SESSION['booking3'][0]['otherStep3'][$x];

  return $vegetarian.$vegan.$halal.$kosher.$glute.$lactose.$others; 
}
function dietarySpouse($x){

  $vegetarian = $_SESSION['booking3'][0]['vegetarianS'][$x]=='true'?"Vegetarian, ":'';
  $vegan = $_SESSION['booking3'][0]['veganS'][$x]=='true'?"Vegan, ":"";
  $halal = $_SESSION['booking3'][0]['halalS'][$x]=='true'?"Halal, ":"";
  $kosher = $_SESSION['booking3'][0]['kosherS'][$x]=='true'?"Kosher, ":"";
  $glute = $_SESSION['booking3'][0]['gluteS'][$x]=='true'?"Gluten-free, ":"";
  $lactose = $_SESSION['booking3'][0]['lactoseS'][$x]=='true'?"Lactose Intolerant, ":"";
  $others = $_SESSION['booking3'][0]['otherStep3S'][$x];

  return $vegetarian.$vegan.$halal.$kosher.$glute.$lactose.$others; 
}

function specialization(){

	 $courier .= $_SESSION['booking4'][0]['courier']=='true'?'Courier & Express, ':'';
	 $courier .= $_SESSION['booking4'][0]['dangerous']=='true'?'Dangerous Goods, ':'';
	 $courier .= $_SESSION['booking4'][0]['events']=='true'?'Events Logistics, ':'';
	 $courier .= $_SESSION['booking4'][0]['exhibition']=='true'?'Exhibition Logistics, ':'';
	 $courier .= $_SESSION['booking4'][0]['household']=='true'?'Household Removals, ':'';
	 $courier .= $_SESSION['booking4'][0]['liquid']=='true'?'Liquid Bulk Handling, ':'';
	 $courier .= $_SESSION['booking4'][0]['live']=='true'?'Live Animals, ':'';
	 $courier .= $_SESSION['booking4'][0]['nvocc']=='true'?'NVOCC, ':'';
	 $courier .= $_SESSION['booking4'][0]['pharmaceuticals']=='true'?'Perishable Goods, ':'';
	 $courier .= $_SESSION['booking4'][0]['project']=='true'?'Pharmaceuticals, ':'';
	 $courier .= $_SESSION['booking4'][0]['courier']=='true'?'Project Forwarding, ':'';
	 $courier .= $_SESSION['booking4'][0]['ships']=='true'?'Ships Spares and Marine Forwarding, ':'';
	 $courier .= $_SESSION['booking4'][0]['time']=='true'?'Time Critical, ':'';
	 $courier .= $_SESSION['booking4'][0]['wholesale']=='true'?'Wholesale Forwarding, ':'';
	 $courier .= $_SESSION['booking4'][0]['customs']=='true'?'Customs Brokerr, ':'';
	 $courier .= $_SESSION['booking4'][0]['seafreight']=='true'?'Seafreight Consolidators (LCL), ':'';
	 $courier .= $_SESSION['booking4'][0]['airfreight']=='true'?'Airfreight Consolidators, ':'';
	 $courier .= $_SESSION['booking4'][0]['importer']=='true'?'Importer of Record Services (IOR), ':'';
	 $courier .= $_SESSION['booking4'][0]['exporter']=='true'?'Exporter of Record Services (EOR), ':'';
	 $courier .= $_SESSION['booking4'][0]['ecommerce']=='true'?'E-Commerce Logistics, ':'';	

	 return $courier;
}

function services(){
 $courier = $_SESSION['booking4'][0]['courierSe']=='true'?'Courier & Express, ':'';
 $courier .= $_SESSION['booking4'][0]['freightMeSe']=='true'?'Freight Media, ':'';
 $courier .= $_SESSION['booking4'][0]['freightPaSe']=='true'?'Freight Payment Security Provider, ':'';
 $courier .= $_SESSION['booking4'][0]['freightTeSe']=='true'?'Freight Technology Provider, ':'';	
 $courier .= $_SESSION['booking4'][0]['freightEvSe']=='true'?'Freight Events, ':'';
 $courier .= $_SESSION['booking4'][0]['nom-profit']=='true'?'Non-Profit Charity, ':'';
   return $courier;
}

function sponserCal(){
 global $database;
 $dataSpon = array();
	$platinum = $_SESSION['booking2'][0]['platinum']=='true'?'Platinum Sponsor':'';
	$gold = $_SESSION['booking2'][0]['gold']=='true'?'Gold Sponsor ':'';
	$welcome = $_SESSION['booking2'][0]['welcome']=='true'?'Welcome Network Everning Sponsor':'';
	$meeting = $_SESSION['booking2'][0]['meeting']=='true'?'Meeting Scheduler Sponsor':'';
	$silver = $_SESSION['booking2'][0]['silver']=='true'?'Silver Sponsor':'';
	$coffee = $_SESSION['booking2'][0]['coffee']=='true'?'Coffee Break Sponsor':'';
	$beer = $_SESSION['booking2'][0]['beer']=='true'?'Beer-zone Sponsor':'';
	$shirt = $_SESSION['booking2'][0]['shirt']=='true'?'T-shirt Sponsor':'';
	$lanyard= $_SESSION['booking2'][0]['lanyard']=='true'?'Lanyard Sponsor':'';

	

	if($platinum != ''){
		$dataSpon[] = $database->get("sponsor","*",["name[~]"=>$platinum]);
	}
	if($gold != ''){
		$dataSpon[] = $database->get("sponsor","*",["name[~]"=>$gold]);
	}
	if($welcome != ''){
		$dataSpon[] = $database->get("sponsor","*",["name[~]"=>$welcome]);
	}
	if($meeting != ''){
		$dataSpon[] = $database->get("sponsor","*",["name[~]"=>$meeting]);
	}
	if($silver != ''){
		$dataSpon[] = $database->get("sponsor","*",["name[~]"=>$silver]);
	}
	if($coffee != ''){
		$dataSpon[] = $database->get("sponsor","*",["name[~]"=>$coffee]);
	}
	if($beer != ''){
		$dataSpon[] = $database->get("sponsor","*",["name[~]"=>$beer]);
	}
	if($shirt != ''){
		$dataSpon[] = $database->get("sponsor","*",["name[~]"=>$shirt]);
	}
	if($lanyard != ''){
		$dataSpon[] = $database->get("sponsor","*",["name[~]"=>$lanyard]);
	}
		return $dataSpon;
}

function advertiser(){
	global $database;

 	$dataAdd = array();
	$insideFront = $_SESSION['booking_adver'][0]['insideFront']=='true'?'Inside Front Cover':'';
	$insideBack = $_SESSION['booking_adver'][0]['insideBack']=='true'?'Inside Back Cover':'';
	$spread = $_SESSION['booking_adver'][0]['spread']=='true'?'Spread':'';
	
	$fullPage = $_SESSION['booking_adver'][0]['fullPage']=='true'?'Full Page':'';
	$halfPage = $_SESSION['booking_adver'][0]['halfPage']=='true'?'Half Page':'';
	$quarterPaget = $_SESSION['booking_adver'][0]['quarterPage']=='true'?'Quarter Page':'';
	

		if($insideFront != ''){
		$dataAdd[] = $database->get("sponsor","*",["name[~]"=>$insideFront,"type"=>'advertiser']);
		}
		if($insideBack != ''){
		$dataAdd[] = $database->get("sponsor","*",["name[~]"=>$insideBack,"type"=>'advertiser']);
		}
		if($spread != ''){
		$dataAdd[] = $database->get("sponsor","*",["name[~]"=>$spread,"type"=>'advertiser']);
		}
		if($fullPage != ''){
		$dataAdd[] = $database->get("sponsor","*",["name[~]"=>$fullPage,"type"=>'advertiser']);
		}
		if($halfPage != ''){
		$dataAdd[] = $database->get("sponsor","*",["name[~]"=>$halfPage,"type"=>'advertiser']);
		}
		if($quarterPaget != ''){
		$dataAdd[] = $database->get("sponsor","*",["name[~]"=>$quarterPaget,"type"=>'advertiser']);
		}
	return $dataAdd;
	}
function getSponsor($x){
	global $database;
	$spon = $database->get("sponsor","*",['input'=>$x]);
	return $spon;
}
function getCountry($x){
		global $database;
		$country = $database->get("countries","name",["id"=>$x]);
		return $country;
	}
function unsetSeSSION($x){
		unset($_SESSION[$x]);
	};

function getAvalible($x){
	global $database;
	$avalible = $database->get("avalible","*",['name'=>$x]);
	return $avalible;
}
function getCompany($id){
	global $database;
	$company = $database->get("companies","*",["id"=>$id]);
	return $company;
}
?>