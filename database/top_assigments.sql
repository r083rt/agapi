select a.id,a.user_id,a.name,a.topic,ta2.score as latest_score,a.is_paid,ta2.created_at from assigments a inner join (
	select created_at,assigment_id,max(id) as max_id from top_assigments group by assigment_id
) as ta on ta.assigment_id=a.id
inner join top_assigments ta2 on ta2.id=ta.max_id
inner join users u on u.id=a.user_id
where
	ta2.score is not null
    and (a.is_paid=-1 or a.is_paid is null)
order by ta2.score desc
#nilai is_paid
# -1 konfirmsasi berbayar atau tidak
# 0 terkonfirmasi TIDAK terbayar. TIDAK usah dilakukan pengecekan lgi
# >0 terkonfirmasi terbayar. TIDAK usah dilakukan pengecekan lagi