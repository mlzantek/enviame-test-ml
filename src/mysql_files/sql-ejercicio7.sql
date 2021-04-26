-- --------------------------------------------------------

--
-- SQL Solucion para ejercicio 7
--

UPDATE `employees` em
  INNER JOIN `countries` ct ON em.country_id = ct.id
  INNER JOIN `continents` cn ON cn.id = ct.continent_id
SET
  em.salary = em.salary +(em.salary *(cn.anual_adjustment / 100))
WHERE
  em.salary <= 5000