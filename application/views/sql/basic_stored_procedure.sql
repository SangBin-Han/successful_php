# 기본적인 저장 프로시저의 예

DELIMITER //

CREATE PROCEDURE Total_Orders (OUT Total FLOAT)
BEGIN
  SELECT SUM(Amount) INTO Total FROM Orders;
END
//

DELIMITER;