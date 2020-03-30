<?php
use PHPMailer\PHPMailer\PHPMailer;
include "function.php";

$alias = $_GET['alias'];
if($alias == 'admin'){
include "login.php";
}else{
		if ($_SESSION["user"]=='admin') {
				if ($alias == '') {$alias = 'dashboard';}else {
					$alias = $alias;}
					// admin switch 

					switch ($alias) {

					case "logout_admin":
					session_destroy();
					header('location:home');
					break;
					case "dashboard":
					// booking 
						$booking_count = $database->count("booking");
						$booking_count_paid = $database->count("booking",["status"=>'yes']);
						$booking_amount_paid = $database->sum("booking","amount",["status"=>'yes']);
						$booking_count_unpaid = $database->count("booking",["status"=>'no']);
						$booking_amount_unpaid = $database->sum("booking","amount",["status"=>'no']);
						$total = $booking_amount_paid + $booking_amount_unpaid;
					// company
						$company_count = $database->count("companies");
					// attendee
						$attendee_count = $database->count("attendee",["type_member"=>"attendee"]);
						// spouse
						$spouse_count = $database->count("attendee",["type_member"=>"spouse"]);
					break;
					case "getimage":
					$folder_name = 'uploads/photos/';

						if(!empty($_FILES))
						{
						 $temp_file = $_FILES['file']['tmp_name'];
						 $location = $folder_name . $_FILES['file']['name'];
						 move_uploaded_file($temp_file, $location);
						}

						if(isset($_POST["name"]))
						{
						 $filename = $folder_name.$_POST["name"];
						 unlink($filename);
						}

						$result = array();



						$files = scandir('uploads/photos');

						if(false !== $files)
						{
						asort($files);
						 foreach($files as $file)
						 {
						  if('.' !=  $file && '..' != $file)
						  {
						     $path = $siteLink."/".$folder_name.$file;
						   $output .= '
						   <tr">
						   <td>
						    <img src="'.$folder_name.$file.'" class="img-thumbnail" width="150px"  />
						 </td>
						    <td><span class="">'.$path.'</span></td>
						    <td><button type="button" class="btn btn-danger remove_image" id="'.$file.'">Remove</button></td>
						   </tr>
						   ';
						  }
						 }
						}

						echo $output;
						exit;
    break;
					case "news_list":
						$getitem = $database->select("news","*",["ORDER"=>["date_time"=>"DESC"]]);
					break;
					case "edit_news":
						$item = $database->get("news","*",["id"=>$_GET['id']]);
					break;
					case "update_news":
					if($_POST['type_form']=='new'){
						$database->insert("news",[
							"title"=>$_POST['title_news']]);
						$newsid = $database->id();
					}else{
						$newsid = $_POST['type_form'];

					}
						$database->update("news",[
								"title"=>$_POST['title_news'],
								"content"=>$_POST['content'],
								"date_time"=>date("Y-m-d H:i:s"),
								"status"=>$_POST['status']
						],['id'=>$newsid]);
						if(!empty($_FILES["news_banner"]['tmp_name'])){
							$folder_name = 'news/';
							 $temp_file = $_FILES['news_banner']['tmp_name'];
							 $location = $folder_name . $_FILES['news_banner']['name'];
							 move_uploaded_file($temp_file, $location);	
							 $database->update("news",["image"=>$siteLink.$location],["id"=>$newsid]);
						}
						header("location:news_list");
					break;
					case "booking_list":
						$getitem = $database->select("booking","*");
					 break;
					 case "edit_booking":
					 	if($_GET['id']!="new"){
						
						$item = $_GET['id'];
						$getitem = $database->get("booking","*",["id"=>$item]);
						$getCom = $database->get("companies","*",["id"=>$getitem['company_id']]);
						$getAtts = $database->select("attendee","*",["company_id"=>$getitem['company_id']]);
						}
						
					 break;
					 case "update_booking":
					 		include "update_booking.php";



					 break;
					case"company_list":
						$getitem = $database->select("companies","*");
					break;
					case "edit_company":
						if($_GET['id']!="new"){
						
						$attendee = $_GET['id'];
						$getitem = $database->get("companies","*",["id"=>$attendee]);
						}
					break;
					case "upload_image_company":
						    $data = $_POST['image'];
					        list($type, $data) = explode(';', $data);
					        list(, $data)      = explode(',', $data);
					        $data = base64_decode($data);
					        $imageName = time().'.jpg';
					        file_put_contents('company_pic/'.$imageName, $data);
					        // echo $siteLink ."/company_pic/".$imageName;
					        echo"company_pic/".$imageName;
					        exit;
							break;
					case"update_company":
					if($_POST['type_form']=="new"){
						$database->insert("companies",["companyname"=>$_POST['companyname']]);
								$id = $database->id();
					}else{
							$id = $_POST['type_form'];
					}
						$database->update("companies",[
							"companyname"=>$_POST['companyname'],
							"email"=>$_POST['email'],
							"address"=>$_POST['address'],
							"city"=>$_POST['city'],
							"country"=>$_POST['country'],
							"phone"=>$_POST['phone'],
							"mobile"=>$_POST['mobile'],
							"specialization"=>$_POST['specialization'],
							"services"=>$_POST['services'],
							"comment"=>$_POST['comment'],
							"status"=>$_POST['status']
						],["id"=>$id]);

						if($_POST['logo_path']){
							$database->update("companies",["image"=>$_POST['logo_path']],["id"=>$id]);
						}
						$_SESSION["msg"]= "Item has been Updated!";
						header("location:company_list");

					break;
					case "attendee_list":
							$attendees = $database->select("attendee","*");
					break;
					case"edit_attendee":
						if($_GET['id']!="new"){
						
						$attendee = $_GET['id'];
						$getitem = $database->get("attendee","*",["id"=>$attendee]);
						$getCom = $database->select("companies","*");
						}

					break;
					case "delete_item":
						$table = $_GET['table'];
						$item = $_GET['id'];
						$location = $_GET['loca'];
						$database->delete($table,['id'=>$item]);

						$_SESSION['msg'] = "Item has been Deleted!";
						header("location:".$location);
					break;
					case "upload_image":
						    $data = $_POST['image'];
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        $imageName = time().'.jpg';
        file_put_contents('attendee_pic/'.$imageName, $data);
        // echo $siteLink ."/attendee_pic/".$imageName;
        echo"attendee_pic/".$imageName;
        exit;
		break;

					case "update_attendee":
						if($_POST['type_form']=="new"){
								$database->insert("attendee",["first_name"]);
								$id = $database->id();
						}else{
								$id = $_POST['type_form'];
						}
						$database->update("attendee",[
							"title"=>$_POST["title"],
							"first_name"=>$_POST['first_name'],
							"last_name"=>$_POST['last_name'],
							"position_name"=>$_POST['position_name'],
							"email"=>$_POST['email'],
							"mobile_no"=>$_POST['mobile_no'],
							"company_id"=>$_POST['company_id'],
							"type_member"=>$_POST['member_type'],
							"allergies"=>$_POST['allergies'],
							"size_shirt"=>$_POST['size_shirt'],
							"comment"=>$_POST['comment'],
							"status"=>$_POST['status']
						],["id"=>$id]);

						if($_POST['logo_path']){
							$database->update("attendee",["image"=>$_POST['logo_path']],["id"=>$id]);
						}
						$_SESSION["msg"]= "Item has been Updated!";
						header("location:attendee_list");

					break;
					}
					// end switch admin
				include('admin_path/index.php');
			}
			// end if it's admin
		else{

		if ($alias == '') {$alias = 'home';}else {
		$alias = $alias;}
				// user switch 
		switch ($alias) {

			case "login_admin":

			if($database->has("admin",["AND" => ["OR"=>["username"=>$_POST['username'],"email"=>$_POST['username']], "password"=>md5($_POST['pass'])]])){

							$_SESSION["user"] = 'admin';
							$_SESSION['userinfo'] = $database->get("admin","*",["AND" => ["OR"=>["username"=>$_POST['username'],"email"=>$_POST['username']], "password"=>md5($_POST['pass'])]]);
							header('location:dashboard');
						}else{
							header('location:admin');
						}

					break;
					case "home":
						$newslist = $database->select("news","*",["ORDER"=>["date_time"=>"DESC"],"status"=>"y","LIMIT"=>4]);	
					break;
					case "attendee":
						$dataItem = $database->select("attendee","*",["type_member"=>'attendee',"status"=>"yes"]);
					break;
					case"save_step1":
					$multi = $_POST['multiple-number']== 0 || $_POST['multiple-number']==''?1:$_POST['multiple-number'];
						$_SESSION['booking1']= array(["pass"=>$_POST['att_pass'],
						  "multi"=>$multi,
						  "spouse"=>$_POST['multiple-spouse']==''?0:$_POST['multiple-spouse'],
						  "fixed"=>$_POST['multiple-table']==''?0:$_POST['multiple-table']
						]);

           			header("location:book_step2");
					break;
					case"save_step2":
					$_SESSION['booking2'] = array(["platinum"=>$_POST['platinum'],
"gold"=>$_POST['gold'],
"welcome"=>$_POST['welcome'],
"meeting"=>$_POST['meeting'],
"silver"=>$_POST['silver'],
"coffee"=>$_POST['coffee'],
"beer"=>$_POST['beer'],
"shirt"=>$_POST['shirt'],
"lanyard"=>$_POST['lanyard']
]);
$_SESSION['booking_adver'] = array(["insideFront"=>$_POST['insideFront'],
"insideBack"=>$_POST['insideBack'],
"spread"=>$_POST['spread'],
"fullPage"=>$_POST['fullPage'],
"halfPage"=>$_POST['halfPage'],
"quarterPage"=>$_POST['quarterPage']
]);

header("location:book_step3");
					break;
					case"save_step3":
					$_SESSION['booking3']= array([
"attendee_title"=>$_POST['titleName'],
"attendee_first"=>$_POST['firstName'],
"attendee_last"=>$_POST['lastName'],
"attendee_position"=>$_POST['position'],
"attendee_t-shirt"=>$_POST['t-shirt'],
"vegetarian"=>$_POST['vegetarian'],
"vegan"=>$_POST['vegan'],
"halal"=>$_POST['halal'],
"kosher"=>$_POST['kosher'],
"glute"=>$_POST['glute'],
"lactose"=>$_POST['lactose'],
"otherStep3"=>$_POST['otherStep3'],
"allergies"=>$_POST['allergies'],
"spouse_title"=>$_POST['titleS'],
"spouse_name"=>$_POST['fisrtS'],
"spouse_last"=>$_POST['lastS'],
"vegetarianS"=>$_POST['vegetarianS'],
"veganS"=>$_POST['veganS'],
"halalS"=>$_POST['halalS'],
"kosherS"=>$_POST['kosherS'],
"gluteS"=>$_POST['gluteS'],
"lactoseS"=>$_POST['lactoseS'],
"otherStep3S"=>$_POST['otherStep3S'],
"allergiesS"=>$_POST['allergiesS'],
]);

header("location:book_step4");
					break;
					case"save_step4":
					$_SESSION['booking4']= array([
"nameCom"=>$_POST['nameCom'],
"emailCom"=>$_POST['emailCom'],
"phoneCom"=>$_POST['phoneCom'],
"mobileCom"=>$_POST['mobileCom'],
"websiteCom"=>$_POST['websiteCom'],
"iataCom"=>$_POST['iataCom'],
"addressCom"=>$_POST['addressCom'],
"cityCom"=>$_POST['cityCom'],
"countryCom"=>$_POST['countryCom'],
"currentNetCom"=>$_POST['currentNetCom'],
"courier"=>$_POST["courier"],
"dangerous"=>$_POST['dangerous'],
"events"=>$_POST['events'],
"exhibition"=>$_POST['exhibition'],
"household"=>$_POST['household'],
"liquid"=>$_POST['liquid'],
"live"=>$_POST['live'],
"nvocc"=>$_POST['nvocc'],
"perishable"=>$_POST['perishable'],
"pharmaceuticals"=>$_POST['pharmaceuticals'],
"project"=>$_POST["project"],
"ships"=>$_POST['ships'],
"time"=>$_POST['time'],
"wholesale"=>$_POST['wholesale'],
"customs"=>$_POST['customs'],
"seafreight"=>$_POST['seafreight'],
"airfreight"=>$_POST['airfreight'],
"importer"=>$_POST['importer'],
"exporter"=>$_POST["exporter"],
"ecommerce"=>$_POST['ecommerce'],
"courierSe"=>$_POST['courierSe'],
"freightMeSe"=>$_POST['freightMeSe'],
"freightPaSe"=>$_POST['freightPaSe'],
"freightTeSe"=>$_POST['freightTeSe'],
"freightEvSe"=>$_POST['freightEvSe'],
"nom-profit"=>$_POST['nom-profit'],
"howLearn"=>$_POST['howLearn'],
"textMessage"=>$_POST['textMessage']
]);
					header("location:book_step5");	
					break;

					case "book_done":
					session_destroy();
					
					break;

					case "confirm_booking":
					
					// insert company

					$specialization = specialization();
					$services = services();
					$detail_com= array("How Learn"=>$_SESSION['booking4'][0]['howLearn'],"Message"=>$_SESSION['booking4'][0]['textMessage'],
						"Current Network"=>$_SESSION['booking4'][0]['currentNetCom'],
						"IATA"=>$_SESSION['booking4'][0]['iataCom']
						);
					$database->insert("companies",[
						"companyname"=>$_SESSION['booking4'][0]['nameCom'],
						"email"=>$_SESSION['booking4'][0]['emailCom'],
						"address"=>$_SESSION['booking4'][0]['addressCom'],
						"city"=>$_SESSION['booking4'][0]['cityCom'],
						"country"=>getCountry($_SESSION['booking4'][0]['countryCom']),
						"phone"=>$_SESSION['booking4'][0]['phoneCom'],
						"mobile"=>$_SESSION['booking4'][0]['mobileCom'],
						"specialization"=>json_encode($specialization),
						"services"=>json_encode($services),
						"detail"=>json_encode($detail_com),
						"status"=>'no'
					]);

					$company_id = $database->id();

					//insert booking
					$attendee_booking = array("quantity"=>$_SESSION['booking1'][0]['multi'],"price"=> $_SESSION['booking1'][0]['pass'][0]*$_SESSION['booking1'][0]['multi']);
					$spouse_booking = array("quantity"=>$_SESSION['booking1'][0]['spouse']==""?0:$_SESSION['booking1'][0]['spouse'],"price"=>$database->get("book_price","price",['type'=>'spo_pass'])*$_SESSION['booking1'][0]['spouse']);
					$fix_table = array("quantity"=>$_SESSION['booking1'][0]['fixed'],"price"=> $database->get("book_price","price",['type'=>'fix_pass'])*$_SESSION['booking1'][0]['fixed']);
					$sponsor = sponserCal();
					$advertiser = advertiser();
					$dis = $database->get("avalible","*",["name"=>'discount']);
					$discount = $_SESSION['booking1'][0]['multi']>1?($_SESSION['booking1'][0]['pass'][0]*$_SESSION['booking1'][0]['multi'])*number_format($dis['detail'],2):0;

					$database->insert("booking",[
						"company_id"=>$company_id,
						"attendee"=>json_encode($attendee_booking),
						"spouse"=>json_encode($spouse_booking),
						"fix_table"=>json_encode($fix_table),
						"sponsor"=>json_encode($sponsor),
						"advertiser"=>json_encode($advertiser),
						"discount"=>$discount,
						"amount"=>$_SESSION['amount'],
						"datetime"=>Date("Y-m-d H:i:s"),
						"status"=>"no"
					]);
					$booking_id = $database->id();


					// insert attendee
				 for($i = 0; $i < $_SESSION['booking1'][0]['multi']; $i++){
				 			
							$detail_att = array(
								"vegetarian"=>$_SESSION['booking3'][0]['vegetarian'][$i],
								"vegan"=>$_SESSION['booking3'][0]['vegan'][$i],
								"halal"=>$_SESSION['booking3'][0]['halal'][$i],
								"kosher"=>$_SESSION['booking3'][0]['kosher'][$i],
								"glute"=>$_SESSION['booking3'][0]['glute'][$i],
								"lactose"=>$_SESSION['booking3'][0]['lactose'][$i],
								"other"=>$_SESSION['booking3'][0]['otherStep3'][$i]
						);
							
							
						      
						$database->insert("attendee",[
							"title"=>$_SESSION['booking3'][0]['attendee_title'][$i],
							"first_name"=>$_SESSION['booking3'][0]['attendee_first'][$i],
							"last_name"=>$_SESSION['booking3'][0]['attendee_last'][$i],
							"position_name"=>$_SESSION['booking3'][0]['attendee_position'][$i],
							"company_id"=>$company_id,
							"type_member"=>'attendee',
							"size_shirt"=>$_SESSION['booking3'][0]['attendee_t-shirt'][$i],
							"allergies"=>$_SESSION['booking3'][0]['allergies'][$i],
							"detail"=> json_encode($detail_att),
							"status"=>"no"
					]);

					 }
					 					// insert spouse
				 for($i = 0; $i < $_SESSION['booking1'][0]['multi']; $i++){
				 			
							$detail_spo = array(
									"vegetarian"=>$_SESSION['booking3'][0]['vegetarianS'][$i],
									"vegan"=>$_SESSION['booking3'][0]['veganS'][$i],
									"halal"=>$_SESSION['booking3'][0]['halalS'][$i],
									"kosher"=>$_SESSION['booking3'][0]['kosherS'][$i],
									"glute"=>$_SESSION['booking3'][0]['gluteS'][$i],
									"lactose"=>$_SESSION['booking3'][0]['lactoseS'][$i],
									"other"=>$_SESSION['booking3'][0]['otherStep3S'][$i]

							);
				
							$database->insert("attendee",[
							"title"=>$_SESSION['booking3'][0]['spouse_title'][$i],
							"first_name"=>$_SESSION['booking3'][0]['spouse_name'][$i],
							"last_name"=>$_SESSION['booking3'][0]['spouse_last'][$i],
							"company_id"=>$company_id,
							"type_member"=>'spouse',
							"allergies"=>$_SESSION['booking3'][0]['allergiesS'][$i],
							"detail"=> json_encode($detail_spo),
							"status"=>"no"
					]);

					 }

					
					// PDF file
					 ob_start();
					include ('app/pdf_export.php');
					$pdf = ob_get_clean();
					 include "pdf.php";
					 $file_name = md5(rand()) . '.pdf';
					 $html_code = '<link rel="stylesheet" type="text/css" href="css/register.css">';
					 $html_code .= $pdf;
					 $pdf = new Pdf();
					 $pdf->load_html($html_code);
					 $pdf->render();
					 $file = $pdf->output();
					 file_put_contents($file_name, $file);
					 

					//sent ivoice email 
					

					ob_start();
					include ('app/email_register_template.php');
					$body = ob_get_clean();
				
					$mail->setFrom($adminemail, "Cargo Convention");
					$mail->addAddress($toemail,"Admin Cargo Convention");
				
					$mail->AddCC($_SESSION['booking4'][0]['emailCom']);
					$mail->Subject = "Cargo Convention Registration ID:CC0".$booking_id;
					$mail->AddAttachment($file_name);  
					$mail->Body = $body;
					$mail->IsHTML(true);
					$mail->CharSet = 'UTF-8';
					$mail->send();
					$_SESSION['noti'] = "Email has been Sent!";
					unlink($file_name);
					header("location:book_done");
					break;
					case "news":
					
					if ($_GET['page']==''){$_GET['page']=1;}
						$page = ($_GET['page']-1)*8;
						$newslist = $database->select("news","*",["ORDER"=>["date_time"=>"DESC"],"status"=>"y","LIMIT"=>[$page,8]]);
						$allnews = $database->count("news","*",["status"=>"y"]);

						
					break;
					case "singlenews":
						$news = $database->get("news","*",["id"=>$_GET["id"]]);
						$right_news = $database->select("news","*",["id[!]"=>$_GET['id'],"status"=>'y',"LIMIT"=>4,"ORDER"=>["date_time"=>"DESC"]]);
						
					break;
					case "sendContact":

				    if($_POST['firstName'] != '' || $_POST['LastName'] != "" || $_POST['country'] != '' || $_POST['email'] || $_POST['phone']){
				    	$body = "Full Name : ".$_POST['firstName'];
				    	$body .= "<br>Country : ".$_POST['country'];
				    	$body .= "<br>Email : ".$_POST['email'];
				    	$body .= "<br>Phone : ".$_POST['phone'];
				    	$body .= "<br>Message : ".$_POST['con_message'];
				    $mail->setFrom($adminemail, "Cargo Convention");
					$mail->addAddress($toemail,"Admin Cargo Convention");
				
					// $mail->AddCC($_SESSION['booking4'][0]['emailCom']);
					$mail->Subject = "Cargo Convention Contact Form";
					
					$mail->Body = $body;
					$mail->IsHTML(true);
					$mail->CharSet = 'UTF-8';
					$mail->send();
					$_SESSION['noti'] = "Email has been Sent!";
					
				    }
				    header("location:contact");
				    break;
				    case "faq":
				    $faqs = $database->get("content","*",["name"=>'faq']);
				    break;
			
				}
				
				// end switch 

				include 'app/index.php';
		}
		//end if not admin

}
// end check admin



?>