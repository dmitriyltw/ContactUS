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

namespace Webmeridian\ContactUs\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CustomerFeedbackRepositoryInterface
{

    /**
     * Save CustomerFeedback
     * @param \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface $customerFeedback
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface $customerFeedback
    );

    /**
     * Retrieve CustomerFeedback
     * @param string $customerfeedbackId
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($customerfeedbackId);

    /**
     * Retrieve CustomerFeedback matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete CustomerFeedback
     * @param \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface $customerFeedback
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface $customerFeedback
    );

    /**
     * Delete CustomerFeedback by ID
     * @param string $customerfeedbackId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($customerfeedbackId);
}
