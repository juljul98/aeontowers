<?php

namespace MABEL_WPUC\Code\Services {

	use MABEL_WPUC\Core\Common\Managers\Settings_Manager;

	class Currency_Service {

		public static function get_available_currencies(){
			return array(
				'AUD' => 'Australian Dollar (AUD)',
				'BRL' => 'Brazil Real (BRL)',
				'CAD' => 'Canada Dollar (CAD)',
				'CHF' => 'Switzerland Franc (CHF)',
				'CLP' => 'Chile Peso (CLP)',
				'CNY' => 'China Yuan Renminbi (CNY)',
				'CZK' => 'Czech Republic Koruna (CZK)',
				'DKK' => 'Denmark Krone (DKK)',
				'EUR' => 'Euro (EUR)',
				'GBP' => 'United Kingdom Pound (GBP)',
				'HKD' => 'Hong Kong Dollar (HKD)',
				'HUF' => 'HUngary Forint (HUF)',
				'IDR' => 'Indonesia Rupiah (IDR)',
				'ILS' => 'Israel Shekel (ILS)',
				'INR' => 'India Rupee (INR)',
				'JPY' => 'Japan Yen (JPY)',
				'KRW' => 'Korea (South) Won (KRW)',
				'MXN' => 'Mexico Peso (MXN)',
				'MYR' => 'Malaysia Ringgit (MYR)',
				'NOK' => 'Norway Krone (NOK)',
				'NZD' => 'New Zealand Dollar (NZD)',
				'PHP' => 'Philippines Peso (PHP)',
				'PKR' => 'Pakistan Rupee (PKR)',
				'PLN' => 'Poland Zloty (PLN)',
				'RUB' => 'Russia Ruble (RUB)',
				'SEK' => 'Sweden Krona (SEK)',
				'SGD' => 'Singapore Dollar (SGD)',
				'THB' => 'Thailand Baht (THB)',
				'TRY' => 'Turkey Lira (TRY)',
				'TWD' => 'Taiwan New Dollar (TWD)',
				'USD' => 'United States Dollar (USD)',
				'ZAR' => 'South Africa Rand (ZAR)'
			);
		}

		public static function currency_symbol($currency = 'USD',$html = true) {

			switch(strtoupper($currency)){
				case 'BRL': return $html ? 'R&dollar;' : 'R$';
				case 'CHF': return 'CHF';
				case 'CNY':
				case 'JPY': return $html ? '&yen;' : '¥';
				case 'CZK': return 'Kč';
				case 'DKK':
				case 'NOK':
				case 'SEK':
					return 'kr';
				case 'EUR': return $html ? '&euro;' : '€';
				case 'GBP': return $html ? '&pound;' : '£';
				case 'HUF': return 'Ft';
				case 'IDR': return 'Rp';
				case 'ILS': return $html? '&#8362;' : '₪';
				case 'INR': return $html? '&#x20b9;' : '₹';
				case 'KRW': return $html ? '&#8361;' : '₩';
				case 'MYR': return 'RM';
				case 'PHP': return $html? '&#8369;' : '₱';
				case 'PKR': return $html? '&#x20A8;' : '₨';
				case 'PLN': return 'zł';
				case 'RUB': return $html? '&#8381;' : '₽';
				case 'THB': return $html? '&#3647;' : '฿';
				case 'TRY': return $html? '&#x20ba;' : '₺';
				case 'TWD': return $html? 'NT&dollar;' : 'NT$';
				case 'ZAR': return 'R';

				default: return $html? '&dollar;' : '$';
			}

		}

	}
}