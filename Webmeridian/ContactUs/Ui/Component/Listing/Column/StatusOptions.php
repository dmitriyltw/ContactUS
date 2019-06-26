<?php

namespace Webmeridian\ContactUs\Ui\Component\Listing\Column;

class StatusOptions implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 0, 'label' => __('Processed')],
            ['value' => 1, 'label' => __('In the process')]
        ];
    }
}
