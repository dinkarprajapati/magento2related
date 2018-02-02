<?php

namespace Webling\StateAus\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Directory\Model\RegionFactory;


class InstallData implements InstallDataInterface
{

    private $directoryRegionFactory;

    public function __construct( RegionFactory $directoryRegionFactory ) {
        $this->directoryRegionFactory = $directoryRegionFactory;
    }


    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $dataDCR = [
            [
                'country_id' => 'AU',
                'code' => 'ACT',
                'default_name' => 'Australian Capital Territory',
            ],
            [
                'country_id' => 'AU',
                'code' => 'NSW',
                'default_name' => 'New South Wales',
            ],
            [
                'country_id' => 'AU',
                'code' => 'VIC',
                'default_name' => 'Victoria',
            ],
            [
                'country_id' => 'AU',
                'code' => 'QLD',
                'default_name' => 'Queensland',
            ],
            [
                'country_id' => 'AU',
                'code' => 'SA',
                'default_name' => 'South Australia',
            ],
            [
                'country_id' => 'AU',
                'code' => 'WA',
                'default_name' => 'Western Australia',
            ],
            [
                'country_id' => 'AU',
                'code' => 'TAS',
                'default_name' => 'Tasmania',
            ],
            [
                'country_id' => 'AU',
                'code' => 'NT',
                'default_name' => 'Northern Territory',
            ],
        ];

        foreach ($dataDCR as $row) {
            $setup->getConnection()->insertForce($setup->getTable('directory_country_region'), $row);
        }


        $region = $this->directoryRegionFactory->create();
        $dataDCRN = [
            [
                'locale' => 'en_US',
                'name' => 'Australian Capital Territory',
                'region_id' => $region->loadByCode('ACT', 'AU')->getRegionId(),
            ],
            [
                'locale' => 'en_US',
                'name' => 'New South Wales',
                'region_id' => $region->loadByCode('NSW', 'AU')->getRegionId(),
            ],
            [
                'locale' => 'en_US',
                'name' => 'Victoria',
                'region_id' => $region->loadByCode('VIC', 'AU')->getRegionId(),
            ],
            [
                'locale' => 'en_US',
                'name' => 'Queensland',
                'region_id' => $region->loadByCode('QLD', 'AU')->getRegionId(),
            ],
            [
                'locale' => 'en_US',
                'name' => 'South Australia',
                'region_id' => $region->loadByCode('SA', 'AU')->getRegionId(),
            ],
            [
                'locale' => 'en_US',
                'name' => 'Western Australia',
                'region_id' => $region->loadByCode('WA', 'AU')->getRegionId(),
            ],
            [
                'locale' => 'en_US',
                'name' => 'Tasmania',
                'region_id' => $region->loadByCode('TAS', 'AU')->getRegionId(),
            ],
            [
                'locale' => 'en_US',
                'name' => 'Northern Territory',
                'region_id' => $region->loadByCode('NT', 'AU')->getRegionId(),
            ],
        ];
        foreach ($dataDCRN as $row) {
            $setup->getConnection()->insertForce($setup->getTable('directory_country_region_name'), $row);
        }
    }
}
