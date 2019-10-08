<?php
/**
 * Copyright © Mengmeng, Inc. All rights reserved.
 *
 */

namespace Mengmeng\MmCatalog\Model;

/**
 * @codeCoverageIgnore
 */
class CategoryProductLink extends \Magento\Framework\Api\AbstractExtensibleObject implements
     \Mengmeng\MmCatalog\Api\Data\CategoryProductLinkInterface
{
    /**#@+
     * Constant for confirmation status
     */
    const KEY_SKU = 'sku';
    const KEY_POSITION = 'position';
    const KEY_CATEGORY_ID = 'category_id';
    const KEY_NAME ='name';
    const KEY_PRICE = 'price';
    const KEY_IMAGE = 'image';
    /**#@-*/

    /**
     * {@inheritdoc}
     */
    public function getImage()
    {
        return $this->_get(self::KEY_IMAGE);
    }
    /**
     * @param string $image
     * @return $this
     */
    public function setImage($image)
    {
        return $this->setData(self::KEY_IMAGE,$image);
    }

    /**
     * {@inheritdoc}
     */
    public function getPrice(){
        return $this->_get(self::KEY_PRICE);
    }
    /**
     * @param string $price
     * @return $this
     */
    public function setPrice($price)
    {
        return $this->setData(self::KEY_PRICE,$price);
    }
    /**
     * {@inheritdoc}
     */
    public function getName(){
        return $this->_get(self::KEY_NAME);
    }
    /**
     * @param string $name
     * @return $this
     */
    public function setName($name){
        return $this->setData(self::KEY_NAME, $name);
    }

    /**
     * {@inheritdoc}
     */
    public function getSku()
    {
        return $this->_get(self::KEY_SKU);
    }

    /**
     * {@inheritdoc}
     */
    public function getPosition()
    {
        return $this->_get(self::KEY_POSITION);
    }

    /**
     * {@inheritdoc}
     */
    public function getCategoryId()
    {
        return $this->_get(self::KEY_CATEGORY_ID);
    }

    /**
     * @param string $sku
     * @return $this
     */
    public function setSku($sku)
    {
        return $this->setData(self::KEY_SKU, $sku);
    }
    /**
     * @param int $position
     * @return $this
     */
    public function setPosition($position)
    {
        return $this->setData(self::KEY_POSITION, $position);
    }

    /**
     * Set category id
     *
     * @param string $categoryId
     * @return $this
     */
    public function setCategoryId($categoryId)
    {
        return $this->setData(self::KEY_CATEGORY_ID, $categoryId);
    }

    /**
     * {@inheritdoc}
     *
     * @return \Magento\Catalog\Api\Data\CategoryProductLinkExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * {@inheritdoc}
     *
     * @param \Magento\Catalog\Api\Data\CategoryProductLinkExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Magento\Catalog\Api\Data\CategoryProductLinkExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
