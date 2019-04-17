<?php
/**
 * Created by PhpStorm.
 * User: alikaviani
 * Date: 2019-04-17
 * Time: 13:01
 */

namespace Subzerobo\PHPActionWrapper;


interface HandlerInterface
{
    /**
     * Handles before parent Action
     *
     * @param        $parent
     * @param string $actionName
     * @param array  $actionData
     *
     * @return mixed
     * @author alikaviani <a.kaviani@sabavision.ir>
     * @since  2019-04-17 13:04
     */
    public function handleBefore($parent, string $actionName, array $actionData = []);

    /**
     * Handles before parent Action
     *
     * @param        $parent
     * @param string $actionName
     * @param array  $actionData
     *
     * @return mixed
     * @author alikaviani <a.kaviani@sabavision.ir>
     * @since  2019-04-17 13:04
     */
    public function handleAfter($parent, string $actionName, array $actionData = []);
}