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

interface CustomerFeedbackSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get CustomerFeedback list.
     * @return \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface[]
     */
    public function getItems();

    /**
     * Set id list.
     * @param \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
