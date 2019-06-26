<?php
/**
 * A Magento 2 module named Webmeridian/ContactUs
 * Copyright (C) 2018 Litvinov Dmitriy
 * 
 * This file included in Webmeridian/ContactUs is licensed under OSL 3.0
 * 
 * http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * Please see LICENSE.txt for the full text of the OSL 3.0 license
 */

namespace Webmeridian\ContactUs\Model;

use Magento\Framework\Api\DataObjectHelper;
use Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface;
use Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterfaceFactory;

class CustomerFeedback extends \Magento\Framework\Model\AbstractModel
{

    protected $customerfeedbackDataFactory;

    protected $dataObjectHelper;

    protected $_eventPrefix = 'webmeridian_contactus_customerfeedback';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param CustomerFeedbackInterfaceFactory $customerfeedbackDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Webmeridian\ContactUs\Model\ResourceModel\CustomerFeedback $resource
     * @param \Webmeridian\ContactUs\Model\ResourceModel\CustomerFeedback\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        CustomerFeedbackInterfaceFactory $customerfeedbackDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Webmeridian\ContactUs\Model\ResourceModel\CustomerFeedback $resource,
        \Webmeridian\ContactUs\Model\ResourceModel\CustomerFeedback\Collection $resourceCollection,
        array $data = []
    ) {
        $this->customerfeedbackDataFactory = $customerfeedbackDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve customerfeedback model with customerfeedback data
     * @return CustomerFeedbackInterface
     */
    public function getDataModel()
    {
        $customerfeedbackData = $this->getData();
        
        $customerfeedbackDataObject = $this->customerfeedbackDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $customerfeedbackDataObject,
            $customerfeedbackData,
            CustomerFeedbackInterface::class
        );
        
        return $customerfeedbackDataObject;
    }
}
