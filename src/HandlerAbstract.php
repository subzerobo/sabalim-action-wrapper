<?php
/**
 * Created by PhpStorm.
 * User: alikaviani
 * Date: 2019-04-17
 * Time: 13:05
 */

namespace Subzerobo\PHPActionWrapper;


abstract class HandlerAbstract implements HandlerInterface
{
    /**
     * Data Store
     *
     * @var array
     */
    protected $dataStore;

    /**
     * Save data in store using key
     *
     * @param string $key
     * @param        $value
     *
     * @author alikaviani <a.kaviani@sabavision.ir>
     * @since  2019-04-17 12:21
     */
    public function setData(string $key, $value) {
        $this->dataStore[$key] = $value;
    }

    /**
     * Get data from store by $key
     *
     * @param string $key
     *
     * @return mixed
     * @author alikaviani <a.kaviani@sabavision.ir>
     * @since  2019-04-17 12:21
     */
    public function getData(string $key) {
        return $this->dataStore[$key];
    }

    /**
     * Gets the whole store
     *
     * @return array
     * @author alikaviani <a.kaviani@sabavision.ir>
     * @since  2019-04-17 12:21
     */
    public function getStore() {
        return $this->dataStore;
    }

    public function handleBefore($object, string $actionName, array $actionData = [])
    {
        // Sets Start Timestamp before call
        if ($actionData['start'] && is_float($actionData['start'])) {
            $this->setData('start', $actionData['start']);
        }else{
            $this->setData('start',microtime(true));
        }
    }

    public function handleAfter($object, string $actionName, array $actionData = [])
    {
        // Sets End Timestamp and Calculate Duration of call

        if ($actionData['end'] && is_float($actionData['end'])) {
            $this->setData('end', $actionData['end']);
        }else{
            $this->setData('end',microtime(true));
        }

        $start  = $this->getData('start');
        $end    = $this->getData('end');

        $total = $end - $start;

        $this->setData('total', $total);
    }


}