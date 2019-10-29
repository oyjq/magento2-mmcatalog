<?php
/**
 * Copyright © Mengmeng, Inc. All rights reserved.
 *
 */

namespace Mengmeng\MmCatalog\Model;

/**
 * Class CategoryLinkManagement
 */
class CategoryLinkManagement implements \Mengmeng\MmCatalog\Api\CategoryLinkManagementInterface
{
    /**
     * @var \Mengmeng\MmCatalog\Api\CategoryRepositoryInterface
     */
    protected $categoryRepository;

    /**
     * @var \Mengmeng\MmCatalog\Api\ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * @var ResourceModel\Product
     */
    protected $productResource;

    /**
     * @var \Mengmeng\MmCatalog\Api\CategoryLinkRepositoryInterface
     */
    protected $categoryLinkRepository;

    /**
     * @var \Mengmeng\MmCatalog\Api\Data\CategoryProductLinkInterfaceFactory
     */
    protected $productLinkFactory;

    /**
     * @var \Magento\Framework\Indexer\IndexerRegistry
     */
    protected $indexerRegistry;

    /**
     * CategoryLinkManagement constructor.
     *
     * @param \Mengmeng\MmCatalog\Api\CategoryRepositoryInterface $categoryRepository
     * @param \Mengmeng\MmCatalog\Api\Data\CategoryProductLinkInterfaceFactory $productLinkFactory
     */
    public function __construct(
        \Mengmeng\MmCatalog\Api\CategoryRepositoryInterface $categoryRepository,
        \Mengmeng\MmCatalog\Api\Data\CategoryProductLinkInterfaceFactory $productLinkFactory
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->productLinkFactory = $productLinkFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function getAssignedProducts($categoryId)
    {
        $category = $this->categoryRepository->get($categoryId);

        /** @var \Mengmeng\MmCatalog\Model\ResourceModel\Product\Collection $products */
        $products = $category->getProductCollection();
        $products->addFieldToSelect(['image','name','position','final_price','price']);

        /** @var \Mengmeng\MmCatalog\Api\Data\CategoryProductLinkInterface[] $links */
        $links = [];

        /** @var \Mengmeng\MmCatalog\Model\Product $product */
        foreach ($products->getItems() as $product) {
            /** @var \Mengmeng\MmCatalog\Api\Data\CategoryProductLinkInterface $link */
            $link = $this->productLinkFactory->create();
            $link->setSku($product->getSku())
                ->setPrice($product->getPrice())
                ->setFinalPrice($product->getFinalPrice())
                ->setPosition($product->getData('cat_index_position'))
                ->setName($product->getData('name'))
                ->setImage($product->getImage())
                ->setCategoryId($category->getId());
            $links[] = $link->__toArray();
        }
        return $links;
    }


    /**
     * Retrieve product repository instance
     *
     * @return \Magento\Catalog\Api\ProductRepositoryInterface
     */
    private function getProductRepository()
    {
        if (null === $this->productRepository) {
            $this->productRepository = \Magento\Framework\App\ObjectManager::getInstance()
                ->get(\Magento\Catalog\Api\ProductRepositoryInterface::class);
        }
        return $this->productRepository;
    }

    /**
     * Retrieve product resource instance
     *
     * @return ResourceModel\Product
     */
    private function getProductResource()
    {
        if (null === $this->productResource) {
            $this->productResource = \Magento\Framework\App\ObjectManager::getInstance()
                ->get(\Magento\Catalog\Model\ResourceModel\Product::class);
        }
        return $this->productResource;
    }

    /**
     * Retrieve category link repository instance
     *
     * @return \Magento\Catalog\Api\CategoryLinkRepositoryInterface
     */
    private function getCategoryLinkRepository()
    {
        if (null === $this->categoryLinkRepository) {
            $this->categoryLinkRepository = \Magento\Framework\App\ObjectManager::getInstance()
                ->get(\Magento\Catalog\Api\CategoryLinkRepositoryInterface::class);
        }
        return $this->categoryLinkRepository;
    }

    /**
     * Retrieve indexer registry instance
     *
     * @return \Magento\Framework\Indexer\IndexerRegistry
     */
    private function getIndexerRegistry()
    {
        if (null === $this->indexerRegistry) {
            $this->indexerRegistry = \Magento\Framework\App\ObjectManager::getInstance()
                ->get(\Magento\Framework\Indexer\IndexerRegistry::class);
        }
        return $this->indexerRegistry;
    }
}
