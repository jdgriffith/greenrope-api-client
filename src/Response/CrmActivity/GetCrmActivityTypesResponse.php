<?php

/*
 * Copyright 2018 SCTR Services
 *
 * Distribution and reproduction are prohibited.
 *
 * @package     greenrope-api-client
 * @copyright   SCTR Services LLC 2018
 * @license     No License (Proprietary)
 */

namespace Sctr\Greenrope\Api\Response\CrmActivity;

use JMS\Serializer\Annotation as Serializer;
use Sctr\Greenrope\Api\Response\GreenropeResponse;

/**
 * @Serializer\XmlRoot("GetCRMActivityTypesResponse")
 */
class GetCrmActivityTypesResponse extends GreenropeResponse
{
    /**
     * @Serializer\Type("array<Sctr\Greenrope\Api\Model\CrmActivityType>")
     * @Serializer\SerializedName("CRMActivityTypes")
     * @Serializer\XmlList(entry="CRMActivityType",)
     */
    protected $crmActivityTypes;

    public function getResult()
    {
        return $this->crmActivityTypes;
    }
}
