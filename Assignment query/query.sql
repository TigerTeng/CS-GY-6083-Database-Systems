SELECT c.email_address, o.order_id AS oldest_order_id, oldestOrders.oldest_order_date
FROM customers AS c
INNER JOIN
	(SELECT customer_id, MIN(order_date) AS oldest_order_date
	FROM orders
	GROUP BY customer_id) AS oldestOrders
    ON c.customer_id = oldestOrders.customer_id
INNER JOIN
	orders AS o 
    ON oldestOrders.oldest_order_date = o.order_date;