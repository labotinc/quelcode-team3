INSERT INTO reservations
  (schedule_id, user_id, regular_price_id, discount_id, seat_number, purchased_price, is_confirmed, expire_at, is_cancelled, is_deleted, created, modified)
VALUES
  (1, 1, 1, NULL, 'A1', 1800, 0, '2020-10-22 12:00', 0, 0, '2020-10-16 12:00', '2020-10-16 12:00'),
  (4, 3, 2, NULL, 'H1', 1500, 0, '2020-10-22 12:00', 0, 0, '2020-10-16 12:00', '2020-10-16 12:00'),
  (11, 2, 3, NULL, 'F5', 1200, 0, '2020-10-22 12:00', 0, 0, '2020-10-16 12:00', '2020-10-16 12:00'),
  (1, 7, 1, NULL, 'A2', 1800, 0, '2020-10-22 12:00', 0, 0, '2020-10-16 12:00', '2020-10-16 12:00');
