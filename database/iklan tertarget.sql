select ads.*,
ages_aggregate.ages_count,districts_aggregate.districts_count,genders_aggregate.genders_count
from ads 
left join  (
	select count(*) as ages_count,
			min(value) as min_age,
            max(value) as max_age, ad_id,id  
	from ad_targets where type='age' group by ad_id
) as ages_aggregate on ages_aggregate.ad_id=ads.id
left join (
	select count(*) as districts_count,ad_id,id from ad_targets  where type='district' group by ad_id
) as districts_aggregate on districts_aggregate.ad_id=ads.id
left join (
	select count(*) as genders_count,ad_id,id from ad_targets  where type='gender' group by ad_id
) as genders_aggregate on genders_aggregate.ad_id=ads.id
# jika records data ages ada 2, maka lakukan pengecekan
where if(ages_aggregate.ages_count=2, (
	select 18 between ages_aggregate.min_age and ages_aggregate.max_age
) ,true)
#jika records data districts lebih dari 0, maka lakukan pengecekan 
and if(districts_aggregate.districts_count>0, (
	select 1 in (select value from ad_targets where ad_id=ads.id and type='district')
) ,true)
#jika records data genders lebih dari 0, maka lakukan pengecekan 
and if(genders_aggregate.genders_count>0, (
	select 'L' in (select value from ad_targets where ad_id=ads.id and type='gender')
) ,true)