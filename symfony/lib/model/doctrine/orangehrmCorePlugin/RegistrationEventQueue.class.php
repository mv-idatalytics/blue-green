<?php

/**
 * RegistrationEventQueue
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 *
 * @package    orangehrm
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class RegistrationEventQueue extends PluginRegistrationEventQueue
{
    const INSTALLATION_START = 0;
    const ACTIVE_EMPLOYEE_COUNT = 1;
    const INACTIVE_EMPLOYEE_COUNT = 2;
    const INSTALLATION_SUCCESS = 3;
    const UPGRADE_START = 4;

    const PUBLISH_EVENT_BATCH_SIZE = 5;
    const EMPLOYEE_COUNT_CHANGE_TRACKER_SIZE = 10;
}
