<?php

namespace App\utils;
use Illuminate\Http\Request;
use App\NewsPost;
use DB;
session_start();

/**
 * Usage in other classes
 * copy this line to the class:   use App\utils\libUtils;
 * Use can then call it statistically like ADM_UTIL::function
 */
class libUtils {
    public $message;
    public $view;

    // -------------------------------------------------------------
    public function __construct()
    {
        $this->message = '';
        $this->view = '';
    }
    
    // -------------------------------------------------------------
    public function spacer()
    {
        $spacer = '<div class="clr"></div>';
        return $spacer;
    }
    
    public static function messageBox($message,$catG)
    {
        if($catG == '2') {
            $mID = 'alert-success"><span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></i></span>&nbsp;<strong>Success!&nbsp;</strong>';
        } elseif($catG == '0') {
            $mID = 'alert-danger"><span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>&nbsp;<strong>Error!&nbsp;</strong>';
        } elseif($catG == '1') {
            $mID = 'alert-warning"> <span class="vd_alert-icon"><i class="fa fa-exclamation-triangle vd_yellow"></i></span>&nbsp;<strong>Warning!&nbsp;</strong>';
        } elseif($catG == '3') {
            $mID = 'alert-warning"> <span class="vd_alert-icon"><i class="fa fa-exclamation-triangle vd_yellow"></i></span>&nbsp;<strong>Notice!&nbsp;</strong>';
        } else {
            $mID = '">';
        }        
        $message = '<div class="alert '.$mID.''.$message.'</div>';
        return $message;
    }
    // -------------------------------------------------------------------
    public static function Message($data)
    {
        $mID = 'message';
        $mTTLE = 'Message &raquo; &nbsp;';
        $message = '
            <div class="alert alert-success"><span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></i></span>&nbsp;<strong>Success!&nbsp;</strong> '.$data.'</div>';
        return $message;
    }
    
    // --------------------------------------------------------------------
    
    public function noticeMssg($data)
    {
        $mID = 'notice';
        $mTTLE = 'Notice &raquo; &nbsp;';
        $message = '
            <dl id="system-message">
                <dt class="message"></dt>
                    <dd class="message '.$mID.'">
                        <b>'.$mTTLE.'</b>  '.$data.'
                    </dd>
            </dl>';
        return $message;
    }
    
    // ---------------------------------------------------------------------
    public function errorMssg($data)
    {
        $mID = 'error';
        $mTTLE = 'Error!!! &raquo; ';
        
        $message = '
            <dl id="system-message">
                <dt class="message"></dt>
                    <dd class="message '.$mID.'">
                        <b>'.$mTTLE.'</b>  '.$data.'
                    </dd>
            </dl>';
        return $message;
    }
   
    public function logout()
    {
        return 'logout';
    }        
    
    public function eMail_valid($mail)
    {        
        if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $mail)) { 
            return 1;
        } else {
            return 0;
        }
    }
    
    public function phoneNo_valid($number)
    {
        if(ereg("^[0-9]{11}$", $number)) {
            return 1;
        } else {
            return 0;
        }
    }
        
    public function date_validation ($varDate)
    {
        if(ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $varDate, $varDateRegs)) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function random_generator($digits)
    {
        srand ((double) microtime() * 10000000);
        //Array of alphabets
        $input = array ("A", "B", "C", "D", "E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
        
        $random_generator="";// Initialize the string to store random numbers
        for($i=1; $i<$digits+1; $i++) { 
            // Loop the number of times of required digits
            
            if(rand(1, 2) == 1) {
                // to decide the digit should be numeric or alphabet
                // Add one random alphabet
                $rand_index = array_rand($input);
                $random_generator .=$input[$rand_index]; // One char is added
                
            } else {
                
                // Add one numeric digit between 1 and 10
                $random_generator .= rand(1, 10); // one number is added
            } // end of if else
            
        } // end of for loop

        return $random_generator;
    } // end of function

    
    public function get_time_difference( $start, $end )
    {
        $uts['start'] = strtotime( $start );
        $uts['end'] = strtotime( $end );
        if($uts['start']!==-1 && $uts['end']!==-1) {
            if($uts['end'] >= $uts['start']) {
                $diff    =    $uts['end'] - $uts['start'];
                if($days=intval((floor($diff/86400)))) {
                    $diff = $diff % 86400;
                }
                if($hours=intval((floor($diff/3600)))) {
                    $diff = $diff % 3600;
                }
                if($minutes=intval((floor($diff/60)))) {
                    $diff = $diff % 60;
                }
                $diff = intval( $diff );            
                return( array('days'=>$days, 'hours'=>$hours, 'minutes'=>$minutes, 'seconds'=>$diff) );
            } else {
                trigger_error( "Ending date/time is earlier than the start date/time", E_USER_WARNING );
            }
        } else {
            trigger_error( "Invalid date/time data detected", E_USER_WARNING );
        }
        return( false );
    }
    
    public function getTimeDateDiff($dateTime,$endDate)
    {
        $start = $dateTime;
        $endDate==''?$end = date('Y-m-d H:i:s'):$endDate=$end;
        //echo "start = ".$start." <br> stop = ".$end;
        $result = $this->get_time_difference($start, $end);
        
        if(is_array($result)) {
            if($result['days'] != '' || $result['days'] != 0) {
                $rDt .= $result['days'].' day(s)';
            }else if($result['hours'] != '' || $result['hours'] != 0) {
                $rDt .= $result['hours'].' hour(s)';
            }else if($result['minutes'] != '' || $result['minutes'] != 0) {
                $rDt .= $result['minutes'].' minute(s)';
            }else if($result['seconds'] != '' || $result['seconds'] != 0) {
                $rDt .= $result['seconds'].' second(s)';
            }
            $rDt .= ' ago';
        }
        return $rDt;    
    }
    
    public function unhtmlentities($string)
    {
        // replace numeric entities
        $string = preg_replace('~&#x([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $string);
        $string = preg_replace('~&#([0-9]+);~e', 'chr("\\1")', $string);
        // replace literal entities
        $trans_tbl = get_html_translation_table(HTML_ENTITIES);
        $trans_tbl = array_flip($trans_tbl);
        return strtr($string, $trans_tbl);
    }    
        
    public function sendEmail($to,$mssg,$subjt)
    {
        $message = $mssg;
        /* To send HTML mail, you can set the Content-type header. */
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        /* additional headers */
        $headers .= "To: <".$to.">\r\n";
        $headers .= "From: <{$_SERVER['SERVER_NAME']}>\r\n";
        $headers .= "Cc: info@{$_SERVER['SERVER_NAME']}\r\n";
        $headers .= "Bcc: info@{$_SERVER['SERVER_NAME']}\r\n";
        $headers .= "Reply-To: info@{$_SERVER['SERVER_NAME']}\r\n";
        $headers .= "Return-Path: info@{$_SERVER['SERVER_NAME']}\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        /* and now mail it */
        $conf = @mail($to, $subjt, $message, $headers);
        return $conf;
    }
    
    public function dateDiffVal($d1,$d2,$dT)
    {
        $date1 = new DateTime($d1);
        $date2 = new DateTime($d2);
        $interval = $date1->diff($date2);
        switch($dT) {
            case 'y':
                $years = $interval->format('%y');
                return $years;
            break;
            case 'm':
                $months = $interval->format('%m');
                return $months;
            break;
            case 'd':
                $days = $interval->format('%d');
                return $days;
            break;
        }
    }
    
    public function asteriks()
    {
        return "<span class='asteriks' style='color:red'>* </span>";    
    }
    public function naira()
    {
        return '(<span class="naira">N</span>)';    
    }
    
    public function formTable()
    {
        return $this->tabClassDsip.'width="100%" border="0" cellspacing="3" cellpadding="3"';
    }
    
    public function excapeCurrency($value) 
    {
        return str_replace(',', '', $value);    
    }
    public function currecyFormat($value) 
    {
        return number_format($value, 2);    
    }
    
    public function getYearDifference($date1, $date2) 
    {
        $date1 = strtotime($date1);
        $date2 = strtotime($date2);
        $year = 0;
        while($date2 > $date1 = strtotime('+1 year', $date1)) {
            ++$year;
        }
        return $year;
    }
    
    public function getExcelAlpha() 
    {
        $alpAray = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ');  
        return $alpAray;
    }
    
    
    public function clean_text($text) 
    {
        return $this->RemoveBS(html_entity_decode(preg_replace('/%u([a-fA-F0-9]{4})/', '&#x\\1;', $text), ENT_QUOTES));
    }
    public function RemoveBS($Str) 
    {
        $StrArr = str_split($Str); 
        $NewStr = '';
        foreach ($StrArr as $Char) {
            $CharNo = ord($Char);
            if ($CharNo == 163) { 
                $NewStr .= $Char; 
                continue; 
            } // keep £
            if ($CharNo > 31 && $CharNo < 127) {
                $NewStr .= $Char;
            }
        }
        return $NewStr;
    }
    public function clean_text_js($text) 
    {
        return addslashes(htmlspecialchars($this->clean_text($text)));
    }
}