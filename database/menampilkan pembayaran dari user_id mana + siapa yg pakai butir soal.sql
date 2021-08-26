# menampilkan pembayaran dari user_id mana + siapa yg pakai butir soal
# assigment_question_lists.user_id = guru yg memakai soal
select 
	ql.id,aql.assigment_id,aql.creator_id,aql.user_id,
    master_question_lists.is_paid as master_is_paid,
    purchased_question_lists.payment_id,
    payment_sharings_pivot.payment_from_user_id,
	payment_sharings_pivot.created_at as payment_created_at,
    senders.avatar as payment_sender_avatar,
	receivers.avatar as payment_receiver_avatar
from question_lists ql 
inner join assigment_question_lists aql on aql.question_list_id=ql.id
inner join question_lists as master_question_lists on master_question_lists.id=ql.ref_id
inner join (
	select * from purchased_items where purchased_item_type='App\\Models\\QuestionList' 
) purchased_question_lists on purchased_question_lists.purchased_item_id=aql.question_list_id
inner join (
	select 
			payments.id,payments.type,payments.value,payments.payment_type,payments.payment_id as user_id,
            payments.created_at,
			payment_sharings.payment_from,
			payment_from_table.payment_id as payment_from_user_id
	from payments 
		inner join payment_sharings on payment_sharings.payment_to = payments.id
		inner join payments payment_from_table on payment_from_table.id = payment_sharings.payment_from
	where payments.payment_type='App\\Models\\User'
	#order by payments.id desc
) payment_sharings_pivot on payment_sharings_pivot.id=purchased_question_lists.payment_id
inner join users as senders on senders.id=payment_sharings_pivot.payment_from_user_id  #murid yang membeli soal
inner join users as receivers on receivers.id=aql.user_id #guru yang memakai soal
where 
	master_question_lists.is_paid=1
	and year(payment_sharings_pivot.created_at)=2021 and month(payment_sharings_pivot.created_at)=8
order by ql.id desc

