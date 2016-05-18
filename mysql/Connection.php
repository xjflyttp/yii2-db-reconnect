<?php
namespace xj\dbreconnect\mysql;

/**
 * 定义连接丢失的错误类型
 * @author xjflyttp<xjflyttp@gmail.com>
 */
class Connection extends \xj\dbreconnect\base\Connection
{
    /**
     * @see http://dev.mysql.com/doc/refman/5.7/en/error-messages-client.html#error_cr_server_gone_error
     */
    const CR_SERVER_GONE_ERROR = 2006;

    /**
     * @see http://dev.mysql.com/doc/refman/5.7/en/error-messages-client.html#error_cr_server_lost
     */
    const CR_SERVER_LOST = 2013;

    /**
     * @return array
     */
    public function getReconnectCodeOptions()
    {
        return [
            self::CR_SERVER_GONE_ERROR => 'server has gone away',
            self::CR_SERVER_LOST => 'Lost connection',
        ];
    }
}