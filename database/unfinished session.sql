# session yang belum selesai:
# session yang jumlah questions tidak sama dengan jumlah assigments.question_lists
SELECT
	sessions.id,
	sessions.user_id,
	sessions.created_at,
	ass.assigment_id,
    a.name,
	a.code,
    a.timer,
    a.end_at,
    a.start_at,
    users.name as teacher,
    grades.educational_level_id,
    grades.description,
    a.is_public,
    a.teacher_id,
    assigment_question_lists_pivot.question_lists_total,
	questions_pivot.questions_total
FROM sessions

inner join 
	assigment_sessions as ass on ass.session_id=sessions.id
inner join 
	assigments as a on a.id=ass.assigment_id
inner join 
	grades on grades.id=a.grade_id
left join 
	users on users.id=a.teacher_id
inner join (
	select assigment_id,count(1) as  question_lists_total from assigment_question_lists as aql group by assigment_id
) assigment_question_lists_pivot on assigment_question_lists_pivot.assigment_id=ass.assigment_id
left join (
		select session_id,count(1) as questions_total from questions group by session_id
	) questions_pivot on questions_pivot.session_id=sessions.id
where questions_pivot.questions_total!=assigment_question_lists_pivot.question_lists_total or questions_pivot.questions_total is null

order by sessions.id desc;
