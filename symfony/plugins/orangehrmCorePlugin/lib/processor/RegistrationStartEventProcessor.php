<?php

/**
 * OrangeHRM is a comprehensive Human Resource Management (HRM) System that captures
 * all the essential functionalities required for any enterprise.
 * Copyright (C) 2006 OrangeHRM Inc., http://www.orangehrm.com
 *
 * OrangeHRM is free software; you can redistribute it and/or modify it under the terms of
 * the GNU General Public License as published by the Free Software Foundation; either
 * version 2 of the License, or (at your option) any later version.
 *
 * OrangeHRM is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor,
 * Boston, MA  02110-1301, USA
 */
class RegistrationStartEventProcessor extends AbstractRegistrationEventProcessor
{

    public function getEventType()
    {
        return RegistrationEventQueue::INSTALLATION_START;
    }

    public function getEventData()
    {
        return $this->getRegistrationEventGeneralData();
    }

    public function getEventToBeSavedOrNot()
    {
        $installationStartedEvent = $this->getRegistrationEventQueueDao()->getRegistrationEventQueueEventByType(RegistrationEventQueue::INSTALLATION_START);
        if($installationStartedEvent instanceof RegistrationEventQueue){
            if($installationStartedEvent->getEventData() != null){
                return false;
            }
            return true;
        }
        return true;
    }

    public function processRegistrationEventToSave($eventTime)
    {
        $registrationData = $this->getEventData();
        $registrationInstallStartSavedEvent = $this->getRegistrationEventQueueDao()->getRegistrationEventQueueEventByType(RegistrationEventQueue::INSTALLATION_START);
        if(!$registrationInstallStartSavedEvent instanceof RegistrationEventQueue){
            $registrationInstallStartSavedEvent = new RegistrationEventQueue();
            $registrationInstallStartSavedEvent->setEventTime($eventTime);
            $registrationInstallStartSavedEvent->setEventType($this->getEventType());
            $registrationInstallStartSavedEvent->setPublished(0);
        }
        $registrationInstallStartSavedEvent->setEventData(json_encode($registrationData));
        return $registrationInstallStartSavedEvent;
    }
}
