<?php

namespace app\provider;

class JdMQ
{
    private $url;
    public function __construct()
    {
        $this->url = "https://jcq-shared-004-httpsrv-pub-nlb-FI.jvessel-open-hb.jdcloud.com:443";
    }

    public function ct_order_create()
    {
        $topic = "***";
        $consumerGroupId = "***";
        $url = $this->url . "/v2/messages?topic=" . $topic . "&consumerGroupId=" . $consumerGroupId . "&size=1";
        // $topic = "open_message_internet_test";
        // $url = "http://jcq-internet-001-httpsrv-nlb-FI.jvessel-open-hb.jdcloud.com:8080/v2/messages?topic=" . $topic . "&consumerGroupId=" . $consumerGroupId . "&size=1";
        $dateTime = gmdate("Y-m-d\TH:i:s\Z");
        $headers[] = 'accessKey: ' . config('config.jd.AccessKey');
        $headers[] = 'dateTime: ' . $dateTime;
        $data['accessKey'] = config('config.jd.AccessKey');
        $data['dateTime'] = $dateTime;
        $data['topic'] = $topic;
        $data['consumerGroupId'] = $consumerGroupId;
        $data['size'] = 1;
        $headers[] = 'signature: ' . $this->getSignature($data);
        $get = $this->postData($url, $headers);
        return json_decode($get, true);
    }

    public function success_ct_order_create($ackIndex)
    {
        $topic = "****";
        $consumerGroupId = "****";
        $url = $this->url . "/v2/ack";

        $dateTime = gmdate("Y-m-d\TH:i:s\Z");

        $post['topic'] = $topic;
        $post['consumerGroupId'] = $consumerGroupId;
        $post['ackAction'] = 'SUCCESS';
        $post['ackIndex'] = $ackIndex;

        $data['accessKey'] = config('config.jd.AccessKey');
        $data['dateTime'] = $dateTime;

        $headers[] = 'Content-Type: application/json';
        $headers[] = 'accessKey: ' . config('config.jd.AccessKey');
        $headers[] = 'dateTime: ' . $dateTime;

        $headers[] = 'signature: ' . $this->getSignature(array_merge($data, $post));
        $get = $this->postData($url, $headers, $post);
        return json_decode($get, true);
    }
    protected function getSignature($params)
    {
        ksort($params);
        $buff = "";
        $signSource = "";
        foreach ($params as $k => $v) {
            $buff .= $k . "=" . $v . "&";
        }
        if (strlen($buff) > 0) {
            $signSource = substr($buff, 0, strlen($buff) - 1);
        }
        return $this->hmac_sha1($signSource, config('config.jd.SecretKey'));
    }
    protected function postData($url, $headers = array(), $data = '')
    {
        $ch = curl_init();
        $timeout = 300;
        curl_setopt($ch, CURLOPT_URL, $url);
        if ($data) {
            $data_string = json_encode($data);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        if (count($headers) > 0) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        $handles = curl_exec($ch);
        curl_close($ch);
        // $handles = trim($handles, chr(239) . chr(187) . chr(191) . PHP_EOL);
        return $handles;
    }
    function hmac_sha1($str, $key)
    {
        $signature = "";
        if (function_exists('hash_hmac')) {
            $signature = base64_encode(hash_hmac("sha1", $str, $key, true));
        } else {
            $blocksize = 64;
            $hashfunc = 'sha1';
            if (strlen($key) && $blocksize) {
                $key = pack('H*', $hashfunc($key));
            }
            $key = str_pad($key, $blocksize, chr(0x00));
            $ipad = str_repeat(chr(0x36), $blocksize);
            $opad = str_repeat(chr(0x5c), $blocksize);
            $hmac = pack(
                'H*',
                $hashfunc(
                    ($key ^ $opad) . pack(
                        'H*',
                        $hashfunc(
                            ($key ^ $ipad) . $str
                        )
                    )
                )
            );
            $signature = base64_encode($hmac);
        }
        return $signature;
    }
}
