/* preload webps */
function preloadImg(image) {
    let img = new Image();
    img.src = image;
}

let pics = [
    '/SurpriseLabHome/assets/webps/general/img_error-1.webp',
    '/SurpriseLabHome/assets/webps/general/img_error-2.webp',
    '/SurpriseLabHome/assets/webps/general/img_success.webp',
    '/SurpriseLabHome/assets/webps/general/img_ticket-1.webp',
    '/SurpriseLabHome/assets/webps/general/img_ticket-2.webp',
    '/SurpriseLabHome/assets/webps/general/opengraph.webp',
    '/SurpriseLabHome/assets/webps/home/img_success.webp',
    '/SurpriseLabHome/assets/webps/home/kv.webp',
    '/SurpriseLabHome/assets/webps/project/badassonly/img_banner.webp',
    '/SurpriseLabHome/assets/webps/project/badassonly/img_note-01.webp',
    '/SurpriseLabHome/assets/webps/project/badassonly/img_partner.webp',
    '/SurpriseLabHome/assets/webps/project/badassonly/img_partner_mobile.webp',
    '/SurpriseLabHome/assets/webps/project/badassonly/img_pic-01.webp',
    '/SurpriseLabHome/assets/webps/project/badassonly/img_pic-02.webp',
    '/SurpriseLabHome/assets/webps/project/badassonly/img_pic-03.webp',
    '/SurpriseLabHome/assets/webps/project/badassonly/img_pic-04.webp',
    '/SurpriseLabHome/assets/webps/project/badassonly/img_pic-05.webp',
    '/SurpriseLabHome/assets/webps/project/badassonly/img_pic-06.webp',
    '/SurpriseLabHome/assets/webps/project/badassonly/img_pic-07.webp',
    '/SurpriseLabHome/assets/webps/project/badassonly/img_pic-08.webp',
    '/SurpriseLabHome/assets/webps/project/badassonly/img_pic-09.webp',
    '/SurpriseLabHome/assets/webps/project/badassonly/img_pic-10.webp',
    '/SurpriseLabHome/assets/webps/project/badassonly/img_pic-11.webp',
    '/SurpriseLabHome/assets/webps/project/badassonly/img_pic-12.webp',
    '/SurpriseLabHome/assets/webps/project/badassonly/img_thumbnails-review.webp',
    '/SurpriseLabHome/assets/webps/project/badassonly/img_thumbnails-video.webp',
    '/SurpriseLabHome/assets/webps/project/badassonly/opengraph.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_banner.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_note-01.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_note-02.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_note-03.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_note-04.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_note-05.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_note-06.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_note-07.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_note-08.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_partner.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_partner_mobile.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-01.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-02.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-03.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-04.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-05.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-06.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-07.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-08.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-09.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-10.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-11.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_pic-12.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_thumbnails-review.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/img_thumbnails-video.webp',
    '/SurpriseLabHome/assets/webps/project/clubtomorrow/opengraph.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark/img_banner.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark/img_note-01.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark/img_note-02.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark/img_note-03.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark/img_note-04.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark/img_note-05.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark/img_partner.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark/img_partner_mobile.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark/img_pic-01.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark/img_pic-02.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark/img_pic-03.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark/img_pic-04.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark/img_pic-05.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark/img_pic-06.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark/img_pic-07.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark/img_pic-08.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark/opengraph.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark2/img_banner.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark2/img_note-01.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark2/img_note-02.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark2/img_note-03.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark2/img_note-04.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark2/img_note-05.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark2/img_note-06.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark2/img_note-07.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark2/img_partner.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark2/img_partner_mobile.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark2/img_pic-01.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark2/img_pic-02.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark2/img_pic-03.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark2/img_pic-04.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark2/img_pic-05.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark2/img_pic-06.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark2/img_pic-07.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark2/img_pic-08.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark2/opengraph.webp',
    '/SurpriseLabHome/assets/webps/project/dininginthedark3/img_banner.webp',
    '/SurpriseLabHome/assets/webps/project/tableforone/img_banner.webp',
    '/SurpriseLabHome/assets/webps/project/tableforone/img_note-01.webp',
    '/SurpriseLabHome/assets/webps/project/tableforone/img_note-02.webp',
    '/SurpriseLabHome/assets/webps/project/tableforone/img_note-03.webp',
    '/SurpriseLabHome/assets/webps/project/tableforone/img_note-04.webp',
    '/SurpriseLabHome/assets/webps/project/tableforone/img_note-05.webp',
    '/SurpriseLabHome/assets/webps/project/tableforone/img_note-06.webp',
    '/SurpriseLabHome/assets/webps/project/tableforone/img_partner.webp',
    '/SurpriseLabHome/assets/webps/project/tableforone/img_partner_mobile.webp',
    '/SurpriseLabHome/assets/webps/project/tableforone/img_pic-01.webp',
    '/SurpriseLabHome/assets/webps/project/tableforone/img_pic-02.webp',
    '/SurpriseLabHome/assets/webps/project/tableforone/img_pic-03.webp',
    '/SurpriseLabHome/assets/webps/project/tableforone/img_pic-04.webp',
    '/SurpriseLabHome/assets/webps/project/tableforone/img_pic-05.webp',
    '/SurpriseLabHome/assets/webps/project/tableforone/img_pic-06.webp',
    '/SurpriseLabHome/assets/webps/project/tableforone/img_pic-07.webp',
    '/SurpriseLabHome/assets/webps/project/tableforone/img_pic-08.webp',
    '/SurpriseLabHome/assets/webps/project/tableforone/img_thumbnails-review.webp',
    '/SurpriseLabHome/assets/webps/project/tableforone/img_thumbnails-video.webp',
    '/SurpriseLabHome/assets/webps/project/tableforone/opengraph.webp',
    '/SurpriseLabHome/assets/webps/project/tgtnextstop/img_banner.webp',
    '/SurpriseLabHome/assets/webps/project/tgtnextstop/img_partner.webp',
    '/SurpriseLabHome/assets/webps/project/tgtnextstop/img_partner_mobile.webp',
    '/SurpriseLabHome/assets/webps/project/tgtnextstop/img_pic-01.webp',
    '/SurpriseLabHome/assets/webps/project/tgtnextstop/img_pic-02.webp',
    '/SurpriseLabHome/assets/webps/project/tgtnextstop/img_pic-03.webp',
    '/SurpriseLabHome/assets/webps/project/tgtnextstop/img_pic-04.webp',
    '/SurpriseLabHome/assets/webps/project/tgtnextstop/opengraph.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_banner.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_note-01.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_partner.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_partner_mobile.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_pic-01.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_pic-02.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_pic-03.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_pic-04.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_pic-05.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_pic-06.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_pic-07.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_partner.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_partner_mobile.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_pic-01.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_pic-02.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_pic-03.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_pic-04.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_pic-05.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_pic-06.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_pic-07.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_pic-08.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_pic-09.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_pic-10.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_pic-11.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_pic-12.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_thumbnails-review.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/img_thumbnails-video.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy/opengraph.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy2/img_banner.webp',
    '/SurpriseLabHome/assets/webps/project/thegreattipsy2/opengraph.webp',
    '/SurpriseLabHome/assets/webps/project/whee/img_banner.webp',
    '/SurpriseLabHome/assets/webps/project/whee/img_note-01.webp',
    '/SurpriseLabHome/assets/webps/project/whee/img_partner.webp',
    '/SurpriseLabHome/assets/webps/project/whee/img_partner_mobile.webp',
    '/SurpriseLabHome/assets/webps/project/whee/img_pic-01.webp',
    '/SurpriseLabHome/assets/webps/project/whee/img_pic-02.webp',
    '/SurpriseLabHome/assets/webps/project/whee/img_pic-03.webp',
    '/SurpriseLabHome/assets/webps/project/whee/img_pic-04.webp',
    '/SurpriseLabHome/assets/webps/project/whee/img_pic-05.webp',
    '/SurpriseLabHome/assets/webps/project/whee/img_pic-06.webp',
    '/SurpriseLabHome/assets/webps/project/whee/img_pic-07.webp',
    '/SurpriseLabHome/assets/webps/project/whee/img_pic-08.webp',
    '/SurpriseLabHome/assets/webps/project/whee/img_pic-09.webp',
    '/SurpriseLabHome/assets/webps/project/whee/img_pic-10.webp',
    '/SurpriseLabHome/assets/webps/project/whee/img_pic-11.webp',
    '/SurpriseLabHome/assets/webps/project/whee/img_pic-12.webp',
    '/SurpriseLabHome/assets/webps/project/whee/img_thumbnails-review.webp',
    '/SurpriseLabHome/assets/webps/project/whee/img_thumbnails-video.webp',
    '/SurpriseLabHome/assets/webps/project/whee/opengraph.webp',
    '/SurpriseLabHome/assets/webps/project/img_ticket_on-sell.webp',
    '/SurpriseLabHome/assets/webps/team/img_avatar-01.webp',
    '/SurpriseLabHome/assets/webps/team/img_avatar-02.webp',
    '/SurpriseLabHome/assets/webps/team/img_avatar-03.webp',
    '/SurpriseLabHome/assets/webps/team/img_avatar-04.webp',
    '/SurpriseLabHome/assets/webps/team/img_avatar-05.webp',
    '/SurpriseLabHome/assets/webps/team/img_avatar-06.webp',
    '/SurpriseLabHome/assets/webps/team/img_avatar-07.webp',
    '/SurpriseLabHome/assets/webps/team/img_avatar-08.webp',
    '/SurpriseLabHome/assets/webps/team/img_avatar-09.webp',
    '/SurpriseLabHome/assets/webps/team/img_avatar-10.webp',
    '/SurpriseLabHome/assets/webps/team/img_avatar-11.webp',
    '/SurpriseLabHome/assets/webps/team/img_avatar-12.webp',
    '/SurpriseLabHome/assets/webps/team/img_avatar-13.webp',
    '/SurpriseLabHome/assets/webps/team/img_avatar-14.webp',
    '/SurpriseLabHome/assets/webps/team/img_avatar-15.webp',
    '/SurpriseLabHome/assets/webps/team/img_brand.webp',
    '/SurpriseLabHome/assets/webps/ticket/img_empty.webp'
];

for(let i=0 ; i < pics.length ; i++) {
    preloadImg(pics[i]);
}