SELECT
    name,
    weight,
    price,
    ROUND(price/weight*1000, 2) AS price_per_kg
FROM
    products
ORDER BY
    price_per_kg ASC,
    name ASC;
