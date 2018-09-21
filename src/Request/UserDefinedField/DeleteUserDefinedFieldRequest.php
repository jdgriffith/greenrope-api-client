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

namespace Sctr\Greenrope\Api\Request\UserDefinedField;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("DeleteUserDefinedFieldRequest")
 */
class DeleteUserDefinedFieldRequest
{
    /**
     * @Serializer\XmlAttributeMap()
     */
    protected $query;

    /**
     * @Serializer\SkipWhenEmpty()
     * @Serializer\XmlElement(cdata=false)
     * @Serializer\Type("string")
     */
    protected $fieldName;

    public function __construct(array $content = [])
    {
        foreach ($content as $key => $value) {
            $key = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
}
