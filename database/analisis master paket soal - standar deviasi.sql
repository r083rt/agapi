/*
mengambil master pake soal yang berbayar saja (is_paid>0)
*/
select 
	a.id,a.user_id,a.name,a.topic,a.is_paid,
    assigment_pivot.score, assigment_pivot.scores_count
from assigments a
inner join (
  select 
      ass.id,ass.assigment_id,a2.is_paid,std(ass.total_score) as score, count(1) as scores_count
    from 
      assigment_sessions ass 
      inner join assigments a2 on a2.id = ass.assigment_id 
    where 
      a2.teacher_id is null #master paket soal
      and ass.type='paid' #hanya mengambil sessions dari pengerjaan paket soal premium, sehingga sessions dari latihan mandiri tidak ikut terambil
      group by a2.id
) assigment_pivot on assigment_pivot.assigment_id=a.id
where 
	a.is_paid>0
    and a.teacher_id is null #master paket soal
order by a.id desc