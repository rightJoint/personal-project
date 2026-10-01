REPLACE INTO `blogArts` (`art_id`, `artCat`, `artRef`, `artName_en`, `artName_ru`, `artMeta_en`, `artMeta_ru`, `artImg`, `activeFlag`, `indexFlag`, `pubDate`, `refreshDate`, `commentsFlag`, `popFlag`, `created_by`, `adultFlag`) 
VALUES 
('9EB73870-76F8-4FD0-B60C-B8F69CB91DAC', '3D56453C-C00E-4241-A2AE-9A6A1993E6A6', 'my-last-engineer-job', 'My experience in the previous engineering position', 'Мой опыт работы инженером на предыдущем месте', 'That`s why do you never want to work as an engineer. Three videos and a bit of dark humor.', 'Вот почему вы больше не захотите работать инженером. Три видео и немного чернухи.', '0B7D9289-74E2-457D-99EF-90953364DDC7.jpg', 1, 1, '2026-10-01', NULL, 1, 0, '1AB4C7D7-5315-4C9E-9F33-E1B250491589', 0)
;
REPLACE INTO `blogAtrTags` (`art_id`, `tag_id`, `created_by`) 
VALUES 
('9EB73870-76F8-4FD0-B60C-B8F69CB91DAC', 'EBE37C2E-26C5-4CC5-89A9-247FEC55B05D', '1AB4C7D7-5315-4C9E-9F33-E1B250491589')
;
REPLACE INTO `siteMap_dt` 
(`maploc`, `lastmod`, `changefreq`, `priority`, `comment`, `use_flag`, `date_created`, `created_by`) 
VALUES 
('/blog/article/my-last-engineer-job', NULL, 'yearly', 1, NULL, 1, '2026-10-01 17:49:41', '1AB4C7D7-5315-4C9E-9F33-E1B250491589'),
('/ru/blog/article/my-last-engineer-job', NULL, 'monthly', 1, NULL, 1, '2026-10-01 17:50:08', '1AB4C7D7-5315-4C9E-9F33-E1B250491589'),
('/en/blog/article/my-last-engineer-job', NULL, 'monthly', 1, NULL, 1, '2026-10-01 17:50:22', '1AB4C7D7-5315-4C9E-9F33-E1B250491589')
;
