<?php 
  function ifceksessionuser() {
	  $ci = & get_instance();
	  $session = $ci->session->userdata('user_level');
	  if ($session == '') {
		  redirect(base_url());
	  }
  }

  function ifnamahari($tchari) {
    //  $lcdate = date('Y-m-d h:i:s a');
    //  ifnamahari($lcdate);
    $tchari = ifshowhari(date('w'));
    return $tchari;
  }

  function ifshowhari($tcnamahari) {
    switch($tcnamahari) {
      case 0 :
          return 'Minggu';
          break;

      case 1 :
          return 'Senin';
          break;

      case 2 :
          return 'Selasa';
          break;

      case 3 :
          return 'Rabu';
          break;

      case 4 :
          return 'Kamis';
          break;
      
      case 5 :
          return "Jum'at";
          break;
              
      case 6 :
          return 'Sabtu';
          break;
    }  
  }

  function ifshowtanggal($tdtgl) {
    //  $lcdate = date('Y-m-d h:i:s a');
    //  ifshowtanggal($lcdate);
    $ldtanggal = substr($tdtgl, 8, 2);
    $lcbulan = ifnamabulan(substr($tdtgl, 5, 2));
    $lntahun = substr($tdtgl, 0, 4);
    return $ldtanggal.' '.$lcbulan.' '.$lntahun; 
  }

  function ifnamabulan($tcnamabulan) {
    switch($tcnamabulan) {
      case 1 :
          return 'Januari';
          break;

      case 2 :
          return 'Februari';
          break;

      case 3 :
          return 'Maret';
          break;

      case 4 :
          return 'April';
          break;
      
      case 5 :
          return "Mei";
          break;
              
      case 6 :
          return 'Juni';
          break;
 
      case 7 :
          return 'Juli';
          break;
     
      case 8 :
          return 'Agustus';
          break;
  
      case 9 :
          return 'September';
          break;

      case 10 :
          return 'Oktober';
          break;
        
      case 11 :
          return 'November';
          break;

      case 12 :
          return 'Desember';
          break;
    }  
  }

  function ifshowgetip() {
    // echo "<h2 alignment=\"center\">ip address : ".ifshowgetip()." ";
    if (isset($_SERVER)) {
      if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];

      if (isset($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];
      return $_SERVER['REMOTE_ADDR'];
    }
    
    if (getenv('HTTP_X_FORWARDED_FOR'))
        return getenv('HTTP_X_FORWARDED_FOR'); 
    
    if (getenv('HTTP_CLIENT_IP'))
        return getenv('HTTP_CLIENT_IP');
    return getenv('REMOTE_ADDR');
  }

  function ifmsgalert($tcmsg) {
    echo '<script type="text/javascript">alert("' . $tcmsg . '")</script>';
  }

  function ifstriptags($str){
    return strip_tags(htmlentities($str, ENT_QUOTES, 'UTF-8'));
  }

  // untuk chek hak akses pada modul dokumen 
  function ifchecked_haksesmodul($tciduser, $tcidmenu){
    $ci = get_instance();
    $ci->db->where('user_kode', $tciduser);
    $ci->db->where('dok_nosop', $tcidmenu);
    $data = $ci->db->get('sop_ifmdokumenuser');
    if ($data->num_rows() > 0) {
        return "checked='checked'";
    }
  }

  function alertbox($class, $title, $description){
    return '<div class="alert '.$class.' alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> '.$title.'</h4>
                '.$description.'
              </div>';
  }


  
    function tgl_indo($tgl){
        $tanggal = substr($tgl,8,2);
        $bulan = getBulan(substr($tgl,5,2));
        $tahun = substr($tgl,0,4);
        return $tanggal.' '.$bulan.' '.$tahun;       
    }

    function tgl_indoo($tgl){
        $bulan = getBulan(substr($tgl,0,2));
        $tahun = substr($tgl,3,4);
        return $bulan.' '.$tahun;       
    }

    function tgl_slash($tgl){
        $tanggal = substr($tgl,8,2);
        $bulan = substr($tgl,5,2);
        $tahun = substr($tgl,0,4);
        return $tanggal.'/'.$bulan.'/'.$tahun;       
    } 

    function tgl_grafik($tgl){
        $tanggal = substr($tgl,8,2);
        $bulan = getBulan(substr($tgl,5,2));
        $tahun = substr($tgl,0,4);
        return $tanggal.'_'.$bulan;       
    }   

    function tgl_standard($tgl){
        $tanggal = substr($tgl,0,2);
        $bulan = substr($tgl,3,2);
        $tahun = substr($tgl,6,9);
        return $tahun.'-'.$bulan.'-'.$tanggal;       
    } 

    function seo_title($s) {
        $c = array (' ');
        $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','–');
        $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
        $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
        return $s;
    }

    function hari_ini($w){
        $seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $hari_ini = $seminggu[$w];
        return $hari_ini;
    }

    function rupiah($total){
      if(is_numeric($total)==false){
        return 0;
      }elseif(trim($total)!=''){
        return number_format($total,0);
      }elseif(trim($total)==''){
        return 0;
      }else{
        return 0;
      }
    }

    function getBulan($bln){
                switch ($bln){
                    case 1: 
                        return "Januari";
                        break;
                    case 2:
                        return "Februari";
                        break;
                    case 3:
                        return "Maret";
                        break;
                    case 4:
                        return "April";
                        break;
                    case 5:
                        return "Mei";
                        break;
                    case 6:
                        return "Juni";
                        break;
                    case 7:
                        return "Juli";
                        break;
                    case 8:
                        return "Agustus";
                        break;
                    case 9:
                        return "September";
                        break;
                    case 10:
                        return "Oktober";
                        break;
                    case 11:
                        return "November";
                        break;
                    case 12:
                        return "Desember";
                        break;
                }
            } 

function cek_terakhir($datetime, $full = false) {
		$today = time();    
                 $createdday= strtotime($datetime); 
                 $datediff = abs($today - $createdday);  
                 $difftext="";  
                 $years = floor($datediff / (365*60*60*24));  
                 $months = floor(($datediff - $years * 365*60*60*24) / (30*60*60*24));  
                 $days = floor(($datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));  
                 $hours= floor($datediff/3600);  
                 $minutes= floor($datediff/60);  
                 $seconds= floor($datediff);  
                 //year checker  
                 if($difftext=="")  
                 {  
                   if($years>1)  
                    $difftext=$years." Tahun";  
                   elseif($years==1)  
                    $difftext=$years." Tahun";  
                 }  
                 //month checker  
                 if($difftext=="")  
                 {  
                    if($months>1)  
                    $difftext=$months." Bulan";  
                    elseif($months==1)  
                    $difftext=$months." Bulan";  
                 }  
                 //month checker  
                 if($difftext=="")  
                 {  
                    if($days>1)  
                    $difftext=$days." Hari";  
                    elseif($days==1)  
                    $difftext=$days." Hari";  
                 }  
                 //hour checker  
                 if($difftext=="")  
                 {  
                    if($hours>1)  
                    $difftext=$hours." Jam";  
                    elseif($hours==1)  
                    $difftext=$hours." Jam";  
                 }  
                 //minutes checker  
                 if($difftext=="")  
                 {  
                    if($minutes>1)  
                    $difftext=$minutes." Menit";  
                    elseif($minutes==1)  
                    $difftext=$minutes." Menit";  
                 }  
                 //seconds checker  
                 if($difftext=="")  
                 {  
                    if($seconds>1)  
                    $difftext=$seconds." Detik";  
                    elseif($seconds==1)  
                    $difftext=$seconds." Detik";  
                 }  
                 return $difftext;  
	}


function terbilang($x){
  $abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return Terbilang($x - 10) . " Belas";
  elseif ($x < 100)
    return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);
  elseif ($x < 200)
    return " Seratus" . Terbilang($x - 100);
  elseif ($x < 1000)
    return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);
  elseif ($x < 2000)
    return " Seribu" . Terbilang($x - 1000);
  elseif ($x < 1000000)
    return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);
  elseif ($x < 1000000000)
    return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);
}

?>