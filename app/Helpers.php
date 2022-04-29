<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('uploadFile')) {
    function uploadFile($file = '', $path = '')
    {
        if (!empty($file) && !empty($path)) {

            $fileInfo = $file->getClientOriginalName();

            $fileName = pathinfo($fileInfo, PATHINFO_FILENAME);
            $fileName = str_replace(' ', '-', strtolower($fileName));
            if (mb_detect_encoding($fileName) != 'UTF-8') {
                $fileName = preg_replace('/[^A-Za-z0-9\-]/', '', $fileName);
            }

            $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);

            $filename = $fileName . '-' . floor(microtime(true)) . '.' . $extension;

            if (!is_dir($path)) mkdir($path, 0700, true);

            $file->move($path, $filename);

            return $path . '/' . $filename;
        }

        return '';
    }
}

if (!function_exists('strSlug')) {
    function strSlug($text = '')
    {
        if (!empty($text)) {

            $text = trim($text);

            if (mb_detect_encoding($text) == 'UTF-8') {
                $text = str_replace(' ', '-', $text);

            } else {
                $text = str_replace(' ', '-', strtolower($text));
            }
        }
        return $text;
    }
}

if (!function_exists('strFilter')) {
    function strFilter($text = '', $remove = '_')
    {
        if (!empty($text)) {

            $text = str_replace($remove, ' ', $text);

            if (mb_detect_encoding($text) == 'UTF-8') {
                $text = $text;
            } else {
                $text = ucwords($text);
            }
        }
        return $text;
    }
}

if (!function_exists('strLimit')) {
    function strLimit($input_string = '', $limit = 15, $link = '')
    {
        $string = '';
        if (!empty($input_string) && !empty($limit)) {

            $filterString = strip_tags($input_string);
            $wordArray    = explode(' ', $filterString);
            $wordCount    = count($wordArray) - 1;
            $limit        = $limit - 1;

            $limit = ($wordCount > $limit ? $limit : $wordCount);

            for ($i = 0; $i <= $limit; $i++) {
                $string .= $wordArray[$i];
                $string .= ($wordCount > $limit && $i == $limit ? '....' : ' ');
            }

            if (!empty($link) && $wordCount > $limit) {
                $string .= $link;
            }
        }
        return $string;
    }
}

if (!function_exists('numFilter')) {
    function numFilter($number = '', $digit = 2)
    {
        if (!empty($number)) {

            $number = trim($number);

            if (mb_detect_encoding($number) == 'UTF-8') {
                $number = $number;
            } else {
                $number = number_format($number, $digit);
            }
        }
        return $number;
    }
}

if (!function_exists('partyBalance')) {
    function partyBalance($party_id, $tran_id = null)
    {
        $data = [
            'id'              => '',
            'name'            => '',
            'initial_balance' => 0,
            'debit'           => 0,
            'credit'          => 0,
            'remission'       => 0,
            'commission'      => 0,
            'balance'         => 0,
            'status'          => 'Receivable',
        ];

        if (!empty($party_id)) {

            if (!empty($tran_id)) {
                $tranInfo = DB::select("SELECT parties.id, parties.name, parties.initial_balance, IFNULL(party_transactions.debit, 0) AS debit, IFNULL(party_transactions.credit, 0) AS credit, IFNULL(party_transactions.remission, 0) AS remission, IFNULL(party_transactions.commission, 0) AS commission FROM ( SELECT id, name, mobile, initial_balance FROM parties WHERE id='$party_id' AND deleted_at IS null )parties LEFT JOIN( SELECT party_id, SUM(debit) AS debit, SUM(credit) AS credit, SUM(remission) AS remission, SUM(commission) AS commission FROM party_transactions WHERE id < '$tran_id' AND deleted_at IS null GROUP BY party_id )party_transactions ON parties.id=party_transactions.party_id");
            } else {
                $tranInfo = DB::select("SELECT parties.id, parties.name, parties.initial_balance, IFNULL(party_transactions.debit, 0) AS debit, IFNULL(party_transactions.credit, 0) AS credit, IFNULL(party_transactions.remission, 0) AS remission, IFNULL(party_transactions.commission, 0) AS commission FROM ( SELECT id, name, mobile, initial_balance FROM parties WHERE id='$party_id' AND deleted_at IS null )parties LEFT JOIN( SELECT party_id, SUM(debit) AS debit, SUM(credit) AS credit, SUM(remission) AS remission, SUM(commission) AS commission FROM party_transactions WHERE deleted_at IS null GROUP BY party_id )party_transactions ON parties.id=party_transactions.party_id");
            }

            if (!empty($tranInfo)) {

                $balance = $tranInfo[0]->debit - $tranInfo[0]->credit + $tranInfo[0]->remission + $tranInfo[0]->commission + $tranInfo[0]->initial_balance;

                $data['id']              = $tranInfo[0]->id;
                $data['name']            = $tranInfo[0]->name;
                $data['initial_balance'] = $tranInfo[0]->initial_balance;
                $data['debit']           = $tranInfo[0]->debit;
                $data['credit']          = $tranInfo[0]->credit;
                $data['remission']       = $tranInfo[0]->remission;
                $data['commission']      = $tranInfo[0]->commission;
                $data['balance']         = $balance;
                $data['status']          = ($balance < 0 ? 'Payable' : 'Receivable');
            }
        }

        return (object)$data;
    }
}

if (!function_exists('strEncode')) {
    function strEncode($string = null)
    {
        if (!empty($string)) {
            return base64_encode($string);
        }
    }
}

if (!function_exists('strDecode')) {
    function strDecode($string = null)
    {
        if (!empty($string)) {
            return base64_decode($string);
        }
    }
}

if (!function_exists('settings')) {
    function settings()
    {
        $settings = DB::table('settings')->get();
        $data     = [];
        if (!empty($settings)) {
            foreach ($settings as $key => $value) {
                if (!empty($value)) {
                    $data[$value->meta_key] = $value->meta_value;
                }
            }
        }
        return (object)$data;
    }
}

if (!function_exists('imageGallery')) {
    function imageGallery()
    {
        $results = DB::table('media')->where('media_type', 'image')->select('title', 'avatar')->limit(6)->get();
        return $results;
    }
}
