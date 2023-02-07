<?php

namespace Commerce365\Shipments\Block;

use Commerce365\Core\Block\AbstractList;
use Commerce365\Core\Service\GetSalesDocuments;
use Commerce365\Core\Service\SalesDocumentInterface;
use Magento\Framework\View\Element\Template\Context;

class ShipmentList extends AbstractList
{
    protected const URL = 'shipments/shipmentlist';
    protected const VIEW_URL = 'shipments/shipmentdetails';

    private GetSalesDocuments $getSalesDocuments;

    public function __construct(
        Context $context,
        GetSalesDocuments $getSalesDocuments,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->getSalesDocuments = $getSalesDocuments;
    }

    public function getShipments()
    {
        $query = $this->processQuery([
            'tableNo' => SalesDocumentInterface::SHIPMENT_TABLE_NO,
            'documentType' => 0
        ]);

        return $this->getSalesDocuments->execute($query);
    }
}
