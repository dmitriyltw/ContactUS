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

use Webmeridian\ContactUs\Api\Data\CustomerFeedbackSearchResultsInterfaceFactory;
use Webmeridian\ContactUs\Model\ResourceModel\CustomerFeedback\CollectionFactory as CustomerFeedbackCollectionFactory;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\DataObjectHelper;
use Webmeridian\ContactUs\Model\ResourceModel\CustomerFeedback as ResourceCustomerFeedback;
use Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterfaceFactory;
use Webmeridian\ContactUs\Api\CustomerFeedbackRepositoryInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Reflection\DataObjectProcessor;

class CustomerFeedbackRepository implements CustomerFeedbackRepositoryInterface
{

    protected $resource;

    protected $extensionAttributesJoinProcessor;

    protected $customerFeedbackCollectionFactory;

    protected $extensibleDataObjectConverter;
    protected $dataObjectProcessor;

    private $storeManager;

    private $collectionProcessor;

    protected $dataObjectHelper;

    protected $customerFeedbackFactory;

    protected $searchResultsFactory;

    protected $dataCustomerFeedbackFactory;


    /**
     * @param ResourceCustomerFeedback $resource
     * @param CustomerFeedbackFactory $customerFeedbackFactory
     * @param CustomerFeedbackInterfaceFactory $dataCustomerFeedbackFactory
     * @param CustomerFeedbackCollectionFactory $customerFeedbackCollectionFactory
     * @param CustomerFeedbackSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceCustomerFeedback $resource,
        CustomerFeedbackFactory $customerFeedbackFactory,
        CustomerFeedbackInterfaceFactory $dataCustomerFeedbackFactory,
        CustomerFeedbackCollectionFactory $customerFeedbackCollectionFactory,
        CustomerFeedbackSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->customerFeedbackFactory = $customerFeedbackFactory;
        $this->customerFeedbackCollectionFactory = $customerFeedbackCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataCustomerFeedbackFactory = $dataCustomerFeedbackFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface $customerFeedback
    ) {
        /* if (empty($customerFeedback->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $customerFeedback->setStoreId($storeId);
        } */
        
        $customerFeedbackData = $this->extensibleDataObjectConverter->toNestedArray(
            $customerFeedback,
            [],
            \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface::class
        );
        
        $customerFeedbackModel = $this->customerFeedbackFactory->create()->setData($customerFeedbackData);
        
        try {
            $this->resource->save($customerFeedbackModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the customerFeedback: %1',
                $exception->getMessage()
            ));
        }
        return $customerFeedbackModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getById($customerFeedbackId)
    {
        $customerFeedback = $this->customerFeedbackFactory->create();
        $this->resource->load($customerFeedback, $customerFeedbackId);
        if (!$customerFeedback->getId()) {
            throw new NoSuchEntityException(__('CustomerFeedback with id "%1" does not exist.', $customerFeedbackId));
        }
        return $customerFeedback->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->customerFeedbackCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Webmeridian\ContactUs\Api\Data\CustomerFeedbackInterface $customerFeedback
    ) {
        try {
            $customerFeedbackModel = $this->customerFeedbackFactory->create();
            $this->resource->load($customerFeedbackModel, $customerFeedback->getCustomerfeedbackId());
            $this->resource->delete($customerFeedbackModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the CustomerFeedback: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($customerFeedbackId)
    {
        return $this->delete($this->getById($customerFeedbackId));
    }
}
