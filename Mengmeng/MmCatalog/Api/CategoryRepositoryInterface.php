<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Mengmeng\MmCatalog\Api;

/**
 * @api
 * @since 100.0.2
 */
interface CategoryRepositoryInterface
{
    /**
     * Create category service
     *
     * @param \Mengmeng\MmCatalog\Api\Data\CategoryInterface $category
     * @return \Mengmeng\MmCatalog\Api\Data\CategoryInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(\Mengmeng\MmCatalog\Api\Data\CategoryInterface $category);

    /**
     * Get info about category by category id
     *
     * @param int $categoryId
     * @param int $storeId
     * @return \Mengmeng\MmCatalog\Api\Data\CategoryInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function get($categoryId, $storeId = null);
}
