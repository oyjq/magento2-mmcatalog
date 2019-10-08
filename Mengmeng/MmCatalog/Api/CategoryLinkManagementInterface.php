<?php
/**
 * Copyright © Mengmeng, Inc. All rights reserved.
 *
 */

namespace Mengmeng\MmCatalog\Api;

/**
 * @api
 * @since 20191008
 */
interface CategoryLinkManagementInterface
{
    /**
     * Get products assigned to category
     *
     * @param int $categoryId
     * @return \Mengmeng\MmCatalog\Api\Data\CategoryProductLinkInterface[]
     */
    public function getAssignedProducts($categoryId);

}
