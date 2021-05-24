select a.id,a.user_id,a.name,a.topic,ta2.score as latest_score,ta2.created_at from assigments a inner join (
	select created_at,assigment_id,max(id) as max_id from top_assigments group by assigment_id
) as ta on ta.assigment_id=a.id
inner join top_assigments ta2 on ta2.id=ta.max_id
inner join users u on u.id=a.user_id
where
	ta2.score is not null
order by ta2.score desc