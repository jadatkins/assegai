<?php

namespace assegai\components\eventsystem\events;

interface IEvent
{
    function getType();
    function getSender();
    function setException(\Exception $e);
    function getException();
}
