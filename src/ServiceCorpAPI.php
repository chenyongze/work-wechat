<?php
namespace Yong\WorkWechat;


class ServiceCorpAPI extends \ServiceCorpAPI
{
    public function setSuiteAccessToken($suiteAccessToken) {
        $this->suiteAccessToken = $suiteAccessToken;
    }
}