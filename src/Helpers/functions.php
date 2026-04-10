<?php
/**
 * Phân loại trạng thái dựa trên số lượng tồn kho
 */
function getStockStatus(int $quantity): string {
    if($quantity <= 0) {
        return 'Out of stock';
    } elseif ($quantity <= 5) {
        return 'Low stock';
    }
    return 'Available';
}
/**
 * Viết hoa tên sản phẩm
 */
function formatItemName(string $name): string {
    return mb_strtoupper($name, 'UTF-8');
}

/**
 * Tính số lượng tất cả sản phẩm đang có trong kho 
 * Dùng array_reduce
 */
function getTotalQuantity(array $items): int {
    return array_reduce($items, function ($carry, $item) {
        return $carry + $item['quantity'];
    }, 0);
}
/**
 * Lọc danh sách sản phẩm còn hàng (quantity > 0)
 * Dùng array_values reset lại index của mảng từ 0
 */
function getAvailableItems(array $items): array {
    return array_values(array_filter($items, function($item) {
        return $item['quantity'] > 0;
    }));
}