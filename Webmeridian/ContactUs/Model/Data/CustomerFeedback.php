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

namespace Webmeridian\ContactUs\Model\Data;

use Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface;

class CustomerFeedback extends \Magento\Framework\Api\AbstractExtensibleObject implements CustomerFeedbackInterface
{

    /**
     * Get customerfeedback_id
     * @return string|null
     */
    public function getCustomerfeedbackId()
    {
        return $this->_get(self::CUSTOMERFEEDBACK_ID);
    }

    /**
     * Set customerfeedback_id
     * @param string $customerfeedbackId
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface
     */
    public function setCustomerfeedbackId($customerfeedbackId)
    {
        return $this->setData(self::CUSTOMERFEEDBACK_ID, $customerfeedbackId);
    }

    /**
     * Get id
     * @return string|null
     */
    public function getId()
    {
        return $this->_get(self::ID);
    }

    /**
     * Set id
     * @param string $id
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Webmeridian\ContactUs\Api\Data\CustomerFeedbackExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Webmeridian\ContactUs\Api\Data\CustomerFeedbackExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get customer_name
     * @return string|null
     */
    public function getCustomerName()
    {
        return $this->_get(self::CUSTOMER_NAME);
    }

    /**
     * Set customer_name
     * @param string $customerName
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface
     */
    public function setCustomerName($customerName)
    {
        return $this->setData(self::CUSTOMER_NAME, $customerName);
    }

    /**
     * Get customer_email
     * @return string|null
     */
    public function getCustomerEmail()
    {
        return $this->_get(self::CUSTOMER_EMAIL);
    }

    /**
     * Set customer_email
     * @param string $customerEmail
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface
     */
    public function setCustomerEmail($customerEmail)
    {
        return $this->setData(self::CUSTOMER_EMAIL, $customerEmail);
    }

    /**
     * Get customer_phone_number
     * @return string|null
     */
    public function getCustomerPhoneNumber()
    {
        return $this->_get(self::CUSTOMER_PHONE_NUMBER);
    }

    /**
     * Set customer_phone_number
     * @param string $customerPhoneNumber
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface
     */
    public function setCustomerPhoneNumber($customerPhoneNumber)
    {
        return $this->setData(self::CUSTOMER_PHONE_NUMBER, $customerPhoneNumber);
    }

    /**
     * Get customer_feedback
     * @return string|null
     */
    public function getCustomerFeedback()
    {
        return $this->_get(self::CUSTOMER_FEEDBACK);
    }

    /**
     * Set customer_feedback
     * @param string $customerFeedback
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface
     */
    public function setCustomerFeedback($customerFeedback)
    {
        return $this->setData(self::CUSTOMER_FEEDBACK, $customerFeedback);
    }

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->_get(self::CREATED_AT);
    }

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Get updated_at
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return $this->_get(self::UPDATED_AT);
    }

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }
}
