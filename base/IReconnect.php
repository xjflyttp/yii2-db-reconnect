<?php
namespace xj\dbreconnect\base;

/**
 * Interface IReconnect
 * @author xjflyttp<xjflyttp@gmail.com>
 */
interface IReconnect
{
    public function getReconnectCodeOptions();

    public function isMaxReconnect();

    public function resetReconnectCount();

    public function incrementReconnectCount();

    public function isReconnectErrMsg($message);

    public function reconnect();
}