<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Reports\Block\Adminhtml\Grid\Column\Renderer;

/**
 * Adminhtml Report Customers Reviews renderer
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Customer extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer
{
    /**
     * Renders grid column
     *
     * @param \Magento\Framework\Object $row
     * @return string
     */
    public function render(\Magento\Framework\Object $row)
    {
        $id = $row->getCustomerId();

        if (!$id) {
            return __('Show Reviews');
        }

        return sprintf(
            '<a href="%s">%s</a>',
            $this->getUrl('review/product/', ['customerId' => $id]),
            __('Show Reviews')
        );
    }
}
