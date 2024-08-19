<?php

declare(strict_types=1);

namespace App\Domain\Order\Services;

use App\Domain\Order\Contracts\Repositories\ClientOrderRepositoryInterface;
use App\Domain\Order\Contracts\Services\ClientOrderServiceInterface;
use App\Domain\Order\Contracts\Services\OrderCostCalculatorServiceInterface;
use App\Domain\Order\Models\Order;
use Illuminate\Contracts\Pagination\LengthAwarePaginator as LengthAwarePaginatorContract;
use Illuminate\Pagination\LengthAwarePaginator;

readonly class ClientOrderService implements ClientOrderServiceInterface
{
    public function __construct(
        private ClientOrderRepositoryInterface $clientOrderRepository,
        private OrderCostCalculatorServiceInterface $orderCostCalculatorService,
    ) {

    }

    #[\Override]
    public function getLastOrdersWithCost(
        int $userId,
        int $subDays = 30,
        int $paginate = 10,
    ): LengthAwarePaginatorContract|LengthAwarePaginator|array {
        $orders = $this->clientOrderRepository->getLastOrdersByUserId($userId, $subDays, $paginate);

        // Создаем новую коллекцию с рассчитанной стоимостью
        $modifiedOrders = $orders->getCollection()->map(function (Order $order) {
            $order->cost = $this->orderCostCalculatorService->calculate($order);

            return $order;
        });

        // Обновляем коллекцию внутри пагинатора
        $orders->setCollection($modifiedOrders);

        return $orders;
    }
}
