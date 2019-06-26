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

namespace Webmeridian\ContactUs\Controller\Adminhtml\CustomerFeedback;

class Delete extends \Webmeridian\ContactUs\Controller\Adminhtml\CustomerFeedback
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('customerfeedback_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Webmeridian\ContactUs\Model\CustomerFeedback::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Customerfeedback'.$id));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['customerfeedback_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Customerfeedback to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
