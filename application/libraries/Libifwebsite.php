<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libifwebsite {
	protected $CI;

	public function __construct() {
        $this->CI =& get_instance();
	}

	public function namaweb() {
		$site = $this->CI->webconfigms->ifsqlselectlisting();
		return $site->namaweb;
	}

	public function logo() {
		$site 	= $this->CI->webconfigms->ifsqlselectlisting();
		$logo 	= base_url('assets/upload/image/'.$site->logo);
		return $logo;
	}

	public function icon() {
		$site 	= $this->CI->webconfigms->ifsqlselectlisting();
		$icon 	= base_url('assets/upload/image/'.$site->icon);
		return $icon;
	}

	public function romawi($bulan) {
		if ($bulan=='01') {
			$romawi = 'I';
		} elseif($bulan=='02') {
			$romawi = 'II';
		} elseif($bulan=='03') {
			$romawi = 'III';
		} elseif($bulan=='04') {
			$romawi = 'IV';
		} elseif($bulan=='05') {
			$romawi = 'V';
		} elseif($bulan=='06') {
			$romawi = 'VI';
		} elseif($bulan=='07') {
			$romawi = 'VII';
		} elseif($bulan=='08') {
			$romawi = 'VIII';
		} elseif($bulan=='09') {
			$romawi = 'IX';
		} elseif($bulan=='10') {
			$romawi = 'X';
		} elseif($bulan=='11') {
			$romawi = 'XI';
		} elseif($bulan=='12') {
			$romawi = 'XII';
		}
		return $romawi;
	}
}