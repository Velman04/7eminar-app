<?php

declare(strict_types=1);

namespace App\Application\Client\Controllers\Product;

use App\Application\Client\Resources\Product\ClientProductPopularResource;
use App\Domain\Product\Contracts\Services\ClientProductServiceInterface;
use App\Infrastructure\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientProductPopularController extends Controller
{
    public function __construct(
        private readonly ClientProductServiceInterface $clientProductService,
    ) {

    }

    /**
     * Обработчик запроса на получение списка популярных продуктов.
     *
     * Этот метод возвращает список самых популярных продуктов в виде JSON-ответа,
     * используя закешированные данные. Кеширование результатов запроса к базе данных
     * происходит на 1 час.
     *
     * @note Кеш будет обновлен в следующих случаях:
     *       - Если прошло 1 час с момента последнего кеширования (закончился TTL кеша).
     *       - Если кеш был явно очищен или обновлен (например, через вызов `Cache::forget` или при изменении данных).
     *
     * @note Кеширование важно для продуктивности программы, так как оно:
     *       - Снижает нагрузку на базу данных, уменьшая количество запросов к ней.
     *       - Ускоряет время отклика приложения, так как данные из кеша могут быть получены быстрее, чем из базы данных.
     *       - Помогает поддерживать стабильную производительность приложения при высокой нагрузке, избегая избыточных запросов к базе данных.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $orders = $this->clientProductService->getCachedPopularProducts();

        return $this->success(ClientProductPopularResource::collection($orders));
    }
}
