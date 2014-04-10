<?php
/**
 * PHP Extendtion Library (https://github.com/PsyduckMans/PHPX-Propel)
 *
 * @link      https://github.com/PsyduckMans/PHPX-Propel for the canonical source repository
 * @copyright Copyright (c) 2014 PsyduckMans (https://ninth.not-bad.org)
 * @license   https://github.com/PsyduckMans/PHPX-Propel/blob/master/LICENSE MIT
 * @author    Psyduck.Mans
 */

namespace PHPX\Propel\Util\Ext\Direct;

use PHPX\Propel\Util\Ext\RuntimeException;

/**
 * Class Criteria
 * @package PHPX\Propel\Util\Ext\Direct
 */
class Criteria {
    /**
     * Ext direct sort direction
     */
    const SORT_DIRECTION_DESC = 'DESC';
    const SORT_DIRECTION_ASC = 'ASC';

    /**
     * bind Ext direct sort to Propel Criteria
     *
     * @param \Criteria $criteria
     * @param $sort
     *      array(
     *          'direction' => 'DESC',
     *          'column' => UserPeer::ID
     *      )
     * @throws RuntimeException
     * @return void
     */
    public static function bindSort(\Criteria $criteria, $sort) {
        $direction = $sort['direction'];
        switch($direction) {
            case self::SORT_DIRECTION_DESC:
                $criteria->addDescendingOrderByColumn($sort['column']);
                break;
            case self::SORT_DIRECTION_ASC:
                $criteria->addAscendingOrderByColumn($sort['column']);
                break;
            default:
                throw new RuntimeException('Unsupport Ext direct sort direction:'.$direction);
        }
    }
} 