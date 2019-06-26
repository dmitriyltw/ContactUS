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

namespace Webmeridian\ContactUs\Api\Data;

interface CustomerFeedbackInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const CUSTOMER_EMAIL = 'customer_email';
    const ID = 'id';
    const CREATED_AT = 'created_at';
    const CUSTOMERFEEDBACK_ID = 'customerfeedback_id';
    const UPDATED_AT = 'updated_at';
    const CUSTOMER_PHONE_NUMBER = 'customer_phone_number';
    const CUSTOMER_FEEDBACK = 'customer_feedback';
    const CUSTOMER_NAME = 'customer_name';

    /**
     * Get customerfeedback_id
     * @return string|null
     */
    public function getCustomerfeedbackId();

    /**
     * Set customerfeedback_id
     * @param string $customerfeedbackId
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface
     */
    public function setCustomerfeedbackId($customerfeedbackId);

    /**
     * Get id
     * @return string|null
     */
    public function getId();

    /**
     * Set id
     * @param string $id
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface
     */
    public function setId($id);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Webmeridian\ContactUs\Api\Data\CustomerFeedbackExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Webmeridian\ContactUs\Api\Data\CustomerFeedbackExtensionInterface $extensionAttributes
    );

    /**
     * Get customer_name
     * @return string|null
     */
    public function getCustomerName();

    /**
     * Set customer_name
     * @param string $customerName
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface
     */
    public function setCustomerName($customerName);

    /**
     * Get customer_email
     * @return string|null
     */
    public function getCustomerEmail();

    /**
     * Set customer_email
     * @param string $customerEmail
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface
     */
    public function setCustomerEmail($customerEmail);

    /**
     * Get customer_phone_number
     * @return string|null
     */
    public function getCustomerPhoneNumber();

    /**
     * Set customer_phone_number
     * @param string $customerPhoneNumber
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface
     */
    public function setCustomerPhoneNumber($customerPhoneNumber);

    /**
     * Get customer_feedback
     * @return string|null
     */
    public function getCustomerFeedback();

    /**
     * Set customer_feedback
     * @param string $customerFeedback
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface
     */
    public function setCustomerFeedback($customerFeedback);

    /**
     * Get created_at
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     * @param string $createdAt
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated_at
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated_at
     * @param string $updatedAt
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface
     */
    public function setUpdatedAt($updatedAt);
}
