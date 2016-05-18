<?php
namespace xj\dbreconnect\base;

/**
 * Base Connection
 * @author xjflyttp<xjflyttp@gmail.com>
 */
class Connection extends \yii\db\Connection implements IReconnect
{
    /**
     * @var string
     */
    public $commandClass = 'xj\dbreconnect\base\Command';

    /**
     * @var int
     */
    public $reconnectMaxCount = 3;

    /**
     * @var int
     */
    public $reconnectCurrentCount = 0;

    /**
     * @return array
     */
    public function getReconnectCodeOptions()
    {
        return [];
    }

    /**
     * @return bool
     */
    public function isMaxReconnect()
    {
        return $this->reconnectCurrentCount >= $this->reconnectMaxCount;
    }

    /**
     * Reset Reconnect Counter
     */
    public function resetReconnectCount()
    {
        $this->reconnectCurrentCount = 0;
    }

    /**
     * Increment Reconnect Counter
     */
    public function incrementReconnectCount()
    {
        $this->reconnectCurrentCount += 1;
    }

    /**
     * @param string $message
     * @return bool
     */
    public function isReconnectErrMsg($message)
    {
        $errorOptions = static::getReconnectCodeOptions();
        foreach ($errorOptions as $errCode => $errMsg) {
            if (false !== stripos($message, $errMsg)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     */
    public function reconnect()
    {
        $this->close();
        $this->open();
    }
}