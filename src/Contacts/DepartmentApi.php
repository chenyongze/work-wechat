<?php
/**
 * Created by PhpStorm.
 * Email: 1060656096@qq.com
 * User: zwei
 * Date: 2018-08-11
 * Time: 21:53
 */

namespace Yong\WorkWechat\Contacts;


use Yong\WorkWechat\ApiBase;
use Yong\WorkWechat\Exceptions\WorkWechatApiErrorCodeException;
use Yong\WorkWechat\Helpers\CommonHelper;

/**
 * 企业微信部门api
 *
 * Class DepartmentApi
 * @package Yong\WorkWechat\Contacts
 */
class DepartmentApi extends ApiBase implements DepartmentApiDefineInterface
{
    /**
     * @inheritdoc
     */
    public function create($accessToken, $name, $parentId = 1, $order = 1, $id = null)
    {
        $data = [
            'id' => $id,
            'name'  => $name,
            'parentid' => $parentId,
            'order' => $order,
        ];
        $data = CommonHelper::deleteArrayNullValue($data);
        $url = sprintf(self::URL_CREATE, $accessToken);
        $response = $this->client->request('POST', $url, [
            'verify' => $this->sslVerify,
            'json' => $data,
        ]);
        return $this->parseApiResult($response);
    }

    /**
     * @inheritdoc
     */
    public function update($accessToken, $id, $name, $parentId = null, $order = null)
    {
        $data = [
            'id' => $id,
            'name'  => $name,
            'parentid' => $parentId,
            'order' => $order,
        ];
        $data = CommonHelper::deleteArrayNullValue($data);
        $url = sprintf(self::URL_UPDATE, $accessToken);
        $response = $this->client->request('POST', $url, [
            'verify' => $this->sslVerify,
            'json' => $data,
        ]);
        return $this->parseApiResult($response);
    }
    /**
     * @inheritdoc
     */
    public function delete($accessToken, $id)
    {
        $url = sprintf(self::URL_DELETE, $accessToken, $id);
        $response = $this->client->request('get', $url, ['verify' => $this->sslVerify,]);
        return $this->parseApiResult($response);
    }
    /**
     * @inheritdoc
     */
    public function getList($accessToken, $id = 1)
    {
        $url = sprintf(self::URL_LIST, $accessToken, $id);
        $response = $this->client->request('get', $url, ['verify' => $this->sslVerify,]);
        return $this->parseApiResult($response);
    }

}