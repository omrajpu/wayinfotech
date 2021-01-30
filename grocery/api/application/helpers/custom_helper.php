<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
	function activate_menu($controller){
	    $CI = get_instance();
	    $class = $CI->router->fetch_class();
	    return ($class == $controller) ? 'active' : '';
	}

   function valid_email($str){
		return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
    }
	
  function phpmailer($host,$username,$password,$port,$from_email,$from_name,$to_email,$to_name=NULL,$attachment=NULL,$subject,$body)
     {
	$CI = &get_instance();
	$CI->load->library("PhpMailerLib");
    $mail = $CI->phpmailerlib->load();
	try { 
		    //Server settings
		    $mail->SMTPDebug = 0;   
		    $mail->isMail();       
		    $mail->Host = $host;  
		    $mail->SMTPAuth = true;         
		    $mail->Username = $username;    
		    $mail->Password = $password;   
		    $mail->SMTPSecure = 'tls';   
		    $mail->Port = $port;            
		    $mail->setFrom($from_email, $from_name);
		    $mail->addAddress($to_email);               
		    if($attachment!=NULL){
				$mail->addAttachment($attachment);        
			}
		
		    //Content
		    $mail->isHTML(true);                                  
		    $mail->Subject = $subject;
		    $mail->Body    = $body;  
		    $mail->send();
		    #echo 'Message has been sent'; echo "<br><br>";
		    return 1;
		}catch(Exception $e){
		    //echo 'Message could not be sent.';
		    return 0;
		}
   }
   
   function random($length = 6){      
	    $chars = 'bcdfghkmnprstvwxzaeu123456789';
	    $result = '';
	    for ($p = 0; $p < $length; $p++){
	        $result .= ($p%2) ? $chars[mt_rand(19, 23)] : $chars[mt_rand(0, 18)];
	    }

	    return $result;
	}
	
	function encryptor($action, $string) {
	    $output = false;
	    $encrypt_method = "AES-256-CBC";
	    @$secret_key = SECRET_KEY;
	   @$secret_iv = SECRET_IV;
	    $key = hash('sha256', $secret_key);
	    $iv = substr(hash('sha256', $secret_iv), 0, 16);

	    if( $action == 'encrypt' ) {
	        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	        $output = base64_encode($output);
	    }
	    else if( $action == 'decrypt' ){
	        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	    }

	    return $output;
	}
function getProductVinfo($pid){
		$DB = & DB();
		
		$insArr = array();
		$query = $DB->query("SELECT p2.id FROM `fp_products` as p1 RIGHT JOIN fp_products as p2 ON p1.model_name=p2.model_name WHERE (p1.id='$pid' AND p1.status='1' AND p2.status='1')");
		$ids = $query->result_array();
		
		foreach($ids as $dkey=>$dval){
			$insArr[] = $dval['id'];
		}
		$ins = "'".str_replace(",","','",implode(',',$insArr))."'";
		
		$vquery = $DB->query("SELECT pid,variant,variant_val FROM `fp_product_variant` WHERE pid IN ($ins) GROUP BY variant_val ORDER BY pid");
		$vrows = $vquery->result_array();
		$arr = array();
		foreach($vrows as $key=>$val){
			$arr[$val['variant']][] = array($val['pid']=>$val['variant_val']);
		}
		
		$barr = array(); $barr1 = array(); $barr2 = array();
		foreach($arr as $key=>$val){
			 $barr1 = array(); $barr2 = array(); 
			foreach($val as $vkey=>$vval){
				foreach($vval as $v2key=>$v2val){
					$barr1[] = $v2key;
					$barr2[] = $v2val;
				    }
			      }
			    $barr[$key]  = array_combine($barr1 , $barr2);
		      }
	      ksort($barr);
	      return $barr;
	}
	
	function chkSubcategory($catid,$status){
		$DB = & DB();
		$query = $DB->query("SELECT * FROM fp_subcategory WHERE catid='$catid' AND status='$status'");
		return $query->num_rows();
	}
	
	function getSubcategory($catid,$status){
		$DB = & DB();
		$query = $DB->query("SELECT * FROM fp_subcategory WHERE catid='$catid' AND status='$status'");
		return $query->result_array();
	}
	
	function chkChildcategory($catid,$subid,$status){
		$DB = & DB();
		$query = $DB->query("SELECT * FROM fp_childcategory WHERE (catid='$catid' AND subid='$subid' AND status='$status')");
		return $query->num_rows();
	}
	
	function chkChildRowCat($catid,$status){
		$DB = & DB();
		$query = $DB->query("SELECT * FROM fp_childcategory WHERE (catid='$catid' AND status='$status')");
		return $query->num_rows();
	}
	
	function getChildcategory($catid,$subid,$status){
		$DB = & DB();
		$query = $DB->query("SELECT * FROM fp_childcategory WHERE (catid='$catid' AND subid='$subid' AND status='$status')");
		return $query->result_array();
	}
	
	function setPname($str){
		if(strlen($str)>22){
			return substr($str,0,22).'...';
		}else{
			return $str;
		}
	}
	
?>
