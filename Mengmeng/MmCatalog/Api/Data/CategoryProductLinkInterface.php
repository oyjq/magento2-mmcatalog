<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Mengmeng\MmCatalog\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * @api
 * @since 100.0.2
 */
interface CategoryProductLinkInterface extends ExtensibleDataInterface
{
    /**
     * @return string|null
     */
    public function getImage();
    /**
     * @param string $image
     * @return $this
     */
    public function setImage($image);
    /**
     * @return string|null
     */
    public function getPrice();
    /**
     * @param int $price
     * @return $this
     */
    public function setPrice($price);
    /**
     * @return string|null
     */
    public function getName();
    /**
     * @param string $name
     * @return $this
     */
    public function setName($name);
    /**
     * @return string|null
     */
    public function getSku();

    /**
     * @param string $sku
     * @return $this
     */
    public function setSku($sku);

    /**
     * @return int|null
     */
    public function getPosition();

    /**
     * @param int $position
     * @return $this
     */
    public function setPosition($position);

    /**
     * Get category id
     *
     * @return string
     */
    public function getCategoryId();

    /**
     * Set category id
     *
     * @param string $categoryId
     * @return $this
     */
    public function setCategoryId($categoryId);

    /**
     * Retrieve existing extension attributes object.
     *
     * @return \Mengmeng\MmCatalog\Api\Data\CategoryProductLinkExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Magento\Catalog\Api\Data\CategoryProductLinkExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Magento\Catalog\Api\Data\CategoryProductLinkExtensionInterface $extensionAttributes
    );
}
