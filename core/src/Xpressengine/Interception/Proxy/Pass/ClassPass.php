<?php
/**
 *  This file is part of the Xpressengine package.
 *
 * @category    Interception
 * @package     Xpressengine\Interception
 * @author      XE Team (developers) <developers@xpressengine.com>
 * @copyright   2015 Copyright (C) NAVER <http://www.navercorp.com>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        http://www.xpressengine.com
 */
namespace Xpressengine\Interception\Proxy\Pass;

use Xpressengine\Interception\Proxy\ProxyConfig;

/**
 * 타겟 클래스의 프록시 클래스 생성을 위해 필요한 코드를 생성할 때, 프록시 클래스의 선언부의 변환을 담당하는 클래스이다.
 *
 * @category    Interception
 * @package     Xpressengine\Interception
 * @author      XE Team (developers) <developers@xpressengine.com>
 * @license     http://www.gnu.org/licenses/lgpl-3.0-standalone.html LGPL
 * @link        http://www.xpressengine.com
 */
class ClassPass implements Pass
{
    /**
     * 주어진 프록시 클래스 템플릿 코드의 클래스 선언부를 변환한다.
     *
     * @param string      $code   프록시 클래스 탬플릿 코드
     * @param ProxyConfig $config 동적으로 생성하려는 프록시 클래스 정보
     *
     * @return string
     */
    public function apply($code, ProxyConfig $config)
    {
        $code = str_replace(
            'class Proxy',
            'class '.$config->getProxyName().' extends '.$config->getTargetName(),
            $code
        );

        return $code;
    }
}
