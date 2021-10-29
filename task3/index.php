<?php

/**
 * Постановка:
 * Есть магазин и всего две сущности:
 *   1. клиент (имеет имя и фамилию);
 *   2. продукт (имеет название и цену);
 * Продавцу нужно собирать отчетность кто и что покупает,
 * на какие суммы и т.д.
 *
 * Задача:
 * Описать структуру БД для хранения всей необходимой информации
 * и написать следующие запросы:
 *   1. получение списка клиентов со списком названий заказанных ими продуктов;
 *   2. получение списка продуктов с общей стоимостью заказов по ним;
 *   3. поиск продукта, который заказал один из клиентов, по названию.
 *      (Как пример - можно найти "Покупал ли Петр Сидоров продукт,
 *       у которого в названии есть слово 'грушевый' ");
 *
 * Описать можно в любом удобном виде (использовать то что ниже не обязательно)
 */


//1. получение списка клиентов со списком названий заказанных ими продуктов;
function getClientList()
{
    return '
    SELECT 
        client.firstname, client.lastname, products.name, products.price
    FROM client 
    INNER JOIN products 
    ON client.id_product = products.id 
    WHERE client.id_product = products.id
    ';
}
//2. получение списка продуктов с общей стоимостью заказов по ним;
function getProductList()
{
    return '
    SELECT products.name, SUM(products.price) AS total_price 
    FROM products 
    INNER JOIN client 
    ON  products.id = client.id_product;
    ';
}
//3. поиск продукта, который заказал один из клиентов, по названию.
//(Как пример - можно найти "Покупал ли Петр Сидоров продукт, у которого в названии есть слово 'грушевый' ");
function getClientList($client, string $searchString)
{
    return '
    SELECT products.name 
    FROM products 
    INNER JOIN client 
    ON products.id = client.id_product 
    WHERE client.firstname = ' . $client . ' 
    AND products.name = ' . $searchString . '
    ';
}