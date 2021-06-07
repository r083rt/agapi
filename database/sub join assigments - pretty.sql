select 
  * 
from 
  `assigments` 
  inner join `grades` as `g` on `g`.`id` = `assigments`.`grade_id` 
  inner join (
    select 
      a2.ref_id as assigment_id, 
      count(1) as scores_count 
    from 
      `assigment_sessions` as `ass` 
      inner join `assigments` as `a2` on `a2`.`id` = `ass`.`assigment_id` 
    where 
      `a2`.`is_publish` = 1 
      and `a2`.`teacher_id` is not null 
      and `a2`.`ref_id` is not null 
    group by 
      `a2`.`ref_id`
  ) as `worked_assigment` on `worked_assigment`.`assigment_id` = `assigments`.`id` 
where 
  `assigments`.`deleted_at` is null
