select 
  a.id, 
  u.name as user_name, 
  g.description as grade, 
  a.code, 
  a.name, 
  a.created_at,
  assigment_pivot.score,
  assigment_pivot.scores_count

from `assigments` as `a` 
  inner join `grades` as `g` on `g`.`id` = `a`.`grade_id` 
  inner join `users` as `u` on `u`.`id` = `a`.`user_id` 
  left join (
  select 
      ass.id,a2.ref_id,ass.assigment_id,std(ass.total_score) as score,count(1) as scores_count
    from 
      assigment_sessions ass 
      inner join assigments a2 on a2.id = ass.assigment_id 
    where 
      a2.is_publish = 1 
      and a2.teacher_id is not null #teacher_id NOT NULL adalah slave soal dari master soal
      group by a2.ref_id
  
  ) assigment_pivot on assigment_pivot.ref_id=a.id
where 
  `a`.`is_publish` = true 
  and `a`.`teacher_id` is null 
  and `a`.`is_paid` is null 
  and assigment_pivot.score is not null
limit 100000
  #and assigment_std.score is not null
