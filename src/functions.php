<?php

if (! function_exists('service')) {
    /**
     *  取得服务实例
     */
    function service($class)
    {
        $class = new \ReflectionClass($class);

        return $class->getShortName();
    }
}

if (! function_exists('publish')) {
    /**
     * 发布事件
     */
    function publish($class)
    {
        $class = new \ReflectionClass($class);
        return $class->getShortName();
    }
}
