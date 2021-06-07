SELECT 
  question_lists.id, 
  question_lists.is_paid, 
  question_lists.name, 
  latest_top_question_lists.latest_id,
  tql.score,
  worked_question_list.total AS scores_count, 
  question_lists.created_at, 
  ats.description AS assigment_type, 
  ats.name AS assigment_type_name, 
  a.topic, 
  a.subject, 
  g.description AS grade, 
  ac.description AS assigment_category 
FROM 
  `question_lists` 
  INNER JOIN `assigment_question_lists` AS `aql` ON `aql`.`question_list_id` = `question_lists`.`id` 
  INNER JOIN `assigment_types` AS `ats` ON `ats`.`id` = `aql`.`assigment_type_id` 
  INNER JOIN `assigments` AS `a` ON `a`.`id` = `aql`.`assigment_id` 
  INNER JOIN `grades` AS `g` ON `g`.`id` = `a`.`grade_id` 
  INNER JOIN `assigment_categories` AS `ac` ON `ac`.`id` = `a`.`assigment_category_id` 
  INNER JOIN (
    SELECT 
      Count(1) AS total, 
      ql2.ref_id AS question_list_id 
    FROM 
      `questions` AS `q` 
      INNER JOIN `question_lists` AS `ql2` ON `q`.`question_list_id` = `ql2`.`id` 
      INNER JOIN `assigment_question_lists` AS `aql2` ON `aql2`.`question_list_id` = `q`.`question_list_id` 
      INNER JOIN `assigments` AS `a2` ON `a2`.`id` = `aql2`.`assigment_id` 
    WHERE 
      `ql2`.`ref_id` IS NOT NULL 
      AND `a2`.`teacher_id` IS NOT NULL 
    GROUP BY 
      `ql2`.`ref_id`
  ) AS `worked_question_list` ON `aql`.`question_list_id` = `worked_question_list`.`question_list_id` 
	INNER JOIN (
		 select max(id) as latest_id,question_list_id from top_question_lists group by question_list_id
	) as `latest_top_question_lists` ON latest_top_question_lists.question_list_id=question_lists.id
	inner join top_question_lists as tql on tql.id=latest_top_question_lists.latest_id
WHERE 
  `question_lists`.`is_paid` IN (-1) 
GROUP BY 
  `aql`.`question_list_id`
